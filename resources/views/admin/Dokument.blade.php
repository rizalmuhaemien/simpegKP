@extends('layout.layout')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-info-circle"></i> Berkas Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/dokument/create/')}}" class="btn btn-sm btn-primary"> <span class="icon"><i class="fa fa-plus-circle"></i></span> Berkas</a></li>
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
                        <table id="dokumentable" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th width="12%">ID Pegawai</th>
                                    <th>Ijazah</th>
                                    <th>KTP</th>
                                    <th>Sertifikat</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                        </table>


                    </div>
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
        $('#dokumentable').DataTable({
            serverSide: true,
            ajax: "{{ route('dokumentampil') }}",
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
                    data: 'kd_berkas',
                    name: 'kd_berkas'
                },
                {
                    data: 'ktp_file',
                    name: 'ktp_file'
                },
                {
                    data: 'ijazah_file',
                    name: 'ijazah_file'
                },
                {
                    data: 'pendukung_file',
                    name: 'pendukung_file'
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
                    url: "{{route('berkas.delete')}}",
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
                        $('#dokumentable').DataTable().ajax.reload()
                    }
                })
            }
        })
    })
</script>
@endsection