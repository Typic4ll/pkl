<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\perihal;

class PerihalController extends Controller
{
    public function Perihal(){
        $varPerihal = perihal::all();
        // $varUser = User::orderBy('id','desc')->paginate(2);
        // $varUser = User::orderBy('id','desc')->get();
        // $varUser = User::latest()->get();
        return view('perihal.perihal', compact('varPerihal'));
    }

    public function TambahPerihal(){
        return view('perihal.tambah_perihal');
    }

    public function SimpanPerihal(Request $request){
        perihal::create([
            'nama_perihal'=> $request->nama_perihal,
        ]);
        return redirect('data-perihal')->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    public function EditPerihal($id){
        $varPerihal = perihal::findOrFail($id);
        return view('perihal.edit_perihal', compact('varPerihal'));
    }
    
    public function PerubahanPerihal(Request $request, $id){
        $varPerihal = perihal::findOrFail($id);
        $data = [
            'nama_perihal'=> $request->nama_perihal,
        ];

        $varPerihal->update($data);
        return redirect('data-perihal')->with('toast_success', 'Data Berhasil Diedit');
    } 

    public function HapusPerihal($id)
    {
        $varPerihal = perihal::findOrFail($id);
        $varPerihal->delete();
        return back();
    }
}
