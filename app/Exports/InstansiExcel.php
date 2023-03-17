<?php

namespace App\Exports;

use App\Models\Instansi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InstansiExcel implements FromView
{
    public function view(): View
    {
        return view('instansi.InstansiExcel', [
            'instansis' => Instansi::all()
        ]);
    }
}
