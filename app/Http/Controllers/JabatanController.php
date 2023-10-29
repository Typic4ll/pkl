<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jabatan;

class JabatanController extends Controller
{
    public function Jabatan(){
        $varJabatan = jabatan::all();
        // $varUser = User::orderBy('id','desc')->paginate(2);
        // $varUser = User::orderBy('id','desc')->get();
        // $varUser = User::latest()->get();
        return view('jabatan.jabatan', compact('varJabatan'));
    }

    public function SimpanJabatan(Request $request){
        jabatan::create([
            'nama_jabatan'=> $request->nama_jabatan,
        ]);
        return back()->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    public function EditJabatan($id){
        $varJabatan = jabatan::findOrFail($id);
        return view('jabatan.edit_jabatan', compact('varJabatan'));
    }
    
    public function PerubahanJabatan(Request $request, $id){
        $varJabatan = jabatan::findOrFail($id);
        $data = [
            'nama_jabatan'=> $request->nama_jabatan,
        ];

        $varJabatan->update($data);
        return redirect('data-jabatan')->with('toast_success', 'Data Berhasil Diedit');
    } 

    public function HapusJabatan($id)
    {
        $varJabatan = jabatan::findOrFail($id);
        $varJabatan->delete();
        return back();
    }
}
