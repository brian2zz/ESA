<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\support\Facades\DB;
use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class laporan_pengeluaran implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        $data_pengeluaran = DB::table('pengeluaran')
                            ->leftJoin('obat_pengeluaran','pengeluaran.id_pengeluaran','obat_pengeluaran.id_pengeluaran')
                            ->leftJoin('gudang_obat','obat_pengeluaran.id_obat','gudang_obat.id')
                            ->leftJoin('obat','gudang_obat.id_obat','obat.ID')
                            ->get();

        return view('laporan.table.tablePengeluaran',['data_pengeluaran'=>$data_pengeluaran]);
    }
}
