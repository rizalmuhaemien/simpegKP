@extends('layout.layout')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-info-circle"></i> Profil Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"> <a href="{{'/pegawai/pdf/'. Crypt::encryptString($tampils->id)}}" class="btn btn-sm btn-danger" target="_blank"> <span class="icon"><i class="fa fa-file-pdf"></i></span> Pdf</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/pegawai/index')}}">Pegawai</a></li>
                    <li class="breadcrumb-item active">Detail Pegawai</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <!-- Profile Image -->
                <div class="card card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="" width="100px" src="/foto/{{$tampils->foto_pegawai}}" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center"><b>{{$tampils->nama_pegawai}}</b></h3>
                        <p class="text-muted text-center"><b>{{$tampils->nik_pegawai}}</b></p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>TTL</b>
                                <span class="float-right">{{$tampils->tempat_lahir}}, {{\Carbon\Carbon::parse($tampils->tgl_lahir)->format('d-m-Y')}}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Jenis Kelamin</b>
                                <span class="float-right">{{$tampils->jenis_kelamin}}</span>
                            </li>
                            <li class="list-group-item">
                                <b>Jabatan</b>
                                <span class="float-right">{{$tampils->bagian_pegawai}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profil</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Pendidikan Terakhir</a></li>
                            <li class="nav-item"><a class="nav-link" href="#doc" data-toggle="tab">Berkas</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr class="highlight">
                                            <td class="field">NIK</td>
                                            <td>: {{$tampils->nik_pegawai}}</td>
                                        </tr>

                                        <tr>
                                            <td class="field">Nama</td>
                                            <td>: {{$tampils->nama_pegawai}}</td>
                                        </tr>
                                        <tr>
                                            <td class="field">Tempat/Tanggal Lahir</td>
                                            <td>: {{$tampils->tempat_lahir}}, {{\Carbon\Carbon::parse($tampils->tgl_lahir)->format('d-m-Y')}}</td>
                                        </tr>
                                        <tr>
                                            <td class="field">Jenis Kelamin</td>
                                            <td>: {{$tampils->jenis_kelamin}}</td>
                                        </tr>
                                        <tr>
                                            <td class="field">Agama</td>
                                            <td>: {{$tampils->agama}}</td>
                                        </tr>
                                        <tr>
                                            <td class="field">No. HP</td>
                                            <td>: {{$tampils->no_hp}}</td>
                                        </tr>
                                        <tr>
                                            <td class="field">Email</td>
                                            <td>: {{$tampils->email}}</td>
                                        </tr>

                                        <tr>
                                            <td class="field">Alamat</td>
                                            <td>: {{$tampils->alamat_pegawai}}</td>

                                        </tr>
                                        <tr>
                                            <td class="field">Instansi</td>
                                            <td>: {{$tampils->nama_instansi}}</td>
                                        </tr>
                                        <tr>
                                            <td class="field">Jabatan</td>
                                            <td>: {{$tampils->bagian_pegawai}}</td>
                                        </tr>
                                        <tr>
                                            <td class="field">Golongan</td>
                                            <td>: {{$tampils->golongan}}</td>
                                        </tr>
                                        <tr>
                                            <td class="field">Status Kepegawaian</td>
                                            <td> :
                                                <input data-id="{{$tampils->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Aktif" data-off="Tidak Aktif" {{ $tampils->status ? 'checked' : '' }}>
                                                <!-- <span class="bg-success color-palette pull-right">Aktif</span> -->
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr class="highlight">
                                            <td class="field" width="25%">Nama Sekolah</td>
                                            <td>: {{$tampils->pendidikan->nama_sekolah}}</td>
                                        </tr>
                                        <tr>
                                            <td class="field">Jenjang</td>
                                            <td>: {{$tampils->pendidikan->jenjang}}</td>
                                        </tr>
                                        <tr>
                                            <td class="field">Jurusan</td>
                                            <td>: {{$tampils->pendidikan->jurusan}}</td>
                                        </tr>
                                        <tr>
                                            <td class="field">Alamat Sekolah</td>
                                            <td>: {{$tampils->pendidikan->alamat_sekolah}}</td>
                                        </tr>
                                        <tr>
                                            <td class="field">Tahun Masuk</td>
                                            <td>: {{$tampils->pendidikan->thn_masuk}}</td>
                                        </tr>
                                        <tr>
                                            <td class="field">Tahun Lulus</td>
                                            <td>: {{$tampils->pendidikan->thn_lulus}}</td>
                                        </tr>
                                        <tr>
                                            <td class="field">Ijazah</td>
                                            <td>:
                                                <a href="/berkas/{{$tampils->berkas->ijazah_file}}" target="_blank" class="btn btn-xs btn-secondary">
                                                    <span class="icon"><i class="fas fa-folder-open"></i></span> Dokumen Ijazah</a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane" id="doc">
                                <!-- <div class="row">
                                    <div class="col-sm-6">
                                        <a href="{{url('/dokument/create')}}" class="btn btn-success btn-sm"> <span class="icon"><i class="fa fa-plus-circle"></i></span> dokumen baru</a>
                                    </div>
                                </div> -->
                                <br>
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr style="background-color: red;">
                                            <th>No</th>
                                            <th>Berkas</th>
                                            <th>Aksi</th>
                                            <!-- <th width="10%">
                                                <center><i class="fa fa-code fa-lg"></i></center>
                                            </th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>{{$tampils->berkas->ktp_file}}</td>
                                            <td>
                                                <a href="/berkas/{{$tampils->berkas->ktp_file}}" target="_blank" class="btn btn-xs btn-secondary"><i class="fas fa-folder-open"></i></a>
                                                <a href="{{'/berkas/edit/'.  Crypt::encryptString($tampils->id)}}" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i></a>
                                                <!-- <a href="#" class="btn btn-xs btn-danger hapus" data-id="{{$tampils->id}}"><i class="fas fa-trash-alt"></i></a> -->
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td>{{$tampils->berkas->ijazah_file}}</td>
                                            <td>
                                                <a href="/berkas/{{$tampils->berkas->ijazah_file}}" target="_blank" class="btn btn-xs btn-secondary"><i class="fas fa-folder-open"></i></a>
                                                <a href="{{'/berkas/edit/'.  Crypt::encryptString($tampils->id)}}" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i></a>
                                                <!-- <a href="#" class="btn btn-xs btn-danger hapus" data-id="{{$tampils->id}}"><i class="fas fa-trash-alt"></i></a> -->
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>3</td>
                                            <td>{{$tampils->berkas->pendukung_file}}</td>
                                            <td>
                                                <a href="/berkas/{{$tampils->berkas->pendukung_file}}" target="_blank" class="btn btn-xs btn-secondary"><i class="fas fa-folder-open"></i></a>
                                                <a href="{{'/berkas/edit/'.  Crypt::encryptString($tampils->id)}}" class="btn btn-xs btn-warning"><i class="fas fa-edit"></i></a>
                                                <!-- <a href="#" class="btn btn-xs btn-danger hapus" data-id="{{$tampils->id}}"><i class="fas fa-trash-alt"></i></a> -->
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection

@section('ajax')
<script>
    $(function() {
        $('.toggle-class').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var product_id = $(this).data('id');
            $.ajax({

                type: "GET",
                dataType: "json",
                url: '/changestatus',
                data: {
                    'status': status,
                    'product_id': product_id
                },
                success: function(data) {
                    console.log(data.success)
                }
            });
        })
    });
</script>

<script>
    $(document).on('click', '#hapus', function() {
        var berkasid = $(this).attr('data-id');
        Swal.fire({
            title: 'Yakin?',
            text: "Anda akan hapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus'
        }).then((willDelete) => {
            if (willDelete) {
                window.location = "/delete/berkas/" + berkasid + ""
            }
        })
    })
</script>

@endsection