<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\obat;
use App\Models\stok_opnam;
use App\Models\laporan_opnam;
use App\Models\dosis;
use App\Models\pbf;

use App\Models\kandungan;
use App\Models\golongan_obat;
use App\Models\obat_kandungan_detail;
use App\Models\detail_penerimaan_obat;
use App\Models\dokter;
use App\Models\kategori_obat;

use App\Models\pabrik_obat;
use App\Models\satuan_obat;
use Illuminate\support\Facades\DB;
use App\Exports\laporan_kandungan;
use App\Exports\laporan_kategori;
use App\Models\dosis_obat_detail;
use App\Models\gudang_obat;
use App\Models\satuan_obat_detail;
use Maatwebsite\Excel\Facades\Excel;

class Datamaster extends Controller
{
    public function create_obat(Request $request){
        
        $format =  $request->satuan_obat.$request->Kategori.$request->golongan_obat;
        

        $data_id = obat::where('id_obat','like','%'.$format.'%')->max('id_obat');
        $id = (int) substr($data_id, 5, 5);
        $id++;
        $id_obat = $format. sprintf("%05s", $id);
        
        obat::insert([
            'id_obat' => $id_obat,
            'id_kategori' => $request->Kategori,
            'id_golongan' => $request->golongan_obat,
            'id_pabrik' => $request->Nama_pabrik,
            'nama_dagang_obat' => $request->nama_obat,
            'status' => $request->status,
        ]);
        if(isset($request->element)){
            foreach ($request->element as $index => $value) {
                
                if(isset($request->jumlah_dosis_kandungan[$index])){
                    $id_dosis = $request->satuan_dosis_kandungan[$index];
                }else{
                    $id_dosis = null;
                };
                obat_kandungan_detail::insert([
                    'id_obat' => $id_obat,
                    'id_kandungan' => $value,
                    'id_dosis' => $id_dosis,
                    'jumlah_dosis_kandungan' =>$request->jumlah_dosis_kandungan[$index]
                ]);
            }
        }else{
            obat_kandungan_detail::insert([
                'id_obat' => $id_obat,
            ]);
        }
        satuan_obat_detail::insert([
            'id_obat' => $id_obat,
            'id_satuan_obat' => $request->satuan_obat
        ]);

        dosis_obat_detail::insert([
            'id_dosis' => $request->satuan_dosis,
            'id_obat' => $id_obat,
            'jumlah_dosis_obat' => $request->Dosis_obat,
        ]);

        return redirect('/obat');

    }

    public function edit_obat(Request $request){
        
        DB::table('obat')->where('id_obat',$request->id)->update([
            'id_kategori' => $request->Kategori,
            'id_golongan' => $request->golongan_obat,
            'id_pabrik' => $request->pabrik,
            'nama_dagang_obat' => $request->nama_obat,
            'status' => $request->status,
        ]);
        
        obat_kandungan_detail::where('id_obat', $request->id)->delete();

        $cek_satuan = satuan_obat_detail::where('id_obat', $request->id)->first();
        // dd($request);
        if(isset($cek_satuan)){
            satuan_obat_detail::where('id_obat', $request->id)->update([
                'id_satuan_obat' => $request->satuan_obat
            ]);
        }else{
            satuan_obat_detail::insert([
                'id_obat' => $request->id,
                'id_satuan_obat' => $request->satuan_obat
            ]);
        }

        dosis_obat_detail::where('id_obat', $request->id)->update([
            'id_dosis' => $request->satuan_dosis_edit,
            'jumlah_dosis_obat' => $request->Dosis_obat,
        ]);

        if($request->element != null){
            foreach ($request->element as $index => $value) {
                
                if(isset($request->jumlah_dosis_kandungan[$index])){
                    $id_dosis = $request->satuan_dosis_kandungan[$index];
                }else{
                    $id_dosis = null;
                };

                obat_kandungan_detail::insert([
                    'id_obat' => $request->id,
                    'id_kandungan' => $value,
                    'id_dosis' => $id_dosis,
                    'jumlah_dosis_kandungan' =>$request->jumlah_dosis_kandungan[$index],
                    
                ]);
            }
        }
        return redirect('/obat');
    }

