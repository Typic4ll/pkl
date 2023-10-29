<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\surat_keluar;
use App\Models\perihal;
use App\Models\pegawai;
use App\Models\jabatan;

class SuratKeluarController extends Controller
{
    public function SuratKeluar(request $request){
        $search = $request->query('search');
        if(!empty($search)){
            $varSuratKeluar = surat_keluar::join('perihal', 'perihal.id', '=', 'surat_keluar.perihal_id')
            ->where('surat_keluar.no_surat','like','%'.$search.'%')
            ->orWhere('surat_keluar.tujuan_surat','like','%'.$search.'%')
            ->orWhere('surat_keluar.keterangan','like','%'.$search.'%')
            ->orWhere('perihal.nama_perihal','like','%'.$search.'%')
            ->paginate(5);
        }else{
            $varSuratKeluar = surat_keluar::latest('id')->paginate(5);
        }
        return view('surat_keluar.surat_keluar', compact('varSuratKeluar'));
    }

        public function CetakSuratKeluar(){
        return view('surat_keluar.cetak_surat_keluar');
    }

    public function Cetak($tangal_awal, $tanggal_akhir){
        $cetak = surat_keluar::with('perihal')->whereBetween('tanggal_surat', [$tangal_awal, $tanggal_akhir])->get();
        $jumlah = surat_keluar::with('perihal')->whereBetween('tanggal_surat', [$tangal_awal, $tanggal_akhir])->count();
        $pegawai = pegawai::find(197402102006012013);
        $jabatan = pegawai::with('jabatan')->get();
        return view('surat_keluar.cetak', compact('cetak', 'jumlah', 'pegawai', 'jabatan'));
    }

    public function TambahSuratKeluar(){
        $show = perihal::all();
        return view('surat_keluar.tambah_surat_keluar' , compact('show'));
    }

    public function SimpanSuratKeluar(Request $request){
        $this->validate($request, [
            'no_surat' => 'required|unique:surat_keluar,no_surat',
            'tujuan_surat' => 'required',
            'tanggal_surat' => 'required',
            'perihal_id' => 'required',
            'keterangan' => 'required',
            'dokumen' => 'required|mimes:pdf'
        ],
            [
                'no_surat.required' => 'No Surat Tidak Boleh Kosong',
                'no_surat.unique' => 'No Surat Tidak Boleh Sama',
                'tujuan_surat.required' => 'Tujuan Surat Tidak Boleh Kosong',
                'tanggal_surat.required' => 'Tanggal Surat Tidak Boleh Kosong',
                'perihal_id.required' => 'Perihal Tidak Boleh Kosong',
                'keterangan.required' => 'Keterangan Tidak Boleh Kosong',
                'dokumen.required' => 'Dokumen Tidak Boleh Kosong',
                'dokumen.mimes' => 'Dokumen Hanya Boleh PDF',
            ]);

        $dokumen = $request->file('dokumen');
        $nama_dokumen = 'EKRAF' .date('Ymdhis').'.'.$request->file('dokumen')->getClientOriginalExtension();
        $dokumen->move('file/',$nama_dokumen);
        surat_keluar::create([
            'no_surat'=> $request->no_surat,
            'tujuan_surat'=> $request->tujuan_surat,
            'tanggal_surat'=> $request->tanggal_surat,
            'perihal_id'=> $request->perihal_id,
            'keterangan'=> $request->keterangan,
            'dokumen' => $nama_dokumen
        ]);
        return redirect('data-surat-keluar')->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    public function EditSuratKeluar($id){
        $varSuratKeluar = surat_keluar::findOrFail($id);
        $show1 = perihal::all();
        return view('surat_keluar.edit_surat_keluar', compact('varSuratKeluar', 'show1'));
    }
    
    public function PerubahanSuratKeluar(Request $request, $id){
        $varSuratKeluar = surat_keluar::findOrFail($id);
        $this->validate($request, [
            'tujuan_surat' => 'required',
            'tanggal_surat' => 'required',
            'perihal_id' => 'required',
            'keterangan' => 'required',
        ],
            [
                'tujuan_surat.required' => 'Tujuan Surat Tidak Boleh Kosong',
                'tanggal_surat.required' => 'Tanggal Surat Tidak Boleh Kosong',
                'perihal_id.required' => 'Perihal Tidak Boleh Kosong',
                'keterangan.required' => 'Keterangan Tidak Boleh Kosong',
            ]);
        $data = [
            'tujuan_surat'=> $request->tujuan_surat,
            'tanggal_surat'=> $request->tanggal_surat,
            'perihal_id'=> $request->perihal_id,
            'keterangan'=> $request->keterangan,
        ];

        $varSuratKeluar->update($data);
        return redirect('data-surat-keluar')->with('toast_success', 'Data Berhasil Diedit');
    } 

    public function HapusSuratKeluar($id)
    {
        $varSuratKeluar = surat_keluar::findOrFail($id);
        File::delete(public_path('file').'/'.$varSuratKeluar->dokumen);
        $varSuratKeluar->delete();
        return back();
    }
}
