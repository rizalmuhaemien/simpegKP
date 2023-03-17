@extends('layout.layout')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> <i class="fa fa-edit"></i> Pendidikan Terakhir Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/pendidikan/index')}}">Pendidikan Terakhir</a></li>
                    <li class="breadcrumb-item active">Edit Pendidikan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{url('/pendidikan/update/'. $edits->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6"><label>NIK Pegawai</label>
                                        <select class="form-control select2" name="pegawai_nik" style="width: 100%;">
                                            <option>{{$edits->pegawai_nik}}</option>
                                            @foreach($relasis as $s)
                                            <option value="{{$s->nik_pegawai}}">{{$s->nik_pegawai}}_{{$s->nama_pegawai}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6"><label> Nama Pegawai</label>
                                        <select class="form-control select2" name="pegawai_nama" style="width: 100%;">
                                            <option>{{$edits->pegawai_nama}}</option>
                                            @foreach($relasis as $s)
                                            <option value="{{$s->nama_pegawai}}">{{$s->nama_pegawai}}_{{$s->nik_pegawai}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Jenjang</label>
                                <select class="form-control select2bs4" name="jenjang" style="width: 100%;">
                                    <option>{{$edits->jenjang}}</option>
                                    <option>SMA/SMK</option>
                                    <option>D2</option>
                                    <option>D3</option>
                                    <option>D4</option>
                                    <option>S1</option>
                                    <option>S2</option>
                                    <option>S3</option>
                                    <option>Sarjana Terapan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Sekolah</label>
                                <input type="text" name="nama_sekolah" value="{{$edits->nama_sekolah}}" class="form-control">
                            </div>

                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input type="text" name="jurusan" value="{{$edits->jurusan}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6"> <label>Tahun Masuk</label>
                                        <input type="text" name="thn_masuk" value="{{$edits->thn_masuk}}" class="form-control">
                                    </div>
                                    <div class="col-md-6"> <label>Tahun Lulus</label>
                                        <input type="text" name="thn_lulus" value="{{$edits->thn_lulus}}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Alamat Sekolah</label>
                                <textarea class="form-control" name="alamat_sekolah" value="" style="height:70px">{{$edits->alamat_sekolah}}</textarea>
                            </div>
                        </div>

                        <div>
                            <a href="{{url('/pendidikan/index')}}" class="btn btn-danger">Batal</a>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>

@endsection