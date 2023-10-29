<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_keluar extends Model
{
    use HasFactory;
    protected $table = 'surat_keluar';
    protected $primarykey = 'id';
    protected $fillable = [
        'no_surat',
        'tujuan_surat',
        'tanggal_surat',
        'perihal_id',
        'keterangan',
        'dokumen'
    ];

    public function perihal(){
        return $this->belongsTo(perihal::class, "perihal_id");
    }

    public function pegawai(){
        return $this->belongsTo(pegawai::class, "pegawai_id");
    }

    public function jabatan(){
        return $this->belongsTo(jabatan::class);
    }
}
