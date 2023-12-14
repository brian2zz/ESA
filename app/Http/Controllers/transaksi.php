<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\obat;
use App\Models\dosis;
use App\Models\pbf;
use App\Models\kandungan_obat;
use App\Models\dashboard;
use App\Models\detail_penerimaan_obat;
use App\Models\detail_pengeluaran_obat;
use App\Models\obat_pengeluaran;
use App\Models\kandungan;
use App\Models\pengadaan;
use App\Models\penerimaan;
use App\Models\golongan_obat;
use App\Models\pengeluaran;
use App\Models\gudang_obat;
use App\Models\kategori_obat;
use App\Models\pabrik_obat;
use App\Models\satuan_obat;
use Carbon\Carbon;
use Illuminate\support\Facades\Session;
use Illuminate\support\Facades\DB;

class transaksi extends Controller
{
    public function create_pengeluaran(request $request){
        $time = carbon::now()->format('H:i:s');
        $id_pengeluaran = pengeluaran::max('id_pengeluaran');
        $id_pengeluaran = $id_pengeluaran+1;
        // dd($request);
        pengeluaran::insert([
            'id_pengeluaran' => $id_pengeluaran,
            'id_dokter' => $request->id_dokter,
            'id_kategori_pengeluaran' => $request->id_kategori,
            'no_resep' => $request->nomor_resep,
            'tanggal_pengeluaran' => $request->buy_date,
            'submited' => 'false',
            'racikan' => $request->racikan,
            'resep_diterima'=> $time,
        ]);
        foreach ($request->batch_number as $index => $value){
            $cara_pakai = $request->tata_cara1[$index].'X'.$request->tata_cara2[$index];
            // dd($cara_pakai);
            detail_pengeluaran_obat::insert([
                'id_pengeluaran' => $id_pengeluaran,
                'batch_number' => $value,
                'tata_cara_pemakaian' => $cara_pakai,
                'jumlah_obat_keluar'=>$request->jumlah[$index],
            ]);
            
        }

        return redirect('/halpengeluaran');
    }
    public function edit_pengeluaran(request $request){
        // dd($request);
        $time_in = $request->resep_masuk;
        $s= rand(0,60);
        $resep_masuk = $time_in.':'.$s;
        pengeluaran::where('id_pengeluaran',$request->id_pengeluaran)
        ->update([
            'id_dokter'=> $request->id_dokter,
            'id_kategori_pengeluaran' => $request->id_kategori,
            'no_resep'=>$request->nomor_resep,
            'tanggal_pengeluaran' => $request->buy_date,
            'submited' =>'false',
            'racikan' => $request->racikan,
            'resep_diterima' => $resep_masuk,
        ]);
        detail_pengeluaran_obat::where('id_pengeluaran',$request->id_pengeluaran)->delete();
        foreach ($request->batch_number as $index => $value){
            $cara_pakai = $request->tata_cara1[$index].'X'.$request->tata_cara2[$index];
            detail_pengeluaran_obat::insert([
                'id_pengeluaran' => $request->id_pengeluaran,
                'batch_number'=>$value,
                'tata_cara_pemakaian' => $cara_pakai,
                'jumlah_obat_keluar' => $request->jumlah[$index],
            ]);
                
        }
        
        return redirect('/halpengeluaran');
    }

    public function submit_pengeluaran($id){
        $data_pengeluaran_submit = detail_pengeluaran_obat::
                                        leftJoin('pengeluaran','detail_pengeluaran_obat.id_pengeluaran','pengeluaran.id_pengeluaran')
                                        ->where('detail_pengeluaran_obat.id_pengeluaran',$id)->get();
        // dd($data_pengeluaran_submit);
        $timestamp_keluar = carbon::now()->format('H:i:s');

        pengeluaran::where('id_pengeluaran', $id)->update([
            'resep_dikeluarkan' => $timestamp_keluar,
            'submited' => 'true'
        ]);

        foreach ($data_pengeluaran_submit as $data){
            $penerimaan = detail_penerimaan_obat::where('batch_number',$data->batch_number)->first();
            $data_gudang = gudang_obat::where('id_detail_penerimaan',$penerimaan->id_detail_penerimaan_obat)->first();
            if(!isset($data_gudang)){
                gudang_obat::insert([
                    'id_detail_penerimaan'=>$penerimaan->id_detail_penerimaan_obat,
                    'id_detail_pengeluaran'=>$data->id_obat_pengeluaran,
                    'stok' => $penerimaan->jumlah_obat_diterima - $data->jumlah_obat_keluar
                ]);
            }else{
                gudang_obat::where('id_history_gudang',$data_gudang->id_history_gudang)->update([
                    'id_detail_penerimaan'=>$penerimaan->id_detail_penerimaan_obat,
                    'id_detail_pengeluaran'=>$data->id_obat_pengeluaran,
                    'id_stok_opname'=>$data_gudang->id_stok_opnam,
                    'stok' => $data_gudang->stok - $data->jumlah_obat_keluar
                ]);
            }
        }   

        return redirect('/halpengeluaran');
    }

