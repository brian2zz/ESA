<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\support\Facades\DB;
use App\Invoice;
use App\Models\kategori_obat;
use App\Models\golongan_obat;
use App\Models\obat_kandungan_detail;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;

class laporan_kandungan implements FromView, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    // private $data_golongan;
    // private $data_kategori;
    // private $kandungan_obat;
    private $obat;


    public function __construct($obat)
    {
        // $this->data_golongan = $data_golongan;
        // $this->data_kategori = $data_kategori;
        // $this->kandungan_obat = $kandungan_obat;
        $this->obat = $obat;
    }
    public function view() : View
    {
        // dd($this->obat);
        $data_kategori = kategori_obat::all();
        $data_golongan  = golongan_obat::all();
        // $obat = Obat::leftJoin('satuan_obat_detail','obat.id_obat','satuan_obat_detail.id_obat')
        //                 ->leftJoin('satuan','satuan_obat_detail.id_satuan_obat','satuan.id_satuan_obat')
        //                 ->leftJoin('dosis_obat_detail','obat.id_obat','dosis_obat_detail.id_obat')
        //                 ->leftJoin('dosis','dosis_obat_detail.id_dosis','dosis.id_dosis')
        //                 ->GroupBy('obat.id_obat')->get();
        $kandungan_obat = obat_kandungan_detail::leftJoin('kandungan','obat_kandungan_detail.id_kandungan','kandungan.id_kandungan')
                                        ->leftJoin('dosis','obat_kandungan_detail.id_dosis','dosis.id_dosis')
                                        ->get();
        return view('datamaster.tableExport.laporanKandunganTable', ['kategori'=>$data_kategori,'golongan'=>$data_golongan,'obat'=>$this->obat,'kandungan_obat'=>$kandungan_obat]);
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);
            },
        ];
    }
}
