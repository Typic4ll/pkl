<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\surat_masuk;
use App\Models\surat_keluar;
use Auth;
use Session;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function simpan(Request $request){
        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
        ]);
        return redirect('login');
    }

    public function postLogin(Request $request){
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email Wajib Di Isi',
            'password.required' => 'Password Wajib Di Isi'
        ]);
        if (Auth::attempt(
            [
                'email'=> $request->email,
                'password'=> $request->password,
            ]
            )){
                return redirect('/'); 
            }
        return redirect('login')->withErrors('Email dan Password Yang Anda Masukkan Tidak Valid');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    public function jumlah(){
      $jumlah_masuk = surat_masuk::count();
      $jumlah_keluar = surat_keluar::count();
      $jumlah_undangan = surat_masuk::where('perihal_id', '1')->get()->count();
      $jumlah_pengajuan = surat_masuk::where('perihal_id', '2')->get()->count();
      $jumlah_permohonan = surat_masuk::where('perihal_id', '3')->get()->count();
      $jumlah_edaran = surat_masuk::where('perihal_id', '4')->get()->count();
      $jumlah_keputusan = surat_masuk::where('perihal_id', '5')->get()->count();
      $jumlah_tugas = surat_masuk::where('perihal_id', '7')->get()->count();
      $jumlah_perjalanan = surat_masuk::where('perihal_id', '9')->get()->count();
      $jumlah_undangan1 = surat_keluar::where('perihal_id', '1')->get()->count();
      $jumlah_pengajuan1 = surat_keluar::where('perihal_id', '2')->get()->count();
      $jumlah_permohonan1 = surat_keluar::where('perihal_id', '3')->get()->count();
      $jumlah_edaran1 = surat_keluar::where('perihal_id', '4')->get()->count();
      $jumlah_keputusan1 = surat_keluar::where('perihal_id', '5')->get()->count();
      $jumlah_tugas1 = surat_keluar::where('perihal_id', '7')->get()->count();
      $jumlah_perjalanan1 = surat_keluar::where('perihal_id', '9')->get()->count();
      return view('welcome', compact('jumlah_masuk', 'jumlah_keluar', 'jumlah_undangan', 'jumlah_undangan1',
    'jumlah_permohonan', 'jumlah_pengajuan', 'jumlah_edaran', 'jumlah_keputusan', 'jumlah_tugas', 'jumlah_perjalanan',
    'jumlah_permohonan1', 'jumlah_pengajuan1', 'jumlah_edaran1', 'jumlah_keputusan1', 'jumlah_tugas1', 'jumlah_perjalanan1'));  
    }

    public function singlep(){
        //$single = surat_masuk::findOrFail($perihal_id);
        $single = surat_masuk::where('perihal_id', '3')->paginate(5);
        return view('singlep', compact('single'));
    }
}
