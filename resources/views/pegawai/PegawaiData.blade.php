@extends('layout.layout')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-info-circle"></i> Data Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"> <a href="{{url('/pegawai/pdf')}}" class="btn btn-sm btn-danger" target="_blank"> <span class="icon"><i class="fa fa-file-pdf"></i></span> Pdf</a></li>
                    <li class="breadcrumb-item"> <a href="{{url('/export/pegawai')}}" class="btn btn-sm btn-success"><i class="fa fa-file-excel"></i> Excel</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/pegawai/create')}}" class="btn btn-sm btn-primary"> <span class="icon"><i class="fa fa-plus-circle"></i></span> Pegawai</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="pegawaiTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>NIK</th>
                                    <th>Nama Pegawai</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Hp</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <!-- @php $no=1 @endphp
                            @foreach ($pegawaidata as $d)
                            <tbody>
                                <td>{{$no++}}</td>
                                <td>
                                    <img src="/foto/{{$d->foto_pegawai}}" width="50px">
                                </td>
                                <td><a href="{{url('/pegawai/tampil/'. Crypt::encryptString($d->id))}}">{{$d->nik_pegawai}}</a></td>
                                <td>{{$d->nama_pegawai}}</td>
                                <td>{{$d->jenis_kelamin}}</td>
                                <td>{{$d->no_hp}}</td>
                                <td>{{$d->email}}</td>
                                <td>
                                    <form action="{{url('/pegawai/destroy/'.$d->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <a href="{{url('/pegawai/edit/'. Crypt::encryptString($d->id))}}" class="btn btn-xs btn-warning">
                                            <span class="icon"><i class="fa  fa-edit"></i></span></a>
                                        <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('yakin akan hapus data ini?')">
                                            <span class="icon"><i class="far fa-trash-alt"></i></span></button>
                                    </form>
                                </td>
                            </tbody>
                            @endforeach -->
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

@endsection

@section('ajax')

<script>
    $(function() {
        $('#pegawaiTable').DataTable({
            serverSide: true,
            ajax: "{{ route('pegawaitampil') }}",
            columns: [{
                    data: 'null',
                    class: 'align - top',
                    orderable: 'false',
                    searchable: 'false',
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'foto_pegawai',
                    name: 'foto_pegawai',
                    render: function(data, type, full, meta) {
                        return "<img src=\"/foto/" + data + "\" height=\"50\" alt = 'No Image' / > ";
                    }
                },
                {
                    data: 'nik_pegawai',
                    name: 'nik_pegawai'
                },
                {
                    data: 'nama_pegawai',
                    name: 'nama_pegawai'
                },
                {
                    data: 'jenis_kelamin',
                    name: 'jenis_kelamin'
                },
                {
                    data: 'no_hp',
                    name: 'no_hp'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },


            ]
        });
    })
</script>

<script>
    $(document).on('click', '.hapus', function() {
        let id = $(this).attr('id')
        Swal.fire({
            title: 'Yakin?',
            text: "Anda akan hapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{route('pegawai.delete')}}",
                    type: 'post',
                    data: {
                        id: id,
                        "_token": "{{csrf_token()}}"
                    },
                    success: function(response) {
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $('#pegawaiTable').DataTable().ajax.reload()
                    }
                })
            }
        })
    })
</script>




@endsection