<?php

namespace App\Http\Controllers;

use App\Models\Kgb;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class KgbController extends Controller
{
    function index()
    {
        $datas = Kgb::with('pegawai')->paginate('10');
        return view('admin.Kgb', compact('datas'));
    }

    function create()
    {
        $creates = Pegawai::all();
        return view('admin.KgbCreate', compact('creates'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'pegawai' => 'required',
            'nomor' => 'required',
            'tgl_masuk' => 'required',
            'golongan' => 'required',
            'gaji_lama' => 'required',
            'gaji_baru' => 'required',
            'tgl_terhitung' => 'required',
        ]);
        Kgb::create($input);
        return redirect()->route('kgbindex')->with('message', 'Data baru berhasil di tambahkan');
    }
}
