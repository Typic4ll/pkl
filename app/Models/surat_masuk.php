<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_masuk extends Model
{
    use HasFactory;
    protected $table = 'surat_masuk';
    protected $primarykey = 'id';
    protected $fillable = [
        'no_surat',
        'asal_surat',
        'tanggal_surat',
        'tanggal_terima',
        'perihal_id',
        'keterangan',
        'pegawai_id',
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
