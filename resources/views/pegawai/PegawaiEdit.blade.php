@extends('layout.layout')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fa fa-edit"></i> Data Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/pegawai/index')}}">Pegawai</a></li>
                    <li class="breadcrumb-item active">Edit Pegawai</li>
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
                <form action="{{url('/pegawai/update/'. $pegawaiedit->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Nama Pegawai</label>
                                <input type="text" name="nama_pegawai" value="{{$pegawaiedit->nama_pegawai}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" name="nik_pegawai" value="{{$pegawaiedit->nik_pegawai}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <div class="row">

                                    <div class="col-md-10">
                                        <label>Jabatan Pegawai</label>
                                        <select class="form-control select2bs4" name="bagian_pegawai" value="" style="width: 100%;" required>
                                            <option selected="selected">{{$pegawaiedit->bagian_pegawai}}</option>
                                            @foreach($jabatans as $j)
                                            <option value="{{$j->jabatan}}">{{$j->jabatan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Golongan</label>
                                        <select class="form-control select2bs4" name="golongan" style="width: 100%;">
                                            <option selected="selected">{{$pegawaiedit->golongan}}</option>
                                            <option>I</option>
                                            <option>II</option>
                                            <option>III</option>
                                            <option>IV</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>No Hp</label>
                                <input type="text" name="no_hp" value="{{$pegawaiedit->no_hp}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Foto Upload</label>
                                <span><i>*/ foto harus png/jpg/jpeg /*</i></span>
                                <div class="input-group">
                                    <img src="/foto/{{$pegawaiedit->foto_pegawai}}" width="150px" id="foto_pegawai">
                                    <input type="file" id="exampleInputFile" name="foto_pegawai" class="form-control" accept="foto_pegawai/*" onchange="document.getElementById('foto_pegawai').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                            </div>

                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control select2bs4" name="jenis_kelamin" style="width: 100%;">
                                            <option selected="selected">{{$pegawaiedit->jenis_kelamin}}</option>
                                            <option>Laki-laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Agama</label>
                                        <select class="form-control select2bs4" name="agama" style="width: 100%;">
                                            <option selected="selected">{{$pegawaiedit->agama}}</option>
                                            <option>Islam</option>
                                            <option>Kristen</option>
                                            <option>Khatolik</option>
                                            <option>Hindu</option>
                                            <option>Buddha</option>
                                            <option>Khonghuccu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6"> <label>Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" value="{{$pegawaiedit->tempat_lahir}}" class="form-control">
                                    </div>
                                    <div class="col-md-6"> <label>Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" value="{{$pegawaiedit->tgl_lahir}}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Nama Instansi</label>
                                <input type="text" name="nama_instansi" value="{{$pegawaiedit->nama_instansi}}" class="form-control">
                                <!-- <select class="form-control select2bs4" name="nama_instansi" style="width: 100%;">
                                    <option selected="selected">{{$pegawaiedit->nama_instansi}}</option>
                                    @foreach($datas as $d)
                                    <option value="{{$d->nama_instansi}}">{{$d->nama_instansi}}</option>
                                    @endforeach
                                </select> -->
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{$pegawaiedit->email}}" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Alamat Pegawai</label>
                                <textarea class="form-control" name="alamat_pegawai" style="height:125px">{{$pegawaiedit->alamat_pegawai}}</textarea>
                            </div>
                        </div>

                        <div>
                            <a href="{{url('/pegawai/index')}}" class="btn btn-danger">Batal</a>
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