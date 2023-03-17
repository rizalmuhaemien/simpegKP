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
                    <li class="breadcrumb-item"><a href="{{url('/dokument/index')}}">Berkas</a></li>
                    <li class="breadcrumb-item active">Upload Berkas</li>
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
                <form action="{{url('/dokument/store/')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-12"><label>Pegawai</label>
                                    <select class="form-control select2bs4 @error('kd_berkas') is-invalid @enderror" name="kd_berkas" style="width: 100%;">
                                        <option value="">-</option>
                                        @foreach($creates as $c)

                                        @if(old('kd_berkas') == $c->id)
                                        <option value="{{$c->id}}" selected>{{$c->id}}_{{$c->nama_pegawai}}</option>
                                        @else
                                        <option value="{{$c->id}}">{{$c->id}}_{{$c->nama_pegawai}}</option>
                                        @endif

                                        @endforeach
                                    </select>
                                    @error('kd_berkas')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>KTP Upload</label><br>
                            <span><i>*/ Format file harus Pdf /*</i></span>
                            <div class="input-group">
                                <input type="file" name="ktp_file" value="{{old('ktp_file')}}" class="form-control @error('ktp_file') is-invalid @enderror">
                                @error('ktp_file')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Ijazah Upload</label><br>
                            <span><i>*/ Format file harus Pdf /*</i></span>
                            <div class="input-group">
                                <input type="file" name="ijazah_file" value="{{old('ijazah_file')}}" class="form-control @error('ijazah_file') is-invalid @enderror">
                                @error('ijazah_file')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Sertifikat Upload</label><br>
                            <span><i>*/ Format file harus Pdf /*</i></span>
                            <div class="input-group">
                                <input type="file" name="pendukung_file" value="{{old('pendukung_file')}}" class="form-control @error('pendukung_file') is-invalid @enderror">
                                @error('pendukung_file')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <a href="{{route('dokumentindex')}}" class="btn btn-danger">Batal</a>
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