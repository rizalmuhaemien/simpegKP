<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kgb extends Model
{
    use HasFactory;
    protected $table = "kgb";
    protected $primaryKey = 'id';
    protected $fillable = [
        'pegawai',
        'nomor',
        'tgl_masuk',
        'gaji_lama',
        'gaji_baru',
        'golongan',
        'tgl_terhitung',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function pegawai_detail()
    {
        return $this->belongsTo(Pegawai::class, 'nik_pegawai');
    }
}
