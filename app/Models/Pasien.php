<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $fillable = [
        'NIK',
        'Nama',
        'Nomor_Telepon',
        'Alamat'
    ];

    public function antrians()
    {
        return $this->hasMany(Antrian::class);
    }
}