    public function create_opnam(request $request){
        // dd($request);
        
        $data_gudang = gudang_obat::leftJoin('detail_penerimaan_obat','stok_gudang.id_detail_penerimaan','id_detail_penerimaan_obat')
                            ->where('batch_number',$request->batch_number)->first();
        
        // dd($data_penerimaan);
        stok_opnam::insert([
            'id_stok_opnam' => $request->id_stok_opnam,
            'batch_number'=> $request->batch_number,
            'tanggal_opnam' => $request->tanggal_stok_opnam,
            'rekonsiliasi'=> $request->rekonsiliasi,
            'keterangan'=>$request->keterangan,
        ]);
        if(isset($data_gudang)){
            gudang_obat::where('id_history_gudang',$data_gudang->id_history_gudang)->update([
                'id_stok_opname'=>$request->id_stok_opnam
            ]);
        }else{
            $data_penerimaan = detail_penerimaan_obat::where('batch_number',$request->batch_number)->first();
            gudang_obat::insert([
                'id_stok_opname'=>$request->id_stok_opnam,
                'id_detail_penerimaan'=>$data_penerimaan->id_detail_penerimaan_obat,
                'stok'=>$data_penerimaan->jumlah_obat_diterima
            ]);
        }

        return redirect('/stok-opnam');
    }

    

    public function edit_opnam(Request $request){
        
        stok_opnam::where('id_stok_opnam',$request->id_stok_opnam)->update([
            'tanggal_opnam' => $request->tanggal_stok_opnam,
            'batch_number'=> $request->batch_number,
            'rekonsiliasi'=> $request->rekonsiliasi,
            'keterangan'=>$request->keterangan,
        ]);

        return redirect('/stok-opnam');
    }


    public function create_golongan(Request $request){
        golongan_obat::insert([
            'id_golongan' => $request->id_golongan,
            'nama_golongan' => $request->nama_golongan,
        ]);

        return redirect('/kelolagolongan');
    }

    public function edit_golongan(request $request){
        db::table('golongan')->where('id_golongan',$request->id_golongan)->update([
            'nama_golongan' => $request->nama_golongan,
        ]);
        return redirect('/kelolagolongan');
    }

    public function create_kategori(request $request){
        kategori_obat::insert([
            'id_kategori'=>$request->id_kategori,
            'nama_kategori'=>$request->nama_kategori,
        ]);
        return redirect('/kelolakatagori');
    }
    
