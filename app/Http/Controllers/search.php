<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\pbf;
use App\Models\stok_opnam;
use App\Models\dokter;
use App\Models\dashboard;
use App\Models\detail_penerimaan_obat;
use App\Models\detail_pengeluaran_obat;
use App\Models\dosis;
use App\Models\dosis_obat_detail;
use App\Models\kategori_obat;
use App\Models\gudang_obat;
use App\Models\golongan_obat;
use App\Models\kandungan;
use App\Models\pabrik_obat;
use App\Models\kandungan_obat;
use App\Models\satuan_obat;
use App\Models\obat;
use App\Models\obat_kandungan_detail;
use App\Models\penerimaan;
use App\Models\pengadaan;
use App\Models\pengeluaran;
use App\Models\satuan_obat_detail;
use Carbon\Carbon;

class search extends Controller
{
    public function search_dashboard(request $request){
        $this->validate($request,[
            'bulan' => 'required',
            'tahun' => 'required',
        ]);
        $time = $request->bulan.', '.$request->tahun;
        $dashboard = detail_penerimaan_obat::leftJoin('stok_gudang','detail_penerimaan_obat.id_detail_penerimaan_obat','stok_gudang.id_detail_penerimaan')
                                ->leftJoin('obat','detail_penerimaan_obat.id_obat','obat.id_obat')
                                ->leftJoin('penerimaan','detail_penerimaan_obat.id_penerimaan','penerimaan.id_penerimaan')
                                ->where('tanggal_penerimaan','like','%'.$time)
                                ->get();
                                
        $pengeluaran = detail_pengeluaran_obat::select(DB::raw('*,sum(jumlah_obat_keluar) as total_obat_keluar'))->leftJoin('stok_gudang','detail_pengeluaran_obat.id_obat_pengeluaran','stok_gudang.id_detail_pengeluaran')
                            ->groupBy('batch_number')->get();
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';
        
        $action = 'dashboard_2';
        
        return view('dashboard2.dashboard2',['dashboard'=>$dashboard,
            'data_pengeluaran'=>$pengeluaran,
            'tanggal'=>$time
        ], compact('page_title', 'page_description','action'));
    }

