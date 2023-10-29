<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatan';
    protected $primarykey = 'id';
    protected $fillable = [
        'id',
        'nama_jabatan'
    ];

    public function pegawai(){
        return $this->hasMany(pegawai::class);
    }

    public function surat_masuk(){
        return $this->hasMany(surat_masuk::class);
    }

    public function surat_keluar(){
        return $this->hasMany(surat_masuk::class);
    }
}
