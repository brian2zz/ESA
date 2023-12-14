<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\support\Facades\DB;
use App\Models\laporan_opnam;
use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class laporan_stok_opnam implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        $laporan_opnam = laporan_opnam::leftjoin('obat','laporan_opnam.id_obat','obat.ID')->get();
        return view('laporan.table.table_opnam',["laporan_opnam"=>$laporan_opnam]);
    }
}
