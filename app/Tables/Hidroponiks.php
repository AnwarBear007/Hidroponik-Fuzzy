<?php

namespace App\Tables;

use App\Models\Hidroponik;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Hidroponiks extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        return Hidroponik::query();
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
            ->withGlobalSearch(columns: ['hidroponik'])
            // ->column('id', sortable: true)
            ->column('code')
            ->column('ppm.hidroponik', label:'Hidroponik')
            ->column('ppm.min')
            ->column('ppm.max')
            // ->column('ppm.min')
            ->column('actions');
    }
}
