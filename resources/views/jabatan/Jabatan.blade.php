@extends('layout.layout')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-info-circle"></i> Data Jabatan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <a href="{{url('/jabatan/create/')}}" class="btn btn-primary"> <span class="icon"><i class="fa fa-plus-circle"></i></span> jabatan</a>
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
                        @csrf
                        <table id="jabatantabel" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th width="3%">No</th>
                                    <th>Jabatan</th>
                                    <!-- <th>Deskripsi Jabatan</th> -->
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
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
        $('#jabatantabel').DataTable({
            serverSide: true,
            ajax: "{{ route('jabatantampil') }}",
            "headers": {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
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
                    data: 'jabatan',
                    name: 'jabatan'
                },
                // {
                //     data: 'deskripsi_jabatan',
                //     name: 'deskripsi_jabatan'
                // },
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
                    url: "{{route('hapus')}}",
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
                        $('#jabatantabel').DataTable().ajax.reload()
                    }
                })
            }
        })
    })
</script>


@endsection