@extends('layout.layout')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-info-circle"></i> Data Pendidikan Terakhir Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <a href="{{url('/pendidikan/create')}}" class="btn btn-primary"> <span class="icon"><i class="fa fa-plus-circle"></i></span> pendidikan</a>
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
                    <!-- <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div> -->
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="pendidikantable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pegawai</th>
                                    <th>Jurusan</th>
                                    <th>Nama Sekolah</th>
                                    <th>Tahun Lulus</th>
                                    <th>Alamat Sekolah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <!-- @php $no=1 @endphp
                            @foreach ($pendidikan as $p)
                            <tbody>
                                <td>{{$no++}}</td>
                                <td>{{$p->pegawai_nama}}</td>
                                <td>{{$p->jurusan}}</td>
                                <td>{{$p->nama_sekolah}}</td>
                                <td>{{$p->thn_lulus}}</td>
                                <td>{{$p->alamat_sekolah}}</td>
                                <td>
                                    <form action="{{url('/pendidikan/destroy/'.$p->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <a href="{{url('/pendidikan/edit/'. Crypt::encryptString($p->id))}}" class="btn btn-xs btn-warning">
                                            <span class="icon"><i class="fa  fa-edit"></i></span></a>
                                        <button class="btn btn-xs btn-danger" onclick="return confirm('Yakin akan hapus data ini?')">
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
</section>
@endsection

@section('ajax')
<script>
    $(function() {
        $('#pendidikantable').DataTable({
            serverSide: true,
            ajax: "{{ route('pendidikantampil') }}",
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
                    data: 'pegawai_nama',
                    name: 'pegawai_nama'
                },
                {
                    data: 'jurusan',
                    name: 'jurusan'
                },
                {
                    data: 'nama_sekolah',
                    name: 'nama_sekolah'
                },
                {
                    data: 'thn_lulus',
                    name: 'thn_lulus'
                },
                {
                    data: 'alamat_sekolah',
                    name: 'alamat_sekolah'
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
                    url: "{{route('delete.Pendidikan')}}",
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
                        $('#pendidikantable').DataTable().ajax.reload()
                    }
                })
            }
        })
    })
</script>

@endsection