<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pegawai Dinas Kabupaten Batang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        body {
            font-family: arial;

        }

        .rangkasurat {
            width: 700px;
            margin: 0 auto;
            background-color: #fff;
            height: 300px;
            padding: 10px;
        }

        table {
            border-bottom: 5px solid #000;
            padding: 2px;
        }

        .tengah {
            text-align: center;

        }
    </style>
</head>

<body>
    <div class="rangkasurat">
        <table width="100%" border="0">
            <tr>
                <td><img src="{{public_path('logo/batang.png')}}" width="80px"></td>
                <td class="tengah">
                    <h4>PEMERINTAH KABUPATEN BATANG</h4>
                    <h4>DINAS KOMUNIKASI DAN INFORMATIKA</h4>
                    <i>Jl. RA. Kartini No. 1 Batang, 51216 Jawa Tengah, Telp . ( 0285 ) 392219</i>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <center>
            <h5>Pegawai Diskominfo Kabupaten Batang Non PNS 2022</h5>
        </center>
        <br>
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th width="3%">No</th>
                    <th>Nama Pegawai</th>
                    <th width="7%">Jenis Kelamin</th>
                    <th>Instansi</th>
                    <th>Jabatan</th>
                    <th>No HP</th>
                    <th width="50%">Alamat</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($pegawaidata as $p)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$p->nama_pegawai}}</td>
                    <td>{{$p->jenis_kelamin}}</td>
                    <td>{{$p->nama_instansi}}</td>
                    <td>{{$p->bagian_pegawai}}</td>
                    <td>{{$p->no_hp}}</td>
                    <td>{{$p->alamat_pegawai}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>