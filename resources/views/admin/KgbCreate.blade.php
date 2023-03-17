@extends('layout.layout')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-pen-square"></i> KGB Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Advanced Form</li>
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
                <form action="{{url('/kgb/store')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pegawai</label>
                                <select class="form-control select2" name="pegawai" style="width: 100%;" required>
                                    <option selected="selected"></option>
                                    @foreach ($creates as $c)
                                    <option value="{{$c->id}}">{{$c->nik_pegawai}}_{{$c->nama_pegawai}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6"> <label>Tanggal Masuk</label>
                                        <input type="date" name="tgl_masuk" class="form-control">
                                    </div>
                                    <div class="col-md-6"> <label>Golongan</label>
                                        <select class="form-control select2" name="golongan" style="width: 100%;" required>
                                            <option selected="selected">Pilih Golongan</option>
                                            <option>I</option>
                                            <option>II</option>
                                            <option>III</option>
                                            <option>IV</option>
                                            <option>V</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor KGB</label>
                                <input type="text" name="nomor" class="form-control">
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6"> <label>Gaji Lama</label>
                                        <input type="text" name="gaji_lama" class="form-control">
                                    </div>
                                    <div class="col-md-6"> <label>Gaji Baru</label>
                                        <input type="text" name="gaji_baru" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6"> <label>Tanggal Berlakunya Gaji</label>
                                        <input type="date" name="tgl_terhitung" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
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