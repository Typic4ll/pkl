<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\surat_masuk;
use App\Models\perihal;
use App\Models\pegawai;
use App\Models\jabatan;

class SuratMasukController extends Controller
{
    public function SuratMasuk(request $request){
        $search = $request->query('search');
        if(!empty($search)){
            $varSuratMasuk = surat_masuk::with('pegawai')->join('perihal', 'perihal.id', '=', 'surat_masuk.perihal_id')
            ->where('surat_masuk.no_surat','like','%'.$search.'%')
            ->orWhere('surat_masuk.asal_surat','like','%'.$search.'%')
            ->orWhere('surat_masuk.keterangan','like','%'.$search.'%')
            ->orWhere('surat_masuk.tanggal_terima','like','%'.$search.'%')
            ->orWhere('perihal.nama_perihal','like','%'.$search.'%')
            ->paginate(5);
        }else{
            $varSuratMasuk = surat_masuk::latest('id')->paginate(5);
        }
        return view('surat_masuk.surat_masuk', compact('varSuratMasuk'));
        //tampilkan data berdasarkan tanggal terima surat dan tambah kan penomoran auto increment sebagai id
    }

    public function CetakSuratMasuk(){
        return view('surat_masuk.cetak_surat_masuk');
    }

    public function Cetak($tangal_awal, $tanggal_akhir){
        $cetak = surat_masuk::with('perihal')->whereBetween('tanggal_terima', [$tangal_awal, $tanggal_akhir])->get();
        $jumlah = surat_masuk::with('perihal')->whereBetween('tanggal_terima', [$tangal_awal, $tanggal_akhir])->count();
        $pegawai = pegawai::find(197402102006012013);
        $jabatan = pegawai::with('jabatan')->get();
        return view('surat_masuk.cetak', compact('cetak', 'jumlah', 'pegawai', 'jabatan'));
    }


    public function TambahSuratMasuk(){
        $show = perihal::all();
        $pegawai = pegawai::all();
        return view('surat_masuk.tambah_surat_masuk' , compact('show', 'pegawai'));
    }

    public function SimpanSuratMasuk(Request $request){

        $this->validate($request, [
            'no_surat' => 'required|unique:surat_masuk,no_surat',
            'asal_surat' => 'required',
            'tanggal_surat' => 'required',
            'tanggal_terima' => 'required',
            'perihal_id' => 'required',
            'keterangan' => 'required',
            'pegawai_id' => 'required',
            'dokumen' => 'required|mimes:pdf'
        ],
            [
                'no_surat.required' => 'No Surat Tidak Boleh Kosong',
                'no_surat.unique' => 'No Surat Tidak Boleh Sama',
                'asal_surat.required' => 'Asal Surat Tidak Boleh Kosong',
                'tanggal_surat.required' => 'Tanggal Surat Tidak Boleh Kosong',
                'tanggal_terima.required' => 'Tanggal Terima Tidak Boleh Kosong',
                'perihal_id.required' => 'Perihal Tidak Boleh Kosong',
                'keterangan.required' => 'Keterangan Tidak Boleh Kosong',
                'pegawai_id.required' => 'Pegawai Tidak Boleh Kosong',
                'dokumen.required' => 'Dokumen Tidak Boleh Kosong',
                'dokumen.mimes' => 'Dokumen Hanya Boleh PDF',
            ]);
        $dokumen = $request->file('dokumen');
        $nama_dokumen = 'EKRAF' .date('Ymdhis').'.'.$request->file('dokumen')->getClientOriginalExtension();
        $dokumen->move('file/',$nama_dokumen);
    
        surat_masuk::create([
            'no_surat'=> $request->no_surat,
            'asal_surat'=> $request->asal_surat,
            'tanggal_surat'=> $request->tanggal_surat,
            'tanggal_terima'=> $request->tanggal_terima,
            'perihal_id'=> $request->perihal_id,
            'keterangan'=> $request->keterangan,
            'pegawai_id'=> $request->pegawai_id,
            'dokumen' => $nama_dokumen
            
        ]);
        return redirect('data-surat-masuk')->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    public function EditSuratMasuk($id){
        $varSuratMasuk = surat_masuk::findOrFail($id);
        $show1 = perihal::all();
        return view('surat_masuk.edit_surat_masuk', compact('varSuratMasuk', 'show1'));
    }
    
    public function PerubahanSuratMasuk(Request $request, $id){
        $varSuratMasuk = surat_masuk::findOrFail($id);
        $this->validate($request, [
            'asal_surat' => 'required',
            'tanggal_surat' => 'required',
            'tanggal_terima' => 'required',
            'perihal_id' => 'required',
            'keterangan' => 'required',
        ],
            [
                'asal_surat.required' => 'Asal Surat Tidak Boleh Kosong',
                'tanggal_surat.required' => 'Tanggal Surat Tidak Boleh Kosong',
                'tanggal_terima.required' => 'Tanggal Terima Tidak Boleh Kosong',
                'perihal_id.required' => 'Perihal Tidak Boleh Kosong',
                'keterangan.required' => 'Keterangan Tidak Boleh Kosong',
            ]);
        $data = [
            'asal_surat'=> $request->asal_surat,
            'tanggal_surat'=> $request->tanggal_surat,
            'tanggal_terima'=> $request->tanggal_terima,
            'perihal_id'=> $request->perihal_id,
            'keterangan'=> $request->keterangan,
        ];

        $varSuratMasuk->update($data);
        return redirect('data-surat-masuk')->with('toast_success', 'Data Berhasil Diedit');
    } 

    public function HapusSuratMasuk($id)
    {
        $varSuratMasuk = surat_masuk::findOrFail($id);
        File::delete(public_path('file').'/'.$varSuratMasuk->dokumen);
        $varSuratMasuk->delete();
        return back();
    }
}