    public function search_obat(Request $request){
        $page_title = 'Obat';
        $page_description = 'Some description for the page';
		
		$action = 'obat';

        

        $kandungan_obat = DB::table('obat')->leftJoin('obat_kandungan_detail',
                                            'obat.id_obat',
                                            'obat_kandungan_detail.id_obat')
                                ->leftJoin('kandungan','obat_kandungan_detail.id_kandungan','kandungan.id_kandungan')
                                ->leftJoin('dosis','obat_kandungan_detail.id_dosis','dosis.id_dosis')
                                ->get();
        $table_obat = DB::table('obat')->leftJoin('satuan_obat_detail','obat.id_obat','satuan_obat_detail.id_obat')
                            ->leftJoin('satuan','satuan_obat_detail.id_satuan_obat','satuan.id_satuan_obat')
                            ->leftJoin('kategori','obat.id_kategori','kategori.id_kategori')
                            ->leftJoin('golongan','obat.id_golongan','golongan.id_golongan')
                            ->leftJoin('pabrik','obat.id_pabrik','pabrik.id_pabrik')
                            ->leftJoin('dosis_obat_detail','obat.id_obat','dosis_obat_detail.id_obat')
                            ->leftJoin('dosis','dosis_obat_detail.id_dosis','dosis.id_dosis')
                            ->where('kategori.id_kategori','like','%'.$request->kategori.'%')
                            ->where('golongan.id_golongan','like','%'.$request->golongan.'%')
                            ->GroupBy('obat.id_obat')->where('obat.status',$request->status)->get();
        
        $table_detail_obat = gudang_obat::rightJoin('detail_penerimaan_obat','stok_gudang.id_detail_penerimaan','detail_penerimaan_obat.id_detail_penerimaan_obat')
                            ->leftJoin('obat','detail_penerimaan_obat.id_obat','obat.id_obat')
                            ->leftJoin('penerimaan','detail_penerimaan_obat.id_penerimaan','penerimaan.id_penerimaan')
                            ->get();    
        foreach($table_detail_obat as $data){
            $data->tanggal_expired_obat = Carbon::parse($data->tanggal_expired_obat)->format('j F, Y');
        }

        $dosis_obat = dosis_obat_detail::leftJoin('obat','dosis_obat_detail.id_obat','obat.id_obat')
                        ->leftJoin('dosis','dosis_obat_detail.id_dosis','dosis.id_dosis')->get();
        $satuan_dosis = dosis::all();
        $kandungan = kandungan::all();
        $golongan_obat = golongan_obat::all();
        $kategori_obat = kategori_obat::all();
        $pabrik_obat = pabrik_obat::all();
        $satuan_obat = satuan_obat::all();
        $satuan_obat_detail = satuan_obat_detail::all();
        $status = $request->status;
        return view('datamaster.obat',[
            'table_detail_obat'=>$table_detail_obat,
            'kategori_obat'=> $kategori_obat,
            'golongan_obat'=> $golongan_obat,
            'pabrik_obat'=> $pabrik_obat,
            'satuan_obat'=> $satuan_obat,
            'obat' => $kandungan_obat,
            'table_obat' => $table_obat,
            'dosis_obat' => $dosis_obat,
            'satuan_dosis' => $satuan_dosis,
            'satuan_obat_detail'=> $satuan_obat_detail,
            'kandungan'=>$kandungan_obat,
            'data_kandungan'=>$kandungan,
            'status'=>$status,], 
            compact('page_title', 'page_description','action'));
    }
    public function search_pengeluaran(Request $request){
        $page_title = 'Halaman Pengeluaran';
        $page_description = 'Some description for the page';
		
		$action = 'halpengeluaran';

        $waktu = $request->bulan.', '.$request->tahun;

        $data_obat = obat::rightJoin('detail_penerimaan_obat','obat.id_obat','detail_penerimaan_obat.id_obat')
                        ->leftJoin('dosis_obat_detail','obat.id_obat','dosis_obat_detail.id_obat')
                        ->leftJoin('dosis','dosis_obat_detail.id_dosis','dosis.id_dosis')
                        ->leftJoin('satuan_obat_detail','obat.id_obat','satuan_obat_detail.id_obat')
                        ->leftJoin('satuan','satuan_obat_detail.id_satuan_obat','satuan.id_satuan_obat')
                        ->get();
        $data_dokter = dokter::all();
        
        $data_pengeluaran = pengeluaran::where('pengeluaran.tanggal_pengeluaran','like','%'.$waktu.'%')
                            ->groupBy('pengeluaran.id_pengeluaran')->get();

        $detail_pengeluaran = detail_pengeluaran_obat::leftJoin('pengeluaran','detail_pengeluaran_obat.id_pengeluaran','pengeluaran.id_pengeluaran')
                            ->leftJoin('dokter','pengeluaran.id_dokter','dokter.id_dokter')
                            ->leftJoin('detail_penerimaan_obat','detail_pengeluaran_obat.batch_number','detail_penerimaan_obat.batch_number')
                            ->leftJoin('obat','detail_penerimaan_obat.id_obat','obat.id_obat')
                            ->leftJoin('dosis_obat_detail','obat.id_obat','dosis_obat_detail.id_obat')
                            ->leftJoin('dosis','dosis_obat_detail.id_dosis','dosis.id_dosis')
                            ->leftJoin('satuan_obat_detail','obat.id_obat','satuan_obat_detail.id_obat')
                            ->leftJoin('satuan','satuan_obat_detail.id_satuan_obat','satuan.id_satuan_obat')
                            ->get();
        // dd($detail_pengeluaran);
        return view('halaman.halpengeluaran',['data_dokter'=>$data_dokter,
        'data_obat'=>$data_obat,
        'data_pengeluaran'=>$data_pengeluaran, 
        'detail_pengeluaran'=>$detail_pengeluaran
        ], compact('page_title', 'page_description','action'));
    }
    public function search_penerimaan(Request $request){

        $page_title = 'Halaman Penerimaan';
        $page_description = 'Some description for the page';
		
		$action = 'halpenerimaan';

        $req_pbf = $request->pbf;
        
        $waktu = $request->bulan.', '.$request->tahun;
        $data_obat = obat::where('status','Continue')
                        ->leftJoin('dosis_obat_detail','obat.id_obat','dosis_obat_detail.id_obat')
                        ->leftJoin('dosis','dosis_obat_detail.id_dosis','dosis.id_dosis')
                        ->leftJoin('satuan_obat_detail','obat.id_obat','satuan_obat_detail.id_obat')
                        ->leftJoin('satuan','satuan_obat_detail.id_satuan_obat','satuan.id_satuan_obat')->get();
        $data_pbf   = pbf::all();
        if($req_pbf != null){
            $data_table = DB::table('penerimaan')->where('penerimaan.tanggal_penerimaan','like','%'.$waktu.'%')
                        ->where('penerimaan.id_PBF','like','%'.$request->pbf)
                        ->leftJoin('pbf','penerimaan.id_pbf','pbf.id_pbf')->get();
        }else{
            $data_table = DB::table('penerimaan')->where('penerimaan.tanggal_penerimaan','like','%'.$waktu.'%')
                        ->leftJoin('pbf','penerimaan.id_pbf','pbf.id_pbf')->get();
        }
        $data_detail = penerimaan::leftJoin('detail_penerimaan_obat', 'penerimaan.id_penerimaan', 'detail_penerimaan_obat.id_penerimaan')
                    ->leftJoin('pbf','penerimaan.id_pbf','pbf.id_pbf')
                    ->leftJoin('obat','detail_penerimaan_obat.id_obat','obat.id_obat')
                    ->leftJoin('dosis_obat_detail','obat.id_obat','dosis_obat_detail.id_obat')
                    ->leftJoin('dosis','dosis_obat_detail.id_dosis','dosis.id_dosis')
                    ->leftJoin('satuan_obat_detail','obat.id_obat','satuan_obat_detail.id_obat')
                    ->leftJoin('satuan','satuan_obat_detail.id_satuan_obat','satuan.id_satuan_obat')
                    ->leftJoin('kategori','obat.id_kategori','kategori.id_kategori')
                    ->leftJoin('golongan','obat.id_golongan','golongan.id_golongan')
                    ->leftJoin('pabrik','obat.id_pabrik','pabrik.id_pabrik')
                    ->get();
        $data_kandungan = kandungan::leftJoin('obat_kandungan_detail','kandungan.id_kandungan','obat_kandungan_detail.id_kandungan')->get();
                    

        return view('halaman.halpenerimaan',['data_obat'=>$data_obat, 'kandungan'=>$data_kandungan, 'data_pbf'=>$data_pbf, 'data_table'=>$data_table, 'data_detail'=>$data_detail], compact('page_title', 'page_description','action'));
    }

