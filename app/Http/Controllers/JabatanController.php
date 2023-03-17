<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class JabatanController extends Controller
{
    function index()
    {
        $jabatan = Jabatan::OrderBy('id', 'DESC')->paginate('10');
        return view('jabatan.Jabatan', compact('jabatan'));
    }

    public function tampil(Request $request)
    {
        $token = $request->session()->token();
        return DataTables::of(Jabatan::query())->addColumn('action', function ($row) {
            $actionBtn =
                // <form action="/jabatan/destroy/' . Crypt::encryptString($row->id) . '"   id="data-' . $row->id . '" method="post" $token = csrf_token()> </form>
                '
                <a href="/jabatan/detail/' .   Crypt::encryptString($row->id) . '" class=" btn btn-secondary btn-xs"><i class="fa fa-folder-open"></i> </a>
                <a href="/jabatan/edit/' .   Crypt::encryptString($row->id) . '" class="edit btn btn-warning btn-xs"><i class="fa  fa-edit"></i> </a> 
                  <button class="hapus btn  btn-danger btn-xs" id= "' . $row->id . '" ><i class="far fa-trash-alt"></i></button>';
            return $actionBtn;
        })->toJson();
    }

    function create()
    {
        return view('jabatan.JabatanCreate');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'jabatan' => 'required',
            'deskripsi_jabatan' => 'required',
        ]);

        // $input = strip_tags($request->deskripsi_jabatan);

        Jabatan::create($input);
        return redirect()->route('jabatanindex')->with('success', 'Data baru berhasil ditambah!');
    }

    public function edit($id)
    {
        $decrypID = Crypt::decryptString($id);
        $jabatans = Jabatan::find($decrypID);
        return view('jabatan.JabatanEdit', compact('jabatans'));
    }

    public function update(Request $request, $id)
    {
        $input = Jabatan::find($id);
        $input->jabatan = $request->input('jabatan');
        $input->deskripsi_jabatan = $request->input('deskripsi_jabatan');

        $input->update();
        return redirect()->route('jabatanindex')->with('success', 'Data berhasil diperbarui!');
    }

    public function detail($id)
    {
        $decrypID = Crypt::decryptString($id);
        $details = Jabatan::find($decrypID);
        return view('jabatan.JabatanDetail', compact('details'));
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $data = Jabatan::find($id);
        $data->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!',
        ]);
    }
}
