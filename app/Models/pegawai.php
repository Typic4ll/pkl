<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $primarykey = 'id';
    protected $fillable = [
        'id',
        'nama',
        'jabatan_id',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'no_telpon'
    ];

    public function jabatan(){
        return $this->belongsTo(jabatan::class, "jabatan_id");
    }

    public function surat_masuk(){
        return $this->hasMany(surat_masuk::class);
    }

    public function surat_keluar(){
        return $this->hasMany(surat_masuk::class);
    }
}
