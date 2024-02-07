<?php

namespace App\Tables;

use App\Models\Data;
use App\Models\Hidroponik;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use ProtoneMedia\Splade\AbstractTable;
use Spatie\QueryBuilder\QueryBuilder;

class Datas extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct(Request $request, Hidroponik $hidroponik)
    {
        // $this->id = $hidroponik->id;
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Data::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            // ->withGlobalSearch(columns: ['id'])
            // ->column('id')
            ->column('hidroponik.hidroponik', label:"Hidroponik")
            ->column('tanggal', sortable:true)
            ->column('jumlah', label:"Jumlah Tanaman")
            ->column('volume', label:"Volume Air (Liter)")
            ->column('larutan', label:"Larutan AB Mix (MiliLiter)")
            ->column('ppm')
            ->column('kondisi')
            ->column('actions', exportAs: false)
            ->export(
                label: 'Excel export',
                filename: 'Hidroponik.csv',
            )
            // ->export(
            //     label: 'PDF export',
            //     filename: 'Hidroponik.pdf',
            // )
            ->selectFilter('kondisi',[
                'baik' => 'Baik',
                'buruk' => 'Buruk',
            ], 
            noFilterOption: true,
            noFilterOptionLabel: 'Semua')
            ->defaultSort('tanggal', 'asc')
            ->paginate(5);
    }
}
