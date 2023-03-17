<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikan extends Model
{
    use HasFactory;
    protected $table = "riwayat_pendidikan";
    protected $primaryKey = 'id';
    protected $fillable = [
        'pegawai_nik',
        'pegawai_nama',
        'jenjang',
        'jurusan',
        'nama_sekolah',
        'alamat_sekolah',
        'thn_masuk',
        'thn_lulus',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'nik_pegawai');
    }
}
