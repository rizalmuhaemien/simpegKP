@extends('layout.layout')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-info-circle"></i> Data Instansi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/instansi/pdf')}}" class="btn btn-sm btn-danger" target="_blank"><i class="fa fa-file-pdf"></i> Pdf</a></li>
                    <li class="breadcrumb-item"><a href="{{url('export/excel')}}" class="btn btn-sm btn-success"><i class="fa fa-file-excel"></i> Excel</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/instansi/create')}}" class="btn btn-sm btn-primary"> <span class="icon"><i class="fa fa-plus-circle"></i></span> instansi</a></li>
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
                        <table id="instansitable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Instansi</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>Email</th>
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
        $('#instansitable').DataTable({
            serverSide: true,
            ajax: "{{ route('instansitampil') }}",
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
                    data: 'nama_instansi',
                    name: 'nama_instansi'
                },
                {
                    data: 'alamat',
                    name: 'alamat'
                },
                {
                    data: 'no_tlp',
                    name: 'no_tlp'
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
<!-- <script>
    function confirmProfil(id) {

        Swal.fire({
            title: 'Yakin?',
            text: "Anda akan hapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#data-' + id).submit();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            }
        });
    };
</script> -->

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
                    url: "{{route('instansi.delete')}}",
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
                        $('#instansitable').DataTable().ajax.reload()
                    }
                })
            }
        })
    })
</script>

@endsection