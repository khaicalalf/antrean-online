<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nomor_Antrian',
        'Nomor_Antrian_Poli',
        'pasien_id',
        'poli_id',
        'Tanggal_Antrian',
        'Waktu_Daftar',
        'Status',
        'random',
        'Pembayaran',
        'No_Rujukan'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }


    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }
}