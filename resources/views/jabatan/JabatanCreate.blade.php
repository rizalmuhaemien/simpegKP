@extends('layout.layout')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-pen-square"></i> Tambah Jabatan Baru</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/jabatan/index/')}}">Jabatan</a></li>
                    <li class="breadcrumb-item active">Baru</li>
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
                <form action="{{url('/jabatan/store')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label>Nama Jabatan</label>
                                <input type="text" name="jabatan" value="{{old('jabatan')}}" class="form-control @error('jabatan') is-invalid @enderror" required>
                                @error('jabatan')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Jabatan</label>
                                @error('deskripsi_jabatan')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                                <textarea name="deskripsi_jabatan" id="summernote">{{old('deskripsi_jabatan')}}</textarea>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div>
                                <a href="{{url('/jabatan/index')}}" class="btn btn-danger">Batal</a>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            </div>
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