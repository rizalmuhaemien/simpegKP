<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use App\Models\Instansi;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InstansiController extends Controller
{
    public function tampil()
    {
        // $instansi = Instansi::OrderBy('id', 'DESC')->paginate('5');
        // return view('instansi.Instansi', compact('instansi'));
        return DataTables::of(Instansi::query())->addColumn('action', function ($row) {
            $actionBtn =

                '
                <a href="/instansi/tampil/' .   Crypt::encryptString($row->id) . '" class=" btn btn-secondary btn-xs"><i class="fa fa-folder-open"></i> </a> 
                <a href="/instansi/edit/' .   Crypt::encryptString($row->id) . '" class="edit btn btn-warning btn-xs"><i class="fa  fa-edit"></i> </a> 
                <button class="hapus btn  btn-danger btn-xs" id= "' . $row->id . '" ><i class="far fa-trash-alt"></i></button>';
            return $actionBtn;
        })->toJson();
    }

    public function index()
    {
        return view('instansi.Instansi');
    }

    public function create()
    {
        return view('instansi.InstansiCreate');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'nama_instansi' => 'required',
            'nama_kabupaten' => 'required',
            'nama_provinsi' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'email' => 'required',
            'kd_pos' => 'required',
            'kepala_dinas' => 'required',
            'nip_kadis' => 'required',
            'logo' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        if ($logo = $request->file('logo')) {
            $destinationPath = 'logo/';
            $file = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            $logo->move($destinationPath, $file);
            $input['logo'] = "$file";
        }
        Instansi::create($input);
        return redirect()->route('instansiindex')->with('success', 'Data baru berhasil ditambah!');
    }

    public function show($id)
    {
        $decrypID = Crypt::decryptString($id);
        $instansis = Instansi::find($decrypID);
        return view('instansi.InstansiDetail', compact('instansis'));
    }

    public function edit($id)
    {
        $editID = Crypt::decryptString($id);

        $edits = Instansi::find($editID);

        return view('instansi.InstansiEdit', compact('edits'));
    }

    public function update(Request $request, $id)
    {
        $input = Instansi::find($id);
        $input->nama_instansi = $request->input('nama_instansi');
        $input->nama_kabupaten = $request->input('nama_kabupaten');
        $input->nama_provinsi = $request->input('nama_provinsi');
        $input->alamat = $request->input('alamat');
        $input->no_tlp = $request->input('no_tlp');
        $input->email = $request->input('email');
        $input->kd_pos = $request->input('kd_pos');
        $input->kepala_dinas = $request->input('kepala_dinas');
        $input->nip_kadis = $request->input('nip_kadis');

        if ($request->hasFile('logo')) {
            $desti = 'logo/' . $input['logo'];
            if (File::exists($desti)) {
                File::delete($desti);
            }
            $logo = $request->file('logo');
            $destinationPath = 'logo/';
            $file = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            $logo->move($destinationPath, $file);
            $input['logo'] = "$file";
        }
        $input->update();
        return redirect()->route('instansiindex')->with('success', 'Data berhasil diperbarui!');
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $data = Instansi::find($id);
        if ($data) {
            $file = public_path('logo/' . $data->logo);

            if (File::exists($file)) {
                File::delete($file);
            }
            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Dihapus!',
            ]);
        }
    }

    public function cetak_pdf()
    {

        $instansi = Instansi::all();
        $pdf = PDF::loadView('instansi.InstansiPdf', ['instansi' => $instansi]);
        return $pdf->stream();
    }
}
