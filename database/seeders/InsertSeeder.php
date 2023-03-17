<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class InsertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::truncate();
        Pegawai::create([
            'nik_pegawai' => '3125020112000003',
            'nama_pegawai' => 'Nobita',
            'jenis_kelamin' => 'Laki-laki',
        ]);
    }
}
