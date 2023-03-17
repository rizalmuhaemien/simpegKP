<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $table = "instansi";
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_instansi',
        'nama_kabupaten',
        'nama_provinsi',
        'alamat',
        'no_tlp',
        'email',
        'kd_pos',
        'kepala_dinas',
        'nip_kadis',
        'logo'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
