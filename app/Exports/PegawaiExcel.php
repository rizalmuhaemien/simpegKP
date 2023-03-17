<?php

namespace App\Exports;

use App\Models\Pegawai;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PegawaiExcel implements FromView
{
    public function view(): View
    {
        return view('pegawai.PegawaiExcel', [
            'datas' => Pegawai::all()
        ]);
    }
}
