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
                        <li class="breadcrumb-item"><a href="{{url('/instansi/index')}}">Instansi</a></li>
                        <li class="breadcrumb-item active">Detail Instansi</li>
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
                                        <h5><span class="bg-warning color-palette pull-right"> # Instansi </span></h5>
                                    </th>
                                    <th>
                                        <h4>{{$instansis -> nama_instansi}} Kabupaten Batang</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="highlight">
                                    <td class="field" width="25%">Provinsi</td>
                                    <td>: Jawa Tengah</td>
                                </tr>
                                <tr class="highlight">
                                    <td class="field">Kabupaten / Kota</td>
                                    <td>: Kabupaten</td>
                                </tr>
                                <tr>
                                    <td class="field">Nama Kabupaten / Kota</td>
                                    <td>: {{$instansis -> nama_kabupaten}}</td>
                                </tr>
                                <tr>
                                    <td class="field"><i class="fas fa-map-marker-alt fa-lg m-r-5"></i> Alamat</td>
                                    <td>: {{$instansis -> alamat}}</td>
                                </tr>
                                <tr>
                                    <td class="field">Kode Pos</td>
                                    <td>: {{$instansis -> kd_pos}}</td>
                                </tr>
                                <tr>
                                    <td class="field"><i class="fas fa-phone-alt fa-lg m-r-5"></i> No. Telp</td>
                                    <td>: {{$instansis -> no_tlp}}</td>
                                </tr>
                                <tr>
                                    <td class="field"><i class="fa fa-envelope fa-lg m-r-5"></i> Email</td>
                                    <td>: {{$instansis -> email}}</td>
                                </tr>
                                <tr>
                                    <td class="field">Kepala Dinas</td>
                                    <td>: {{$instansis -> kepala_dinas}} </td>
                                </tr>
                                <tr>
                                    <td class="field">NIP</td>
                                    <td>: {{$instansis -> nip_kadis}}</td>
                                </tr>

                                <tr>
                                    <td class="field">Logo</td>
                                    <td> <img src='/logo/{{$instansis -> logo}}' width='94' height='125' alt='' /> </td>
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