    public function search_pengadaan(Request $request){
        $page_title = 'Halaman Pengadaan';
        $page_description = 'Some description for the page';
		
		$action = 'halpengadaan';

        $waktu = $request->bulan.', '.$request->tahun;
        $data_pengadaan = pengadaan::where('pengadaan.tanggal_pengadaan','like','%'.$waktu.'%')->get();
        
        $pbf = pbf::all();
        return view('halaman.halpengadaan',['data_pengadaan'=>$data_pengadaan,'data_pbf'=>$pbf], compact('page_title', 'page_description','action'));
    }

    public function search_laporan_pengeluaran(Request $request){
        $page_title = 'Laporan Pengeluaran Obat';
        $page_description = 'Some description for the page';
		
		$action = 'lappengeluaran';
        $waktu = $request->bulan.', '.$request->tahun;
        
        $data_pengeluaran = detail_pengeluaran_obat::leftJoin('pengeluaran','detail_pengeluaran_obat.id_pengeluaran','pengeluaran.id_pengeluaran')
                            ->leftJoin('dokter','pengeluaran.id_dokter','dokter.id_dokter')
                            ->leftJoin('detail_penerimaan_obat','detail_pengeluaran_obat.batch_number','detail_penerimaan_obat.batch_number')
                            ->leftJoin('obat','detail_penerimaan_obat.id_obat','obat.id_obat')
                            ->leftJoin('stok_gudang','detail_pengeluaran_obat.id_obat_pengeluaran','stok_gudang.id_detail_pengeluaran')
                            ->leftJoin('dosis_obat_detail','obat.id_obat','dosis_obat_detail.id_obat')
                            ->leftJoin('dosis','dosis_obat_detail.id_dosis','dosis.id_dosis')
                            ->leftJoin('satuan_obat_detail','obat.id_obat','satuan_obat_detail.id_obat')
                            ->leftJoin('satuan','satuan_obat_detail.id_satuan_obat','satuan.id_satuan_obat')
                            ->where('pengeluaran.tanggal_pengeluaran','like','%'.$waktu.'%')
                            ->get();
        
        return view('laporan.lappengeluaran',['data_pengeluaran'=>$data_pengeluaran], compact('page_title', 'page_description','action'));
    }

