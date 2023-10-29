<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pegawai;
use App\Models\jabatan;
class PegawaiController extends Controller
{
    public function Pegawai(){
        $varPegawai = pegawai::with('jabatan')->latest()->get();
        // $varUser = User::orderBy('id','desc')->paginate(2);
        // $varUser = User::orderBy('id','desc')->get();
        // $varUser = User::latest()->get();
        return view('pegawai.pegawai', compact('varPegawai'));
    }

    public function TambahPegawai(){
        $show = jabatan::all();
        return view('pegawai.tambah_pegawai', compact('show'));
    }

    public function SimpanPegawai(Request $request){
        pegawai::create([
            'id'=> $request->id,
            'nama'=> $request->nama,
            'jabatan_id'=> $request->jabatan_id,
            'tanggal_lahir'=> $request->tanggal_lahir,
            'tempat_lahir'=> $request->tempat_lahir,
            'alamat'=> $request->alamat,
            'no_telpon'=> $request->no_telpon,
        ]);
        return redirect('data-pegawai')->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    public function EditPegawai($id){
        $varPegawai = pegawai::findOrFail($id);
        $show1 = jabatan::all();
        return view('pegawai.edit_pegawai', compact('varPegawai', 'show1'));
    }
    
    public function PerubahanPegawai(Request $request, $id){
        $varPegawai = pegawai::findOrFail($id);
        $data = [
            'nama'=> $request->nama,
            'jabatan_id'=> $request->jabatan_id,
            'tanggal_lahir'=> $request->tanggal_lahir,
            'tempat_lahir'=> $request->tempat_lahir,
            'alamat'=> $request->alamat,
            'no_telpon'=> $request->no_telpon,
        ];

        $varPegawai->update($data);
        return redirect('data-pegawai')->with('toast_success', 'Data Berhasil Diedit');
    } 

    public function HapusPegawai($id)
    {
        $varPegawai = pegawai::findOrFail($id);
        $varPegawai->delete();
        return back();
    }
}
