<?php

namespace App\Http\Controllers;

use App\Models\Ppm;
use App\Models\Data;
use App\Tables\Datas;
use App\Models\Hidroponik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request, Hidroponik $hidroponik)
    public function index(Request $request)
    {
        // $ppm_id         = $request->input('ppm_id');
        $ppm_id         = Auth::user()->crop_id;

        // $datas = Data::with('hidroponik')->where('hidroponik_id', $hidroponik->id)->get();
        $datas = Data::where('crop_id', $ppm_id)->get();

        return view('data.index', [
            'datas' => SpladeTable::for($datas)
                ->column('tanggal', sortable: true)
                ->column('jumlah', label: "Jumlah Tanaman")
                // ->column('volume', label:"Volume Air (Liter)")
                // ->column('larutan', label:"Larutan AB Mix (MiliLiter)")
                ->column('ppm')
                ->column('kondisi')
                ->column('actions', exportAs: false)
                ->selectFilter(
                    'kondisi',
                    [
                        'baik' => 'Baik',
                        'buruk' => 'Buruk',
                    ],
                    noFilterOption: true,
                    noFilterOptionLabel: 'Semua'
                )
                ->defaultSort('tanggal', 'asc'),
            'ppm_id'        => $ppm_id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $hidroponik_id  = $request->input('hidroponik_id');
        $ppm_id         = $request->input('ppm_id');

        return view('data.create', [
            'hidroponik_id' => $hidroponik_id,
            'ppm_id'        => $ppm_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $hidroponik_id  = $request->input('hidroponik_id');
        $ppm_id         = $request->input('ppm_id');
        // $larutan = $request->larutan * 1000; //Mengubah MiliLiter menjadi MiliGram
        // $ppm =  $larutan / $request->volume;
        // $ppm =  900;

        $user = User::where('email', 'user@example.com')->first();
        $ppm_id = $user?->crop_id;
        $ppm =  $request->ppm ?? null;
        $request['jumlah'] =  $user->crop_amount; //Menghitung PPM

        if (empty($ppm)) {
            return;
        }

        //-------------------deklarasi fuzzy
        $datas = Data::select('jumlah')->where('crop_id', $ppm_id)->get();
        $maxJ = $datas->max('jumlah');
        $minJ = $datas->min('jumlah');
        if ($datas->count('jumlah') == 0) {
            $meanJ = "";
        } else {
            $meanJ = $datas->sum('jumlah') / $datas->count('jumlah');
        }

        $Datappm = Ppm::where('id', $ppm_id)->first()->toArray();

        $maxP = $Datappm['max'];
        $minP = $Datappm['min'];
        $meanP = ($maxP + $minP) / 2;

        //-------------------fuzzifikasi
        //Jumlah tanaman
        if ($request->jumlah <= $minJ) {
            $JTSedikit  = 1;
            $JTSedang   = 0;
            $JTBanyak   = 0;
        } else if ($request->jumlah >= $minJ && $request->jumlah < $meanJ) {
            $JTSedikit  = ($meanJ - $request->jumlah)     /   ($meanJ - $minJ);
            $JTSedang   = ($request->jumlah - $minJ)    /   ($meanJ - $minJ);
            $JTBanyak   = 0;
        } else if ($request->jumlah >= $meanJ && $request->jumlah < $maxJ) {
            $JTSedikit  = 0;
            $JTSedang   = ($maxJ - $request->jumlah)    /   ($maxJ - $meanJ);
            $JTBanyak   = ($request->jumlah - $meanJ)    /   ($maxJ - $meanJ);
        } else if ($request->jumlah >= $maxJ) {
            $JTSedikit  = 0;
            $JTSedang   = 0;
            $JTBanyak   = 1;
        }

        //Nilai PPM
        if ($ppm < $minP) {
            $NPRendah   = 1;
            $NPSedang   = 0;
            $NPTinggi   = 0;
        } else if ($ppm >= $minP && $ppm < $meanP) {
            $NPRendah   = ($meanP - $ppm)     /   ($meanP - $minP);
            $NPSedang   = ($ppm - $minP)    /   ($meanP - $minP);
            $NPTinggi   = 0;
        } else if ($ppm >= $meanP && $ppm < $maxP) {
            $NPRendah   = 0;
            $NPSedang   = ($maxP - $ppm)    /   ($maxP - $meanP);
            $NPTinggi   = ($ppm - $meanP)    /   ($maxP - $meanP);
        } else if ($ppm >= $maxP) {
            $NPRendah  = 0;
            $NPSedang   = 0;
            $NPTinggi   = 1;
        }

        // -------------------- Inferensi
        // rule base
        $rule1 = min($JTSedikit, $NPRendah); //KBaik
        $rule2 = min($JTSedikit, $NPSedang); //KBaik
        $rule3 = min($JTSedikit, $NPTinggi); //KBuruk
        $rule4 = min($JTSedang, $NPRendah); //KBuruk
        $rule5 = min($JTSedang, $NPSedang); //KBaik
        $rule6 = min($JTSedang, $NPTinggi); //KBuruk
        $rule7 = min($JTBanyak, $NPRendah); //KBuruk
        $rule8 = min($JTBanyak, $NPSedang); //KBaik
        $rule9 = min($JTBanyak, $NPTinggi); //KBaik

        //-------------------- Defuzifikasi
        $KBuruk = 100;
        $KBaik = 200;
        $KTengah = ($KBaik + $KBuruk) / 2;

        $BaseKBuruk = ($rule3 * $KBuruk) + ($rule4 * $KBuruk) + ($rule6 * $KBuruk) + ($rule7 * $KBuruk);
        $BaseKBaik  = ($rule1 * $KBaik) + ($rule2 * $KBaik) + ($rule5 * $KBaik) + ($rule8 * $KBaik) + ($rule9 * $KBaik);
        $BaseKTotal = $BaseKBuruk + $BaseKBaik;

        $DEFBuruk = $rule3 + $rule4 + $rule6 + $rule7;
        $DEFBaik = $rule1 + $rule2 + $rule5 + $rule8 + $rule9;
        $DEFTotal = $DEFBaik + $DEFBuruk;

        $output = $BaseKTotal / $DEFTotal;

        if ($output <= $KTengah) {
            $Kondisi = 'buruk';
        } elseif ($output > $KTengah) {
            $Kondisi =  'baik';
        }

        // dd([
        //     'hidroponik_id' => $hidroponik_id,
        //     'tanggal'       => $request->tanggal,
        //     'jumlah'        => $request->jumlah,
        //     'volume'        => $request->volume,
        //     'larutan'       => $request->larutan,
        //     'ppm'           => $ppm,
        //     'kondisi'       => $Kondisi
        // ]);

        Data::create([
            'tanggal' => now(),
            'hidroponik_id' => $hidroponik_id,
            'crop_id' => $ppm_id,
            // 'tanggal'       => $request->tanggal,
            'jumlah'        => $request->jumlah,
            'volume'        => $request->volume,
            'larutan'       => $request->larutan,
            'ppm'           => $ppm,
            'kondisi'       => $Kondisi
        ]);

        // Toast::title('Data Hidroponik Telah Ditambah')->autoDismiss(3);

        return response()->json([
            'message' => 'success'
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Data $data)
    {
        $hidroponik_id  = $request->input('hidroponik_id');
        $ppm_id         = $request->input('ppm_id');

        return view('data.edit', [
            'datas'         => $data,
            'hidroponik_id' => $hidroponik_id,
            'ppm_id'        => $ppm_id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Data $data)
    {
        $hidroponik_id  = $request->input('hidroponik_id');
        $ppm_id         = $request->input('ppm_id');

        $larutan = $request->larutan * 1000; //Mengubah MiliLiter menjadi MiliGram
        $ppm = $larutan / $request->volume; //Menghitung PPM

        //-------------------deklarasi fuzzy
        $datas = Data::where('hidroponik_id', $hidroponik_id)->get();
        $maxJ = $datas->max('jumlah');
        $minJ = $datas->min('jumlah');
        $meanJ = $datas->sum('jumlah') / $datas->count('jumlah');

        $Datappm = Ppm::where('id', $ppm_id)->first()->toArray();

        $maxP = $Datappm['max'];
        $minP = $Datappm['min'];
        $meanP = ($maxP + $minP) / 2;

        //-------------------fuzzifikasi
        //Jumlah tanaman
        if ($request->jumlah < $minJ) {
            $JTSedikit  = 1;
            $JTSedang   = 0;
            $JTBanyak   = 0;
        } else if ($request->jumlah >= $minJ && $request->jumlah < $meanJ) {
            $JTSedikit  = ($meanJ - $request->jumlah)     /   ($meanJ - $minJ);
            $JTSedang   = ($request->jumlah - $minJ)    /   ($meanJ - $minJ);
            $JTBanyak   = 0;
        } else if ($request->jumlah >= $meanJ && $request->jumlah < $maxJ) {
            $JTSedikit  = 0;
            $JTSedang   = ($maxJ - $request->jumlah)    /   ($maxJ - $meanJ);
            $JTBanyak   = ($request->jumlah - $meanJ)    /   ($maxJ - $meanJ);
        } else if ($request->jumlah >= $maxJ) {
            $JTSedikit  = 0;
            $JTSedang   = 0;
            $JTBanyak   = 1;
        }
        //Nilai PPM
        if ($ppm < $minP) {
            $NPRendah   = 1;
            $NPSedang   = 0;
            $NPTinggi   = 0;
        } else if ($ppm >= $minP && $ppm < $meanP) {
            $NPRendah   = ($meanP - $ppm)     /   ($meanP - $minP);
            $NPSedang   = ($ppm - $minP)    /   ($meanP - $minP);
            $NPTinggi   = 0;
        } else if ($ppm >= $meanP && $ppm < $maxP) {
            $NPRendah   = 0;
            $NPSedang   = ($maxP - $ppm)    /   ($maxP - $meanP);
            $NPTinggi   = ($ppm - $meanP)    /   ($maxP - $meanP);
        } else if ($ppm >= $maxP) {
            $NPRendah  = 0;
            $NPSedang   = 0;
            $NPTinggi   = 1;
        }

        // -------------------- Inferensi
        // rule base
        $rule1 = min($JTSedikit, $NPRendah); //KBaik
        $rule2 = min($JTSedikit, $NPSedang); //KBaik
        $rule3 = min($JTSedikit, $NPTinggi); //KBuruk
        $rule4 = min($JTSedang, $NPRendah); //KBuruk
        $rule5 = min($JTSedang, $NPSedang); //KBaik
        $rule6 = min($JTSedang, $NPTinggi); //KBuruk
        $rule7 = min($JTBanyak, $NPRendah); //KBuruk
        $rule8 = min($JTBanyak, $NPSedang); //KBaik
        $rule9 = min($JTBanyak, $NPTinggi); //KBaik

        //-------------------- Defuzifikasi
        $KBuruk = 100;
        $KBaik = 200;
        $KTengah = ($KBaik + $KBuruk) / 2;

        $BaseKBuruk = ($rule3 * $KBuruk) + ($rule4 * $KBuruk) + ($rule6 * $KBuruk) + ($rule7 * $KBuruk);
        $BaseKBaik  = ($rule1 * $KBaik) + ($rule2 * $KBaik) + ($rule5 * $KBaik) + ($rule8 * $KBaik) + ($rule9 * $KBaik);
        $BaseKTotal = $BaseKBuruk + $BaseKBaik;

        $DEFBuruk = $rule3 + $rule4 + $rule6 + $rule7;
        $DEFBaik = $rule1 + $rule2 + $rule5 + $rule8 + $rule9;
        $DEFTotal = $DEFBaik + $DEFBuruk;

        $output = $BaseKTotal / $DEFTotal;

        if ($output <= $KTengah) {
            $Kondisi = 'buruk';
        } elseif ($output > $KTengah) {
            $Kondisi =  'baik';
        }


        $data->update([
            'hidroponik_id' => $request->hidroponik_id,
            'tanggal'       => $request->tanggal,
            'jumlah'        => $request->jumlah,
            'volume'        => $request->volume,
            'larutan'       => $request->larutan,
            'ppm'           => $ppm,
            'kondisi'       => $Kondisi
        ]);

        Toast::title('Data Hidroponik Telah Diupdate')->warning()->autoDismiss(3);

        return to_route('data.index', $request->hidroponik_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Data $data)
    {
        $data->delete();

        Toast::title('Data Hidroponik Telah Dihapus')->danger()->autoDismiss(3);

        return redirect()->back();
    }
}
