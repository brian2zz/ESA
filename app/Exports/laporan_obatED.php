<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\support\Facades\DB;
use App\Invoice;
use Illuminate\Contracts\View\View;
use App\Models\gudang_obat;
use Maatwebsite\Excel\Concerns\FromView;

class laporan_obatED implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        $obat_ed = gudang_obat::leftJoin('obat','gudang_obat.id_obat','obat.ID')
        ->leftJoin('satuan','obat.satuan_obat','satuan.id_satuan_obat')
        ->leftJoin('kategori','obat.id_kategori','kategori.id_kategori')
        ->leftJoin('golongan','obat.id_golongan','golongan.id_golongan')
        ->leftJoin('pabrik','obat.id_pabrik','pabrik.id_pabrik')
        ->where('expired','true')->get();
        

        return view('laporan.table.tableED',['obat_ed'=>$obat_ed]);
    }
}
