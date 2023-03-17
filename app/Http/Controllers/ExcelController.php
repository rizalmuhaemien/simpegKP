<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Exports\InstansiExcel;
use App\Exports\PegawaiExcel;
use App\Models\Pegawai;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;


class ExcelController extends Controller
{
    public function export_view()
    {
        $instansis = Instansi::get();
        return view('admin.InstansiExcel', compact('instansis'));
    }
    public function export_excel()
    {
        $nama_file = 'data_instansi' . date('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new InstansiExcel, $nama_file);
    }

    public function pegawai_excel()
    {
        $datas = Pegawai::get();
        return view('admin.PegawaiExcel', compact('datas'));
    }
    public function store_excel()
    {
        $nama_file = 'data_pegawai' . date('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new PegawaiExcel, $nama_file);
    }
}
