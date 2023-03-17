<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokument extends Model
{
    use HasFactory;
    protected $table = "dokument";
    protected $primaryKey = 'id';
    protected $fillable = [
        'pegawai_id',
        'sertifikasi',
        'bukti_sertifikasi',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'nik_pegawai');
    }
}