    public function create_pengadaan(request $request){
        
        $data = pengadaan::count('id_pengadaan');
        $data++;
        $id_pengadaan = $data;
       
        $tanggal = substr($request->tanggal,2);
        $pengeluaran = DB::table('pengeluaran')
                        ->where('tanggal_pengeluaran','like','%'.$tanggal)
                        ->get();
        $pbf = pbf::where('id_pbf',$request->id_pbf)->get();
        if($request->tanggal==null){
            Session::flash('message', "Tanggal tidak boleh kosong");
            return redirect('/tambahpengadaan');
        }else{
            // dd($request)->get();
            if(!$pengeluaran->isEmpty()){
                foreach($pbf as $data_pbf){
                    $leadtime = $data_pbf->leadtime;
                }
              
                pengadaan::insert([
                    'id_pengadaan'=> $id_pengadaan,
                    'tanggal_pengadaan' => $request->tanggal,
                    'waktu_pengadaan'=>$request->waktu_pengadaan,
                    'pbf'=>$request->id_pbf,
                    'leadtime' => $leadtime,
                    'jumlah_hari' => 30
                ]);  
    
                foreach ($request->obat as $index => $value) {
                    
                    $pengeluaran = DB::table('pengeluaran')->leftJoin('obat_pengeluaran','pengeluaran.id_pengeluaran','obat_pengeluaran.id_pengeluaran')
                                ->where('tanggal_pengeluaran','like','%'.$tanggal)
                                ->where('id_obat','like','%'.$value)
                                ->get();
                    
                    if($pengeluaran->isEmpty()){
                        $CA = 0;
                    }else{
                        foreach($pengeluaran as $data){
                            $CA = $data->jumlah_keluar;
                        }
                    }
                    
                    $obat = DB::table('gudang_obat')->where('id',$value)->get();
                    foreach($obat as $data_obat){
                        $stok_obat = $data_obat->stok;
                    }
                    
                    $sisa_stok = $stok_obat - $CA;
                    $stok_min = $leadtime / 30 * $request->kebutuhan_obat[$index];
                    
                    $CT = $CA * $request->waktu_pengadaan + $stok_min - $sisa_stok;
                    // dd($stok_min);
                    DB::table('detail_pengadaan')->insert([
                        'id_pengadaan' => $id_pengadaan,
                        'pabrik' => $request->pabrik[$index],
                        'id_obat' => $value,
                        'harga' => $request->harga[$index],
                        'CA' => $CA,
                        'jumlah_kebutuhan_obat' => $request->kebutuhan_obat[$index],
                        'stok_minimal' => $stok_min,
                        'sisa_stok' => $sisa_stok,
                        'CT' => $CT
                    ]);
                }
        
                return redirect('/halpengadaan');
            }else{
                Session::flash('message', "Tidak ada pengeluaran di tanggal tersebut");
                return redirect('/tambahpengadaan');
            }
        }
        
    }
    public function edit_pengadaan(request $request){
        // dd($request);
        $tanggal = substr($request->tanggal,2);
       

        $pbf = pbf::where('id_pbf',$request->id_pbf)->get();

        foreach($pbf as $data_pbf){
            $leadtime = $data_pbf->leadtime;
        }
        db::table('pengadaan')->where('id_pengadaan',$request->id_pengadaan)->update([
            'tanggal_pengadaan' => $request->tanggal,
            'waktu_pengadaan'=>$request->waktu_pengadaan,
            'pbf'=>$request->id_pbf,
            'leadtime' => $leadtime,
            'jumlah_hari' => 30
        ]);  
        DB::table('detail_pengadaan')->where('id_pengadaan',$request->id_pengadaan)->delete();
        foreach ($request->obat as $index => $value) {
            $pengeluaran = DB::table('pengeluaran')
                            ->where('tanggal','like','%'.$tanggal)
                            ->where('id_obat','like','%'.$value)
                            ->get();
            if($pengeluaran->isEmpty()){
                $CA = 0;
            }else{
                foreach($pengeluaran as $data){
                    $CA = $data->jumlah_keluar;
                }
            }
            $obat = DB::table('gudang_obat')->where('id',$value)->get();
            foreach($obat as $data_obat){
                $stok_obat = $data_obat->stok;
            }
            $sisa_stok = $stok_obat - $CA;
            $stok_min = $leadtime / $request->jumlah_hari * $request->kebutuhan_obat[$index];
            $CT = ($CA * $request->waktu_pengadaan) + $stok_min - $sisa_stok;
            
            DB::table('detail_pengadaan')->insert([
                'id_pengadaan' => $request->id_pengadaan,
                'pabrik' => $request->pabrik[$index],
                'id_obat' => $value,
                'harga' => $request->harga[$index],
                'CA' => $CA,
                'jumlah_kebutuhan_obat' => $request->kebutuhan_obat[$index],
                'stok_minimal' => $stok_min,
                'sisa_stok' => $sisa_stok,
                'CT' => $CT
            ]);
        }

        return redirect('/halpengadaan');
    }
    public function create_penerimaan(request $request){
        $tanggal_expired = [];
        $i = 0;
        foreach($request->tanggal_expired as $expired_date){
            $expired = explode(" ", $expired_date);
            $tanggal = $expired[0];
            $nama_bulan = rtrim($expired[1], ',');
            $tahun = $expired[2];
    
            switch ($nama_bulan){
                case('January'):
                    $bulan = 1;
                    break;
                case('February'):
                    $bulan = 2;
                    break;
                case('March'):
                    $bulan = 3;
                    break;
                case('April'):
                    $bulan = 4;
                    break;
                case('May'):
                    $bulan = 5;
                    break;
                case('June'):
                    $bulan = 6;
                    break;
                case('July'):
                    $bulan = 7;
                    break;
                case('August'):
                    $bulan = 8;
                    break;
                case('September'):
                    $bulan = 9;
                    break;
                case('October'):
                    $bulan = 10;
                    break;
                case('November'):
                    $bulan = 11;
                    break;
                case('December'):
                    $bulan = 12;
                    break;
            }
    
            $tanggal_expired[$i] = $tahun.'-'.$bulan.'-'.$tanggal;
            $i++;
        };
        // dd($tanggal_expired);

        $max_id_penerimaan = penerimaan::max('id_penerimaan');
        $id_penerimaan = $max_id_penerimaan+1;
        
        // dd($request);
        penerimaan::insert([
            'id_penerimaan' => $id_penerimaan,
            'id_pbf'=>$request->pbf,
            'tanggal_penerimaan'=>$request->tanggal_penerimaan
        ]);

        foreach ($request->obat as $index => $value){
            $max_id_detail_penerimaan = detail_penerimaan_obat::max('id_detail_penerimaan_obat');
            $id_detail_penerimaan = $max_id_detail_penerimaan+1;
            detail_penerimaan_obat::insert([
                'id_detail_penerimaan_obat'=>$id_detail_penerimaan,
                'id_obat' => $value,
                'id_penerimaan' => $id_penerimaan,
                'batch_number' =>$request->batch_number[$index],    
                'jumlah_obat_diterima' => $request->jumlah_terima[$index],
                'tanggal_expired_obat' => $tanggal_expired[$index],
                'harga_beli_satuan' => $request->harga_beli_satuan[$index],
                'total_harga_beli' =>$request->total_harga[$index],
                'expired_status' => $request->status_expired[$index],
                'harga_jual' => $request->harga_jual[$index],  
            ]);
           
        }


        return redirect('/halpenerimaan');
    }
    public function edit_penerimaan(request $request){
        // dd($request);
        $tanggal_expired = [];
        $i = 0;
        foreach($request->tanggal_expired as $expired_date){
            $expired = explode(" ", $expired_date);
            $tanggal = $expired[0];
            $nama_bulan = rtrim($expired[1], ',');
            $tahun = $expired[2];
    
            switch ($nama_bulan){
                case('January'):
                    $bulan = 1;
                    break;
                case('February'):
                    $bulan = 2;
                    break;
                case('March'):
                    $bulan = 3;
                    break;
                case('April'):
                    $bulan = 4;
                    break;
                case('May'):
                    $bulan = 5;
                    break;
                case('June'):
                    $bulan = 6;
                    break;
                case('July'):
                    $bulan = 7;
                    break;
                case('August'):
                    $bulan = 8;
                    break;
                case('September'):
                    $bulan = 9;
                    break;
                case('October'):
                    $bulan = 10;
                    break;
                case('November'):
                    $bulan = 11;
                    break;
                case('December'):
                    $bulan = 12;
                    break;
            }
    
            $tanggal_expired[$i] = $tahun.'-'.$bulan.'-'.$tanggal;
            $i++;
        };
        
        penerimaan::where('id_penerimaan',$request->id_penerimaan)->update([
            'id_pbf'=>$request->pbf,
            'tanggal_penerimaan'=>$request->tanggal_penerimaan
        ]);

        $data_detail_penerimaan = detail_penerimaan_obat::where('id_penerimaan', $request->id_penerimaan)->get();

        
        foreach ($request->obat as $index => $value){
            $data_gudang = gudang_obat::where('id_detail_penerimaan',$request->id_detail_penerimaan[$index])->first();
            
            
            if(isset($data_gudang)){
                $data_pengeluaran = detail_pengeluaran_obat::where('id_obat_pengeluaran',$data_gudang->id_detail_pengeluaran)->first();
                detail_penerimaan_obat::where('id_detail_penerimaan_obat',$request->id_detail_penerimaan[$index])->update([ 
                    'jumlah_obat_diterima' => $request->jumlah_terima[$index],
                    'tanggal_expired_obat' => $tanggal_expired[$index],
                    'harga_beli_satuan' => $request->harga_beli_satuan[$index],
                    'total_harga_beli' =>$request->total_harga[$index],
                    'expired_status' => $request->status_expired[$index],
                    'harga_jual' => $request->harga_jual[$index],  
                ]);
                gudang_obat::where('id_detail_penerimaan',$request->id_detail_penerimaan[$index])->update([
                    'stok'=>$request->jumlah_terima[$index] - $data_pengeluaran->jumlah_obat_keluar
                ]);
            }else{
                detail_penerimaan_obat::where('id_detail_penerimaan_obat',$request->id_detail_penerimaan[$index])->delete();
                    detail_penerimaan_obat::insert([
                        'id_detail_penerimaan_obat'=>$request->id_detail_penerimaan[$index],
                        'id_obat' => $value,
                        'id_penerimaan' => $request->id_penerimaan,
                        'batch_number' =>$request->batch_number[$index],    
                        'jumlah_obat_diterima' => $request->jumlah_terima[$index],
                        'tanggal_expired_obat' => $tanggal_expired[$index],
                        'harga_beli_satuan' => $request->harga_beli_satuan[$index],
                        'total_harga_beli' =>$request->total_harga[$index],
                        'expired_status' => $request->status_expired[$index],
                        'harga_jual' => $request->harga_jual[$index],  
                    ]);
                    
            };
        }

        return redirect('/halpenerimaan');
    }
    public function submit_penerimaan($id){
        
        $table_stok = penerimaan::where('id_penerimaan',$id)->get();
        foreach ($table_stok as $data){
            $id_obat = $data->id_obat;
            $no_batch = $data->batch_number;
            $tanggal = $data->tanggal_penerimaan;
            $expired = $data->tanggal_expired;
            $pbf = $data->pbf;
            $stok = $data->jumlah_diterima;
            $beli = $data->total_harga_beli;
            $jual = $data->harga;
            $updated = $data->updated;
        }

        $date = carbon::now()->format('F, Y');
        $sub_time = Carbon::now()->subMonth()
                    ->format('F, Y');    
        $data_dashboard = dashboard::where('tanggal','like','%'.$date.'%')->where('id_obat',$id_obat)->first();
        
        if (empty($data_dashboard)){
            $prev_data_dashboard = dashboard::where('tanggal','like','%'.$sub_time)->where('id_obat',$id_obat)->first();
            
            if(!empty($prev_data_dashboard)){
                
                dashboard::insert([
                    'id_obat' => $id_obat,
                    'tanggal' => $tanggal,
                    'jumlah_terima' => $stok,
                    'tanggal_terima' => $tanggal,
                    'total_pengeluaran' => 0,
                    'stok_bulan' => $stok + $prev_data_dashboard->sisa_stok,
                    'sisa_stok' => $stok + $prev_data_dashboard->sisa_stok,
                ]);
            }else{
                dashboard::insert([
                    'id_obat' => $id_obat,
                    'tanggal' => $tanggal,
                    'jumlah_terima' => $stok,
                    'total_pengeluaran' => 0,
                    'tanggal_terima' => $tanggal,
                    'stok_bulan' => $stok,
                    'sisa_stok' => $stok,
                ]);
            }
        }else{
            $sisa_stok_baru = $data_dashboard->sisa_stok + $stok;
            $stok_bulan_baru = $data_dashboard->stok_bulan + $stok;
            $stok_terima_baru = $data_dashboard->jumlah_terima + $stok;
            dashboard::where('tanggal','like','%'.$date.'%')->where('id_obat',$id_obat)->update([
                'jumlah_terima' => $stok_terima_baru,
                'sisa_stok' => $sisa_stok_baru,
                'stok_bulan' => $stok_bulan_baru,
            ]);
        }
        
        db::table('penerimaan')->where('id_penerimaan',$id)->update([
            'updated' => 'true',
        ]);
        
        gudang_obat::create([
            'batch_number' => $no_batch,
            'tanggal_batch_diterima' => $tanggal,
            'expired_date' => $expired,
            'id_obat' => $id_obat,
            'harga_beli' => $beli,
            'harga_jual' => $jual,
            'stok' => $stok,
            'expired' => 'false',
            'updated_dashboard' => 0,
        ]);
        return redirect('/halpenerimaan');  
    }
}