    public function edit_kategori(request $request){
        db::table('kategori')->where('id_kategori',$request->id_kategori)->update([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect('/kelolakatagori');
    }

    public function create_satuan(request $request){
        satuan_obat::insert([
            'id_satuan_obat' => $request->id_satuan,
            'nama_satuan_obat'=>$request->nama_satuan,
        ]);

        return redirect('/satuan');
    }
    public function edit_satuan(request $request){
        db::table('satuan')->where('id_satuan_obat',$request->id_satuan)->update([
            'nama_satuan_obat' => $request->nama_satuan,
        ]);
        return redirect('/satuan');
    }

    public function create_pabrik(request $request){
        pabrik_obat::insert([
            'nama_pabrik'=> $request->nama_pabrik,
            'alamat_pabrik' => $request->alamat_pabrik,
            'no_telp_pabrik'=> $request->telp_pabrik
        ]);
        return redirect('/pabrik');
    }

    public function edit_pabrik(request $request){
        pabrik_obat::where('id_pabrik',$request->id_pabrik)->update([
            'nama_pabrik'=> $request->nama_pabrik,
            'alamat_pabrik' => $request->alamat_pabrik,
            'no_telp_pabrik'=> $request->telp_pabrik
        ]);
        return redirect('/pabrik');
    }

    public function create_kandungan(request $request){
        kandungan::insert([
            'nama_kandungan' => $request->nama_kandungan,
        ]);
        return redirect('/kandungan');
    }

    public function edit_kandungan(request $request){
        
        db::table('kandungan')->where('id_kandungan',$request->id_kandungan)->update([
            'nama_kandungan'=> $request->nama_kandungan,
        ]);
        return redirect('/kandungan');
    }

    public function create_dokter(request $request){
        
        dokter::insert([
            'nama_dokter' => $request->nama_Dokter,
            'SIP_dokter' => $request->sip_dokter,
        ]);
        return redirect('/dokter');
    }
    
    public function edit_dokter(request $request){
        
        db::table('dokter')->where('id_dokter',$request->id_dokter)->update([
            'nama_dokter'=> $request->nama_dokter,
            'SIP_dokter'=> $request->SIP_dokter,
        ]);
        return redirect('/dokter');
    }

    public function create_dosis(request $request){
        dosis::insert([
            'id_dosis' => $request->id_dosis,
            'dosis' => $request->dosis,
            'satuan_dosis' => $request->satuan_dosis
        ]);
        return redirect('/dosis');
    }

    public function edit_dosis(request $request){
        
        db::table('dosis')->where('id_dosis',$request->id_dosis)->update([
            'dosis'=> $request->dosis,
            'satuan_dosis'=> $request->satuan_dosis
        ]);
        return redirect('/dosis');
    }

    public function create_pbf(request $request){
        
        pbf::insert([
            'id_pbf' => $request->id_pbf,
            'nama_PBF' => $request->nama_pbf,
            'nama_PIC' => $request->nama_pic,
            'no_tlp_PIC' =>$request->telp_pic,
            'alamat_PBF' =>$request->alamat_pbf,
            'no_tlp_PBF' =>$request->telp_pic,
            'bank' =>$request->bank,
            'nomer_rekening'=> $request->rek_pbf,
            'leadtime' =>$request->leadtime_pbf
        ]);
        return redirect('/pbf');
    }

    public function edit_pbf(request $request){
        // dd($request);
        pbf::where('id_pbf',$request->id_pbf)->update([
            'nama_PBF' => $request->nama_pbf,
            'nama_PIC' => $request->nama_pic,
            'no_tlp_PIC' =>$request->telp_pic,
            'alamat_PBF' =>$request->alamat_pbf,
            'no_tlp_PBF' =>$request->telp_pic,
            'bank' =>$request->bank,
            'nomer_rekening'=> $request->rek_pbf,
            'leadtime' =>$request->leadtime_pbf
        ]);
        return redirect('/pbf');
    }

    public function export_laporan_kandungan(request $request){
        
                                            
        $obat = DB::table('obat')->where('kategori.id_kategori','like','%' . $request->kategori.'%')
                                ->where('golongan.id_golongan','like','%' . $request->golongan.'%')
                                ->where('obat.status','like','%' . $request->status.'%')
                                ->leftJoin('satuan_obat_detail','obat.id_obat','satuan_obat_detail.id_obat')
                                ->leftJoin('satuan','satuan_obat_detail.id_satuan_obat','satuan.id_satuan_obat')
                                ->leftJoin('dosis_obat_detail','obat.id_obat','dosis_obat_detail.id_obat')
                                ->leftJoin('dosis','dosis_obat_detail.id_dosis','dosis.id_dosis')
                                
                                ->leftJoin('kategori','obat.id_kategori','kategori.id_kategori')
                                ->leftJoin('golongan','obat.id_golongan','golongan.id_golongan')
                                ->leftJoin('pabrik','obat.id_pabrik','pabrik.id_pabrik')
                                ->GroupBy('obat.id_obat')->get();
        
        return Excel::download(new laporan_kandungan($obat), 'laporan_kandungan.xlsx');
    }
    public function export_laporan_kategori(){
        return Excel::download(new laporan_kategori, 'laporan_kategori.xlsx');
    }
}
