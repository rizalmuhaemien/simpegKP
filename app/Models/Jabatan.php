<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = "jabatan";
    protected $primaryKey = 'id';
    protected $fillable = [
        'jabatan',
        'deskripsi_jabatan'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
