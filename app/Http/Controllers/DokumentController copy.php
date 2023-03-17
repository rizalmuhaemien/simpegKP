<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\Dokument;
use App\Models\Pegawai;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class DokumentController extends Controller
{
    function index()
    {
        return view('admin.Dokument');
    }

    function create()
    {
        $creates = Pegawai::all();
        return view('admin.DocumentCreate', compact('creates'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'pegawai_id' => 'required',
            'sertifikasi' => 'required',
            'bukti_sertifikasi' => 'required|mimes:pdf,docx'
        ]);
        if ($bukti_sertifikasi = $request->file('bukti_sertifikasi')) {
            $destinationPath = 'dokumen_pendukung_pegawai/';
            $file = date('YmdHis') . "." . $bukti_sertifikasi->getClientOriginalExtension();
            $bukti_sertifikasi->move($destinationPath, $file);
            $input['bukti_sertifikasi'] = "$file";
        }
        Dokument::create($input);
        return redirect()->route('pegawaiindex')->with('message', 'Data baru berhasil di tambahkan');
    }

    public function destroy($id)
    {
        $media = Berkas::find($id);
        if ($media) {
            $file = public_path('berkas/' . $media->file);
            if (File::exists($file)) {
                File::delete($file);
            }
            $media->delete();
            return redirect()->back()->with('success', 'Berhasil, data berhasil dihapus');
        }
        return redirect()->back()->with('message', 'Error, tidak ada file ditemukan');
    }
}
