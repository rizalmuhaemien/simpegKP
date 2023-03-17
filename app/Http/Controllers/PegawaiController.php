<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Instansi;
use App\Models\Jabatan;
use Illuminate\Support\Facades\File;
use App\Models\Pegawai;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawaidata = Pegawai::OrderBy('id', 'DESC')->paginate('10');
        return view('pegawai.PegawaiData', compact('pegawaidata'));
    }

    public function tampil()
    {
        return DataTables::of(Pegawai::query())->addColumn('action', function ($row) {
            $actionBtn =

                '
                <a href="/pegawai/tampil/' .   Crypt::encryptString($row->id) . '" class=" btn btn-secondary btn-xs"><i class="fa fa-folder-open"></i> </a> 
                <a href="/pegawai/edit/' .   Crypt::encryptString($row->id) . '" class="edit btn btn-warning btn-xs"><i class="fa  fa-edit"></i> </a> 
                <button class="hapus btn  btn-danger btn-xs" id= "' . $row->id . '" ><i class="far fa-trash-alt"></i></button>';
            return $actionBtn;
        })->toJson();
    }

    public function create()
    {
        $datas = Instansi::all();
        $jabatans = Jabatan::all();
        return view('pegawai.PegawaiCreate', compact('datas', 'jabatans'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'nik_pegawai' => 'required|unique:pegawai',
            'nama_pegawai' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'nama_instansi' => 'required',
            'bagian_pegawai' => 'required',
            'golongan' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email:dns|unique:pegawai',
            'alamat_pegawai' => 'required',
            'status' => 'required',
            'foto_pegawai' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        if ($foto_pegawai = $request->file('foto_pegawai')) {
            $destinationPath = 'foto/';
            $file = 'foto' . date('YmdHis') . "." . $foto_pegawai->getClientOriginalExtension();
            $foto_pegawai->move($destinationPath, $file);
            $input['foto_pegawai'] = "$file";
        }

        $ceks = Pegawai::create($input);
        if ($ceks) {
            return redirect()->route('pedidikancreate')->with('success', 'Data baru berhasil ditambah!');
        } else {
            return back()->with('error', 'Gagal menambahkan data baru!');
        }
    }

    public function edit($id)
    {
        $decrypID = Crypt::decryptString($id);
        $pegawaiedit = Pegawai::find($decrypID);
        $datas = Instansi::all();
        $jabatans = Jabatan::all();
        return view('pegawai.PegawaiEdit', compact('pegawaiedit', 'datas', 'jabatans'));
    }

    public function update(Request $request, $id)
    {
        $input = Pegawai::find($id);
        $input->nik_pegawai = $request->input('nik_pegawai');
        $input->nama_pegawai = $request->input('nama_pegawai');
        $input->jenis_kelamin = $request->input('jenis_kelamin');
        $input->agama = $request->input('agama');
        $input->tempat_lahir = $request->input('tempat_lahir');
        $input->tgl_lahir = $request->input('tgl_lahir');
        $input->nama_instansi = $request->input('nama_instansi');
        $input->bagian_pegawai = $request->input('bagian_pegawai');
        $input->golongan = $request->input('golongan');
        $input->no_hp = $request->input('no_hp');
        $input->email = $request->input('email');
        $input->alamat_pegawai = $request->input('alamat_pegawai');

        if ($request->hasFile('foto_pegawai')) {
            $desti = 'foto/' . $input['foto_pegawai'];
            if (File::exists($desti)) {
                File::delete($desti);
            }
            $foto_pegawai = $request->file('foto_pegawai');
            $destinationPath = 'foto/';
            $file = 'foto' . date('YmdHis') . "." . $foto_pegawai->getClientOriginalExtension();
            $foto_pegawai->move($destinationPath, $file);
            $input['foto_pegawai'] = "$file";
        }
        $input->update();
        return redirect()->route('pegawaiindex')->with('success', 'Data berhasil diperbarui!');
    }

    public function show($id)
    {
        $decrypID = Crypt::decryptString($id);
        $tampils = Pegawai::with('pendidikan', 'document', 'berkas')->find($decrypID);
        return view('pegawai.PegawaiDetail', compact('tampils'));
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $media = Pegawai::find($id);
        if ($media) {
            $file = public_path('foto/' . $media->foto_pegawai);

            if (File::exists($file)) {
                File::delete($file);
            }
            $media->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus!',
            ]);
        }
    }

    public function cetak_pdf()
    {
        $pegawaidata = Pegawai::all();
        $pdf = PDF::loadView('pegawai.PegawaiPdf', ['pegawaidata' => $pegawaidata]);
        return $pdf->stream();
    }

    public function berkas($id)
    {
        $decrypID = Crypt::decryptString($id);
        $edits = Pegawai::with('berkas')->find($decrypID);
        return view('pegawai.Berkas', compact('edits'));
    }

    public function berkasupdate(Request $request, $id)
    {
        $decrypID = Crypt::decryptString($id);

        $input = Berkas::findOrFail($decrypID);

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
        return redirect()->route('pegawaiindex')->with('success', 'Data berhasil diperbarui!');
    }

    public function changestatus(Request $request)
    {
        $pegawais = Pegawai::find($request->product_id);
        $pegawais->status = $request->status;
        $pegawais->save();
        return response()->json(['success' => 'Status change successfully.']);
    }

    public function delete($id)
    {
        $media = Berkas::find($id);
        if ($media) {
            $file = public_path('berkas/' . $media->file);

            if (File::exists($file)) {
                File::delete($file);
            }
            $media->delete();
            return redirect()->route('pegawaiindex')->with('success', 'Data berhasil diperbarui!');
        }
    }

    public function detailpdf($id)
    {
        $decrypID = Crypt::decryptString($id);
        $pdfs = Pegawai::with('pendidikan', 'document', 'berkas')->find($decrypID);
        $pdf = PDF::loadView('pegawai.PegawaiDetailPdf', ['pdfs' => $pdfs]);
        return $pdf->stream();
    }
}


// $dataArray = array(
        //     'nik_pegawai' => $request->nik_pegawai,
        //     'nama_pegawai' => $request->nama_pegawai,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        //     'tempat_lahir' => $request->tempat_lahir,
        //     'tgl_lahir' => $request->tgl_lahir,
        //     'nama_instansi' => $request->nama_instansi,
        //     'bagian_pegawai' => $request->bagian_pegawai,
        //     'no_hp' => $request->no_hp,
        //     'email' => $request->email,
        //     'alamat_pegawai' => $request->alamat_pegawai,
        //     'foto_pegawai' => $request->foto_pegawai,
        //     'status' => '1',
        // );