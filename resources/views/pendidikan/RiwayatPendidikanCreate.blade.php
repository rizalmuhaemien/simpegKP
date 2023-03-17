@extends('layout.layout')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-pen-square"></i> Pendidikan Terakhir Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/pegawai/index')}}">Pendidikan Terakhir</a></li>
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
                <form action="{{url('/pendidikan/store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6"><label>NIK Pegawai</label>
                                        <select class="form-control select2bs4" name="pegawai_nik" id="pegawai_nik" style="width: 100%;">
                                            <option value="{{old('pegawai_nik')}}"></option>
                                            @foreach($creates as $c)
                                            <option value="{{$c->id}}" data-pegawai="{{$c->nama_pegawai}}">{{$c->nik_pegawai}}_{{$c->nama_pegawai}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6"><label> Nama Pegawai</label>
                                        <input type="text" id="pegawai_nama" name="pegawai_nama" value="{{old('pegawai_nama')}}" class="form-control @error('pegawai_nama') is-invalid @enderror" required>
                                        @error('pegawai_nama')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label>Jenjang</label>
                                <select class="form-control select2bs4" name="jenjang" style="width: 100%;">
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
                                <label>Alamat Sekolah</label>
                                <textarea class="form-control @error('alamat_sekolah') is-invalid @enderror" name="alamat_sekolah" value="{{old('alamat_sekolah')}}" style="height:70px" required></textarea>
                                @error('alamat_sekolah')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input type="text" name="jurusan" value="{{old('jurusan')}}" class="form-control @error('jurusan') is-invalid @enderror" required>
                                @error('jurusan')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nama Sekolah</label>
                                <input type="text" name="nama_sekolah" value="{{old('nama_sekolah')}}" class="form-control @error('nama_sekolah') is-invalid @enderror" required>
                                @error('nama_sekolah')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6"> <label>Tahun Masuk</label>
                                        <input type="text" name="thn_masuk" value="{{old('thn_masuk')}}" class="form-control @error('thn_masuk') is-invalid @enderror" required>
                                        @error('thn_masuk')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6"> <label>Tahun Lulus</label>
                                        <input type="text" name="thn_lulus" value="{{old('thn_lulus')}}" class="form-control @error('thn_lulus') is-invalid @enderror" required>
                                        @error('thn_lulus')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
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

@section('ajax')
<script>
    $(document).ready(function() {
        $('#pegawai_nik').on('change', function() {
            const selected = $(this).find('option:selected');
            const prov = selected.data('pegawai');

            $("#pegawai_nama").val(prov);
        });
    });
</script>
@endsection

<!-- <select class="form-control select2bs4" name="pegawai_nama" style="width: 100%;">
                                            <option value="{{old('pegawai_nama')}}"></option>
                                            @foreach($creates as $c)
                                            <option value="{{$c->nama_pegawai}}">{{$c->id}}_{{$c->nama_pegawai}}</option>
                                            @endforeach
                                        </select> -->