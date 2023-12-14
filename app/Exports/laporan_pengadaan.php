<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\support\Facades\DB;
use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class laporan_pengadaan implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        $data_pengadaan =  DB::table('pengadaan')
                            ->Join('detail_pengadaan','pengadaan.id_pengadaan','detail_pengadaan.id_pengadaan')
                            ->leftJoin('pabrik','detail_pengadaan.pabrik','pabrik.id_pabrik')
                            ->leftJoin('gudang_obat','detail_pengadaan.id_obat','gudang_obat.id')
                            ->leftJoin('obat','gudang_obat.id_obat','obat.ID')
                            ->leftJoin('satuan','obat.satuan_obat','satuan.id_satuan_obat')
                            ->get();
        return view('laporan.table.tablePengadaan',["data_pengadaan"=>$data_pengadaan]);
    }
}
