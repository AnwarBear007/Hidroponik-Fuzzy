<?php

namespace App\Http\Controllers;

use App\Models\Ppm;
use App\Tables\PpmTable;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;

class PpmController extends Controller
{
    public function index() {
        return view('ppm.index', [
            'ppms'   => PpmTable::class
        ]);
    }

    public function create() {
        return view('ppm.create');
    }

    public function store(Request $request) {
        
        Ppm::create([
            'hidroponik'    => $request->hidroponik,
            'min'           => $request->min,
            'max'           => $request->max,
        ]);

        Toast::title('Data PPM Hidroponik Telah Ditambah')->autoDismiss(3);

        return to_route('ppm.index');
    }

    public function edit(Ppm $ppm) {

        return view('ppm.edit', [
            'ppms'      => $ppm
        ]);

    }

    public function update(Request $request, Ppm $ppm) {
        
        $ppm->update([
            'hidroponik'    => $request->hidroponik,
            'min'           => $request->min,
            'max'           => $request->max,
        ]);

        Toast::title('Data PPM Hidroponik Telah Diubah')->warning()->autoDismiss(3);

        return to_route('ppm.index');
    }

    public function destroy(Ppm $ppm) {
        $ppm->delete();

        Toast::title('Data PPM Hidroponik Telah Dihapus')->danger()->autoDismiss(3);

        return to_route('ppm.index');
    }
}
