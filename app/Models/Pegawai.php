<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = "pegawai";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nik_pegawai',
        'nama_pegawai',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'agama',
        'nama_instansi',
        'bagian_pegawai',
        'golongan',
        'no_hp',
        'email',
        'alamat_pegawai',
        'foto_pegawai',
        'status',
    ];

    public function pendidikan()
    {
        return $this->hasOne(RiwayatPendidikan::class, 'pegawai_nik');
    }

    public function instansi()
    {
        return $this->hasMany(Instansi::class);
    }

    public function kgb()
    {
        return $this->hasOne(Kgb::class, 'pegawai');
    }

    public function document()
    {
        return $this->hasMany(Dokument::class, 'pegawai_id');
    }

    public function jabatan()
    {
        return $this->hasMany(Jabatan::class);
    }

    public function berkas()
    {
        return $this->hasOne(Berkas::class, 'kd_berkas');
    }
}
