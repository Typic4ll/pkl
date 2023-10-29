<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Perihal extends Model
{
    use HasFactory;

    protected $table = 'perihal';
    protected $primarykey = 'id';
    protected $fillable = [
        'id',
        'nama_perihal'
    ];

    public function surat_masuk(){
        return $this->hasMany(surat_masuk::class);
    }

    public function surat_keluar(){
        return $this->hasMany(surat_keluar::class);
    }
}
