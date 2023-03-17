@extends('layout.layout')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-pen-square"></i> Upload Berkas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/pegawai/index')}}">Pegawai</a></li>
                    <li class="breadcrumb-item"><a href="">Detail Pegawai</a></li>
                    <li class="breadcrumb-item active">Edit Berkas</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid col-md-6">
        <div class="card card-default">
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{url('/berkas/update/'. Crypt::encryptString($edits->berkas->id))}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pegawai</label>
                                <input type="text" name="kd_berkas" value="{{$edits->berkas->kd_berkas}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>KTP Upload</label><br>
                            <span><i>*/ Format file harus Pdf /*</i></span>
                            <div class="input-group">
                                <input type="file" name="ktp_file" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Ijazah Upload</label><br>
                            <span><i>*/ Format file harus Pdf /*</i></span>
                            <div class="input-group">
                                <input type="file" name="ijazah_file" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Sertifikat Upload</label><br>
                            <span><i>*/ Format file harus Pdf /*</i></span>
                            <div class="input-group">
                                <input type="file" name="pendukung_file" class="form-control">
                            </div>
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