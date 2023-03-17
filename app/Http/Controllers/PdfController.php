<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function pegawai_pdf()
    {
        $datas = Pegawai::get();
        return view('admin.PegawaiPdf', compact('datas'));
    }
}
