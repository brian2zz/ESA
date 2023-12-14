<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\support\Facades\DB;
use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class laporan_penerimaan implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        $data_table = DB::table('penerimaan')
                    ->leftJoin('pbf','penerimaan.id_PBF','pbf.id_PBF')
                    ->leftJoin('gudang_obat','penerimaan.id_obat','gudang_obat.id')
                    ->leftJoin('obat','gudang_obat.id_obat','obat.ID')
                    ->leftJoin('satuan','obat.satuan_obat','satuan.id_satuan_obat')
                    ->leftJoin('kategori','obat.id_kategori','kategori.id_kategori')
                    ->leftJoin('golongan','obat.id_golongan','golongan.id_golongan')
                    ->leftJoin('pabrik','obat.id_pabrik','pabrik.id_pabrik')
                    ->get();
        return view('laporan.table.tablePenerimaan',['data_table'=>$data_table]);
    }
}
