@extends('layout.layout')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><i class="fas fa-info-circle"></i> Data Kenaikan Gaji Berkala Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <a href="{{url('/kgb/create')}}" class="btn btn-primary"> <span class="icon"><i class="fa fa-plus-circle"></i></span> kgb</a>
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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pegawai</th>
                                    <th>Nomor</th>
                                    <th>Golongan</th>
                                    <th>Gaji</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @php $no=1 @endphp
                            @foreach ($datas as $d)
                            <tbody>
                                <td>{{$no++}}</td>
                                <td></td>
                                <td>{{$d->nomor}}</td>
                                <td>{{$d->golongan}}</td>
                                <td>{{$d->gaji_baru}}</td>
                                <td>
                                    <form id="data-#" action="#" method="post"></form>
                                    <a href="" class="btn btn-xs btn-warning">
                                        <span class="icon"><i class="fa  fa-edit"></i></span></a>
                                    <button type="submit" class="btn btn-xs btn-danger" onclick="confirmLoker('#')"> <span class="icon"><i class="fa fa-trash"></i></span></button>
                                </td>
                            </tbody>
                            @endforeach
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