<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\support\Facades\DB;
use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class laporan_kategori implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        $data_laporan_kategori = DB::table('obat')->leftJoin('kandungan_obat',
                                                            'obat.id_obat_kandungan',
                                                            'kandungan_obat.id_kandungan_obat')
                                                    ->leftJoin('satuan','obat.satuan_obat','satuan.id_satuan_obat')
                                                    ->leftJoin('kategori','obat.id_kategori','kategori.id_kategori')
                                                    ->leftJoin('golongan','obat.id_golongan','golongan.id_golongan')
                                                    ->leftJoin('pabrik','obat.id_pabrik','pabrik.id_pabrik')
                                                    ->GroupBy('obat.ID')->get();
        return view('datamaster.tableExport.laporanKatagoriTable',['data_laporan'=>$data_laporan_kategori]);
    }
}
