<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\support\Facades\DB;
use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Carbon\Carbon;

class dashboard implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : View
    {
        $current_time  = Carbon::now()
                ->format('F, Y');
                $data_dashboard = db::table('obat')
                ->orWhere('penerimaan.tanggal_penerimaan','like','%'.$current_time.'%')
                ->orWhere('pengeluaran.tanggal_pengeluaran','like','%'.$current_time.'%')
                ->orWhere('pengadaan.tanggal_pengadaan','like','%'.$current_time.'%')
                ->where('obat.status','Continue')
                    ->leftJoin('gudang_obat','obat.ID','gudang_obat.id_obat')
                    ->leftJoin('obat_pengeluaran','gudang_obat.id','obat_pengeluaran.id_obat')
                    ->leftJoin('pengeluaran','obat_pengeluaran.id_pengeluaran','obat_pengeluaran.id_pengeluaran')
                    ->leftJoin('detail_pengadaan','gudang_obat.id','detail_pengadaan.id_obat')
                    ->leftJoin('pengadaan','detail_pengadaan.id_pengadaan','pengadaan.id_pengadaan')
                    ->leftJoin('penerimaan', 'gudang_obat.id','penerimaan.id_obat')
                ->get();
        return view('dashboard2.tableDashboard',['data_dashboard'=>$data_dashboard]);
    }
}
