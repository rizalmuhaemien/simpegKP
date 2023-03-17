<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\Pegawai;
use App\Models\RiwayatPendidikan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function dashboard()
    {
        $pegawai = Pegawai::count();
        $instansis = Instansi::count();
        $pendidikan = RiwayatPendidikan::count();
        $pegawai_jk = Pegawai::where('jenis_kelamin', 'laki-laki')->count();
        $pegawai_p = Pegawai::where('jenis_kelamin', 'perempuan')->count();
        // $pegawai_a = Pegawai::where('nama_instansi', 'Dinas Lingkungan Hidup')->count();
        // $pegawai_b = Pegawai::where('nama_instansi', 'Dinas Pekerjaan Umum dan Penataan Ruang')->count();
        // $pegawai_c = Pegawai::where('nama_instansi', 'Dinas Komunikasi dan Informatika')->count();
        // $pegawai_d = Pegawai::where('nama_instansi', 'Dinas Perhubungan')->count();
        // $pegawai_e = Pegawai::where('nama_instansi', 'Dinas Ketenagakerjaan')->count();
        // $pegawai_f = Pegawai::where('nama_instansi', 'Dinas Pariwisata, Kepemudaan, Dan Olahraga')->count();
        return view('admin.Dashboard', compact(
            'pegawai',
            'instansis',
            'pendidikan',
            'pegawai_jk',
            'pegawai_p',
            // 'pegawai_a',
            // 'pegawai_b',
            // 'pegawai_c',
            // 'pegawai_d',
            // 'pegawai_e',
            // 'pegawai_f',
        ));
    }
}
