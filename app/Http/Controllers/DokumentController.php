<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Support\Facades\Crypt;
use App\Models\Dokument;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Pegawai;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class DokumentController extends Controller
{
    public function tampil()
    {
        return DataTables::of(Berkas::all())
            // ->addColumn(
            //     'nik_pegawai',
            //     function ($data) {
            //         return $data->pegawai->nama_pegawai;
            //     }
            // )
            ->addColumn('action', function ($row) {
                $actionBtn =

                    '
                <a href="/dokument/edit/' .   Crypt::encryptString($row->id) . '" class="edit btn btn-warning btn-xs"><i class="fa  fa-edit"></i> </a> 
                <button class="hapus btn  btn-danger btn-xs" id= "' . $row->id . '" ><i class="far fa-trash-alt"></i></button>';
                return $actionBtn;
            })->toJson();
    }

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
            'kd_berkas' => 'required|unique:berkas',
            'ktp_file' => 'required|mimes:pdf,docx',
            'ijazah_file' => 'required|mimes:pdf,docx',
            'pendukung_file' => 'required|mimes:pdf,docx',
        ]);
        if ($ktp_file = $request->file('ktp_file')) {
            $destinationPath = 'berkas/';
            $file = 'ktp' . date('YmdHis') . "." . $ktp_file->getClientOriginalExtension();
            $ktp_file->move($destinationPath, $file);
            $input['ktp_file'] = "$file";
        }
        if ($ijazah_file = $request->file('ijazah_file')) {
            $destinationPath = 'berkas/';
            $file = 'ijazah' . date('YmdHis') . "." . $ijazah_file->getClientOriginalExtension();
            $ijazah_file->move($destinationPath, $file);
            $input['ijazah_file'] = "$file";
        }
        if ($pendukung_file = $request->file('pendukung_file')) {
            $destinationPath = 'berkas/';
            $file = 'sertifikat' . date('YmdHis') . "." . $pendukung_file->getClientOriginalExtension();
            $pendukung_file->move($destinationPath, $file);
            $input['pendukung_file'] = "$file";
        }
        Berkas::create($input);
        return redirect()->route('pegawaiindex')->with('success', 'Data baru berhasil ditambah!');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = Berkas::find($id);
        if ($data) {
            $file = public_path('berkas/' . $data->ktp_file);
            if (File::exists($file)) {
                File::delete($file);
            }

            $file_ijazah = public_path('berkas/' . $data->ijazah_file);
            if (File::exists($file_ijazah)) {
                File::delete($file_ijazah);
            }

            $file_pendukung = public_path('berkas/' . $data->pendukung_file);
            if (File::exists($file_pendukung)) {
                File::delete($file_pendukung);
            }

            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus!',
            ]);
        }
    }

    public function edit($id)
    {
        $decrypID = Crypt::decryptString($id);
        $berkasas = Berkas::findorFail($decrypID);
        return view('admin.DokumentEdit', compact('berkasas'));
    }

    public function update(Request $request, $id)
    {
        $input = Berkas::findorFail($id);
        $input->kd_berkas = $request->input('kd_berkas');
        if ($request->hasFile('ktp_file')) {
            $desti = 'berkas/' . $input['ktp_file'];
            if (File::exists($desti)) {
                File::delete($desti);
            }
            $ktp_file = $request->file('ktp_file');
            $destinationPath = 'berkas/';
            $file = 'ktp' . date('YmdHis') . "." . $ktp_file->getClientOriginalExtension();
            $ktp_file->move($destinationPath, $file);
            $input['ktp_file'] = "$file";
        }
        if ($request->hasFile('ijazah_file')) {
            $desti = 'berkas/' . $input['ijazah_file'];
            if (File::exists($desti)) {
                File::delete($desti);
            }
            $ijazah_file = $request->file('ijazah_file');
            $destinationPath = 'berkas/';
            $file = 'ijazah' . date('YmdHis') . "." . $ijazah_file->getClientOriginalExtension();
            $ijazah_file->move($destinationPath, $file);
            $input['ijazah_file'] = "$file";
        }
        if ($request->hasFile('pendukung_file')) {
            $desti = 'berkas/' . $input['pendukung_file'];
            if (File::exists($desti)) {
                File::delete($desti);
            }
            $pendukung_file = $request->file('pendukung_file');
            $destinationPath = 'berkas/';
            $file = 'sertifikat' . date('YmdHis') . "." . $pendukung_file->getClientOriginalExtension();
            $pendukung_file->move($destinationPath, $file);
            $input['pendukung_file'] = "$file";
        }
        $input->update();
        return redirect()->route('dokumentindex')->with('success', 'Data berhasil diperbarui!');
    }
}
