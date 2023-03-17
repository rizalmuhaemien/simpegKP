@extends('layout.layout')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-pen-square"></i> Data Pegawai Baru</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/pegawai/index')}}">Pegawai</a></li>
                    <li class="breadcrumb-item active">Baru</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

@if(session('error'))
<div class="alert alert-error">{{session('error')}}</div>
@endif





<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{url('/pegawaistore')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Pegawai</label>
                                <input type="text" name="nama_pegawai" value="{{old('nama_pegawai')}}" id="nama_pegawai" class="form-control @error('nama_pegawai') is-invalid @enderror" required>
                                @error('nama_pegawai')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" name="nik_pegawai" value="{{old('nik_pegawai')}}" class="form-control @error('nik_pegawai') is-invalid @enderror" required>
                                @error('nik_pegawai')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-10">
                                        <label>Jabatan</label>
                                        <select class="form-control select2bs4" name="bagian_pegawai" value="{{old('bagian_pegawai')}}" style="width: 100%;" required>
                                            @foreach($jabatans as $j)

                                            @if(old('bagian_pegawai') == $j->jabatan)
                                            <option value="{{$j->jabatan}}" selected>{{$j->jabatan}}</option>
                                            @else
                                            <option value="{{$j->jabatan}}">{{$j->jabatan}}</option>
                                            @endif

                                            @endforeach
                                        </select>
                                        @error('bagian_pegawai')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="col-md-2">
                                        <label>Golongan</label>
                                        <select class="form-control select2bs4" name="golongan" value="{{old('golongan')}}" style="width: 100%;" required>
                                            <option>I</option>
                                            <option>II</option>
                                            <option>III</option>
                                            <option>IV</option>
                                        </select>
                                        @error('golongan')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label>No Hp</label>
                                <input type="text" name="no_hp" value="{{old('no_hp')}}" class="form-control" required>
                                @error('no_hp')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Foto Upload</label>
                                <span><i>*/ foto harus png/jpg/jpeg /*</i></span>
                                <div class="input-group">
                                    <img src="#" width="150px" id="foto_pegawai">
                                    <input type="file" id="exampleInputFile" name="foto_pegawai" class="form-control" accept="foto_pegawai/*" onchange="document.getElementById('foto_pegawai').src = window.URL.createObjectURL(this.files[0])" required>
                                    @error('foto_pegawai')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6"><label>Jenis Kelamin</label>
                                        <select class="form-control select2bs4" name="jenis_kelamin" value="{{old('jenis_kelamin')}}" style="width: 100%;" required>
                                            <!-- <option selected="selected">Pilih Jenis Kelamin</option> -->
                                            <option>Laki-laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6"><label>Agama</label>
                                        <select class="form-control select2bs4" name="agama" value="{{old('agama')}}" style="width: 100%;" required>
                                            <!-- <option selected="selected">Pilih Agama</option> -->
                                            <option>Islam</option>
                                            <option>Kristen</option>
                                            <option>Khatolik</option>
                                            <option>Hindu</option>
                                            <option>Buddha</option>
                                            <option>Khonghuccu</option>
                                        </select>
                                        @error('agama')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-5"> <label>Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" value="{{old('tempat_lahir')}}" class="form-control" required>
                                        @error('tempat_lahir')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-5"> <label>Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" value="{{old('tgl_lahir')}}" class="form-control" required>
                                        @error('tgl_lahir')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2"> <label>Status</label>
                                        <input type="text" name="status" readonly value="1" placeholder="1" class="form-control" required>
                                        @error('status')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Nama Instansi</label>
                                <input type="text" name="nama_instansi" value="Dinas Komunikasi dan Informatika" class="form-control" required>
                                <!-- <select class="form-control select2bs4" style="width: 100%;" name="nama_instansi" value="{{old('nama_instansi')}}" required>
                                    <option selected="selected">Pilih Instansi</option>
                                    @foreach($datas as $d)
                                    <option value="{{$d->nama_instansi}}">{{$d->nama_instansi}}</option>
                                    @endforeach
                                </select> -->
                                @error('nama_instansi')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{old('email')}}" class="form-control  @error('email') is-invalid @enderror" required>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Alamat Pegawai</label>
                                <textarea class="form-control" name="alamat_pegawai" value="" style="height:70px" required>{{old('alamat_pegawai')}}</textarea>
                                @error('alamat_pegawai')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
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