    public function search_laporan_pengadaan(Request $request){
        $page_title = 'Laporan Pengadaan Obat';
        $page_description = 'Some description for the page';
		
		$action = 'lappengadaan';

        $waktu = $request->bulan.', '.$request->tahun;
        $pbf = pbf::all();
        $data_pengadaan =  DB::table('pengadaan')->where('pengadaan.tanggal_pengadaan','like','%'.$waktu.'%')->where('pengadaan.pbf','like','%'.$request->pbf)
                            ->Join('detail_pengadaan','pengadaan.id_pengadaan','detail_pengadaan.id_pengadaan')
                            ->leftJoin('pabrik','detail_pengadaan.pabrik','pabrik.id_pabrik')
                            ->leftJoin('obat','detail_pengadaan.id_obat','obat.ID')
                            ->leftJoin('satuan','obat.satuan_obat','satuan.id_satuan_obat')
                            ->get();
        

        return view('laporan.lappengadaan',["data_pengadaan"=>$data_pengadaan,'pbf'=>$pbf], compact('page_title', 'page_description','action'));
    }

    public function search_laporan_penerimaan(Request $request){
        $page_title = 'Laporan Penerimaan Obat';
        $page_description = 'Some description for the page';
		$action = 'lappenerimaan';
        
        if(count($request->all()) == 1){
            return redirect('/lappenerimaan');
        }

        $waktu = $request->bulan.', '.$request->tahun;
        $data_pbf = pbf::all();
        $data_obat = obat::where('status','Continue')
                        ->leftJoin('dosis_obat_detail','obat.id_obat','dosis_obat_detail.id_obat')
                        ->leftJoin('dosis','dosis_obat_detail.id_dosis','dosis.id_dosis')
                        ->leftJoin('satuan_obat_detail','obat.id_obat','satuan_obat_detail.id_obat')
                        ->leftJoin('satuan','satuan_obat_detail.id_satuan_obat','satuan.id_satuan_obat')->get();
        $data_detail = penerimaan::leftJoin('detail_penerimaan_obat', 'penerimaan.id_penerimaan', 'detail_penerimaan_obat.id_penerimaan')
                    ->leftJoin('pbf','penerimaan.id_pbf','pbf.id_pbf')
                    ->leftJoin('obat','detail_penerimaan_obat.id_obat','obat.id_obat')
                    ->leftJoin('dosis_obat_detail','obat.id_obat','dosis_obat_detail.id_obat')
                    ->leftJoin('dosis','dosis_obat_detail.id_dosis','dosis.id_dosis')
                    ->leftJoin('satuan_obat_detail','obat.id_obat','satuan_obat_detail.id_obat')
                    ->leftJoin('satuan','satuan_obat_detail.id_satuan_obat','satuan.id_satuan_obat')
                    ->leftJoin('kategori','obat.id_kategori','kategori.id_kategori')
                    ->leftJoin('golongan','obat.id_golongan','golongan.id_golongan')
                    ->leftJoin('pabrik','obat.id_pabrik','pabrik.id_pabrik')
                    ->where('penerimaan.tanggal_penerimaan','like','%'.$waktu.'%')->where('penerimaan.id_pbf','like','%'.$request->pbf)
                    ->get();
        foreach($data_detail as $data){
            $data->tanggal_expired_obat = Carbon::parse($data->tanggal_expired_obat)->format('j F, Y');
        }
        return view('laporan.lappenerimaan',['data_detail'=>$data_detail,'pbf'=>$data_pbf], compact('page_title', 'page_description','action'));
    }

