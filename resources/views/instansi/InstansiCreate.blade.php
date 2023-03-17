@extends('layout.layout')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-pen-square"></i> Data Instansi Baru</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/instansi/index')}}">Instansi</a></li>
                    <li class="breadcrumb-item active"> Baru</li>
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
                <form action="{{url('/instansi/store')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Instansi</label>
                                <input type="text" name="nama_instansi" class="form-control">
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6"> <label>Nama Provinsi</label>
                                        <input type="text" name="nama_provinsi" value="Jawa Tengah" class="form-control">
                                    </div>
                                    <div class="col-md-6"> <label>Nama Kabupaten</label>
                                        <input type="text" name="nama_kabupaten" value="Batang" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6"> <label>Kode Pos</label>
                                        <input type="text" name="kd_pos" class="form-control">
                                    </div>
                                    <div class="col-md-6"> <label>No Telephone</label>
                                        <input type="text" name="no_tlp" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Logo Upload</label>
                                <span><i>*/ foto harus png/jpg/jpeg /*</i></span>
                                <div class="input-group">
                                    <img src="#" width="150px" id="logo">
                                    <input type="file" id="exampleInputFile" name="logo" class="form-control" accept="logo/*" onchange="document.getElementById('logo').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                            </div>

                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kepala Dinas</label>
                                <input type="text" name="kepala_dinas" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>NIP</label>
                                <input type="text" name="nip_kadis" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" style="height:70px"></textarea>
                            </div>
                        </div>

                        <div>
                            <a href="{{url('/instansi/index')}}" class="btn btn-danger">Batal</a>
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