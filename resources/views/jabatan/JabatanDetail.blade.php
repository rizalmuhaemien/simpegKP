@extends('layout.layout')

@section('content')

<!-- Main content -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/jabatan/index')}}">Jabatan</a></li>
                        <li class="breadcrumb-item active">{{$details->jabatan}}</li>
                    </ol>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-2">
            </div>
            <!-- /.col -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th style="width:160px;">
                                        <h5><span class="bg-warning color-palette pull-right"> # {{$details->jabatan}} </span></h5>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="highlight">
                                    <td class="field" width="50%">{!!$details->deskripsi_jabatan!!}</td>
                                    <!-- <td>Jawa Tengah</td> -->
                                </tr>
                                <tr class="highlight">
                                    <td class="field"> </td>
                                    <!-- <td>Jawa Tengah</td> -->
                                </tr>
                            </tbody>
                        </table>
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