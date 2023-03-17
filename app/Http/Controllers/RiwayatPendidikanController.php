<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use App\Models\Pegawai;
use App\Models\RiwayatPendidikan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class RiwayatPendidikanController extends Controller
{
    public function index()
    {
        $pendidikan = RiwayatPendidikan::OrderBy('id', 'DESC')->paginate('4');
        return view('pendidikan.RiwayatPendidikan', compact('pendidikan'));
    }

    public function tampil()
    {
        // $instansi = Instansi::OrderBy('id', 'DESC')->paginate('5');
        // return view('pendidikan.Instansi', compact('instansi'));
        return DataTables::of(RiwayatPendidikan::query())->addColumn('action', function ($row) {
            $actionBtn =

                '
                <a href="/pendidikan/edit/' .   Crypt::encryptString($row->id) . '" class="edit btn btn-warning btn-xs"><i class="fa  fa-edit"></i> </a> 
                <button class="hapus btn  btn-danger btn-xs" id= "' . $row->id . '" ><i class="far fa-trash-alt"></i></button>';
            return $actionBtn;
        })->toJson();
    }

    public function create()
    {
        $creates = Pegawai::all();
        return view('pendidikan.RiwayatPendidikanCreate', compact('creates'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'pegawai_nik' => 'required',
            'jenjang' => 'required',
            'pegawai_nama' => 'required',
            'jurusan' => 'required',
            'nama_sekolah' => 'required',
            'thn_masuk' => 'required',
            'thn_lulus' => 'required',
            'alamat_sekolah' => 'required',
        ]);
        RiwayatPendidikan::create($input);
        return redirect()->route('dokumentcreate')->with('success', 'Data baru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $decrypID = Crypt::decryptString($id);
        $edits = RiwayatPendidikan::find($decrypID);
        $relasis = Pegawai::all();
        return view('pendidikan.RiwayatPendidikanEdit', compact('edits', 'relasis'));
    }

    public function update(Request $request, $id)
    {
        $input = RiwayatPendidikan::find($id);
        $input->pegawai_nik = $request->input('pegawai_nik');
        $input->pegawai_nama = $request->input('pegawai_nama');
        $input->jenjang = $request->input('jenjang');
        $input->jurusan = $request->input('jurusan');
        $input->nama_sekolah = $request->input('nama_sekolah');
        $input->thn_masuk = $request->input('thn_masuk');
        $input->thn_lulus = $request->input('thn_lulus');
        $input->alamat_sekolah = $request->input('alamat_sekolah');

        $input->update();
        return redirect()->route('pendidikanindex')->with('success', 'Data berhasil di perbarui');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = RiwayatPendidikan::find($id);
        $data->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!',
        ]);
    }
}
