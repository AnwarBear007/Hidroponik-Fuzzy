<?php

namespace App\Http\Controllers;

use App\Models\Ppm;
use App\Models\Data;
use App\Models\Hidroponik;
use App\Tables\Hidroponiks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\Facades\Toast;

class HidroponikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hidroponiks = Hidroponik::where('user_id', Auth::id())->get();

        return view('hidroponik.index', [
            // 'hidroponiks' => Hidroponiks::class,
            'hidroponiks' => SpladeTable::for($hidroponiks)
            ->withGlobalSearch(columns: ['hidroponik'])
            // ->column('id', sortable: true)
            ->column('code')
            ->column('ppm.hidroponik', label:'Hidroponik')
            ->column('ppm.min')
            ->column('ppm.max')
            // ->column('ppm.min')
            ->column('actions'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ppms = Ppm::get();
        
        return view('hidroponik.create',[
            'ppms' => $ppms
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();
        // dd($user_id);

        Hidroponik::create([
            'code'          => $request->code,
            'user_id'       => $user_id,
            'ppm_id'        => $request->ppm_id
        ]);

        Toast::title('Data Hidroponik Telah Ditambah')->autoDismiss(3);

        return to_route('hidroponik.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hidroponik $hidroponik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hidroponik $hidroponik)
    {
        $ppms = Ppm::get();
        
        return view('hidroponik.edit',[
            'hidroponiks'   => $hidroponik,
            'ppms'          => $ppms
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hidroponik $hidroponik)
    {
        $user_id = Auth::id();

        $hidroponik->update([
            'code'          => $request->code,
            'user_id'       => $user_id,
            'ppm_id'        => $request->ppm_id
        ]);

        Toast::title('Data Hidroponik Telah Diubah')->warning()->autoDismiss(3);

        return to_route('hidroponik.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hidroponik $hidroponik)
    {
        $hidroponik->delete();

        Toast::title('Data Hidroponik Telah Dihapus')->danger()->autoDismiss(3);

        return to_route('hidroponik.index');
    }
}