    public function search_laporan_kategori(request $request){
        $page_title = 'Laporan Katagori';
        $page_description = 'Some description for the page';
		
		$action = 'laporankatagori';


        $data_kategori = kategori_obat::all();
        $data_golongan  = golongan_obat::all();
        $data_laporan_kategori = DB::table('obat')
                        ->where('kategori.id_kategori','like','%' . $request->kategori.'%')
                        ->where('golongan.id_golongan','like','%' . $request->golongan.'%')
                        ->where('obat.status','like','%' . $request->status.'%')
                        ->leftJoin('satuan_obat_detail','obat.id_obat','satuan_obat_detail.id_obat')
                        ->leftJoin('satuan','satuan_obat_detail.id_satuan_obat','satuan.id_satuan_obat')
                        ->leftJoin('kategori','obat.id_kategori','kategori.id_kategori')
                        ->leftJoin('golongan','obat.id_golongan','golongan.id_golongan')
                        ->leftJoin('pabrik','obat.id_pabrik','pabrik.id_pabrik')
                        ->leftJoin('dosis_obat_detail','obat.id_obat','dosis_obat_detail.id_obat')
                        ->leftJoin('dosis','dosis_obat_detail.id_dosis','dosis.id_dosis')
                        ->get();
        return view('datamaster.laporankatagori',['golongan'=>$data_golongan,'data_laporan'=>$data_laporan_kategori, 'kategori'=>$data_kategori], compact('page_title', 'page_description','action'));
    }
    public function search_laporan_kandungan(request $request){
        $page_title = 'Laporan Kandungan';
        $page_description = 'Some description for the page';
		
		$action = 'laporankandungan';

       
        $data_kategori = kategori_obat::all();
        $data_golongan  = golongan_obat::all();
        $kandungan_obat = obat_kandungan_detail::leftJoin('kandungan','obat_kandungan_detail.id_kandungan','kandungan.id_kandungan')
                                ->leftJoin('dosis','obat_kandungan_detail.id_dosis','dosis.id_dosis')
                                ->get();
                                            
        $obat = DB::table('obat')->where('kategori.id_kategori','like','%' . $request->kategori.'%')
                                ->where('golongan.id_golongan','like','%' . $request->golongan.'%')
                                ->where('obat.status','like','%' . $request->status.'%')
                                ->leftJoin('kategori','obat.id_kategori','kategori.id_kategori')
                                ->leftJoin('golongan','obat.id_golongan','golongan.id_golongan')
                                ->leftJoin('satuan_obat_detail','obat.id_obat','satuan_obat_detail.id_obat')
                                ->leftJoin('satuan','satuan_obat_detail.id_satuan_obat','satuan.id_satuan_obat')
                                ->leftJoin('dosis_obat_detail','obat.id_obat','dosis_obat_detail.id_obat')
                                ->leftJoin('dosis','dosis_obat_detail.id_dosis','dosis.id_dosis')
                                ->GroupBy('obat.id_obat')->get();
        $search_kategori=$request->kategori;
        $search_golongan=$request->golongan;
        $search_status=$request->status;
        // dd($search_status);
        return view('datamaster.laporankandungan',['kategori'=>$data_kategori,'golongan'=>$data_golongan,
                'search_kategori'=>$search_kategori,'search_golongan'=>$search_golongan,'search_status'=>$search_status,
                'obat'=>$obat,'kandungan_obat'=>$kandungan_obat], compact('page_title', 'page_description','action'));
    }
    public function search_laporan_opnam(request $request){
        
        $page_title = 'Laporan Opnam';
        $page_description = 'Some description for the page';
		
		$action = 'lapOpnam';

        $waktu = $request->bulan.', '.$request->tahun;
        $data_laporan_opnam = stok_opnam::leftJoin('stok_gudang','stok_opnam.id_stok_opnam','stok_gudang.id_stok_opname')
                            ->leftJoin('detail_penerimaan_obat','stok_gudang.id_detail_penerimaan','detail_penerimaan_obat.id_detail_penerimaan_obat')
                            ->leftJoin('obat','detail_penerimaan_obat.id_obat','obat.id_obat')
                            ->leftJoin('dosis_obat_detail','obat.id_obat','dosis_obat_detail.id_obat')
                            ->leftJoin('dosis','dosis_obat_detail.id_dosis','dosis.id_dosis')
                            ->leftJoin('satuan_obat_detail','obat.id_obat','satuan_obat_detail.id_obat')
                            ->leftJoin('satuan','satuan_obat_detail.id_satuan_obat','satuan.id_satuan_obat')
                            ->where('tanggal_opnam','like','%'.$waktu.'%')
                            ->get();
        return view('laporan.laporanOpnam',['data_stok_opnam'=>$data_laporan_opnam], compact('page_title', 'page_description','action'));
    }
}
