<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;
    protected $table = "berkas";
    protected $primaryKey = 'id';
    protected $fillable = [
        'kd_berkas',
        'ktp_file',
        'ijazah_file',
        'pendukung_file'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'nik_pegawai');
    }
}
