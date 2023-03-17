<html>

<head>
    <title>Data Diri Pegawai</title>
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

        .table {
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
        <table class="table" width="100%" border="0">
            <tr>
                <td><img src="{{public_path('logo/batang.png')}}" width="80px"></td>
                <td class="tengah">
                    <h4>PEMERINTAH KABUPATEN BATANG</h4>
                    <h4>DINAS KOMUNIKASI DAN INFORMATIKA</h4>
                    <i>Jl. RA. Kartini No. 1 Batang, 51216 Jawa Tengah, Telp . ( 0285 ) 392219</i>
                </td>
            </tr>
        </table>

        <!--INFORMASI DATA DIRI-->
        <br>
        <br>
        <b>INFORMASI PEGAWAI</b>

        <img src="foto/{{$pdfs->foto_pegawai}}" align="right" width="104" height="142">
        <table style="width:75%">
            <tr>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>: {{$pdfs->nama_pegawai}} </td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>: {{$pdfs->nik_pegawai}} </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{$pdfs->jenis_kelamin}} </td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>: {{$pdfs->agama}} </td>
            </tr>
            <tr>
                <td>TTL</td>
                <td>: {{$pdfs->tempat_lahir}}, {{\Carbon\Carbon::parse($pdfs->tgl_lahir)->format('d-m-Y')}} </td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>: {{$pdfs->bagian_pegawai}}</td>
            </tr>
            <tr>
                <td>Golongan</td>
                <td>: {{$pdfs->golongan}}</td>
            </tr>
            <tr>
                <td>Instansi</td>
                <td>: {{$pdfs->nama_instansi}}</td>
            </tr>
            <tr>
                <td>No HP</td>
                <td>: {{$pdfs->no_hp}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: {{$pdfs->email}}</td>
            </tr>
            <td>Alamat</td>
            <td>: {{$pdfs->alamat_pegawai}}</td>
        </table>

        <br>
        <b>PENDIDIKAN TERAKHIR</b>

        <table style="width:90%">
            <tr>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td>Nama Sekolah</td>
                <td>: {{$pdfs->pendidikan->nama_sekolah}} </td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>: {{$pdfs->pendidikan->jenjang}} {{$pdfs->pendidikan->jurusan}} </td>
            </tr>
            <td>Tahun Masuk</td>
            <td>: {{$pdfs->pendidikan->thn_masuk}}</td>
            <tr>
                <td>Tahun Lulus</td>
                <td>: {{$pdfs->pendidikan->thn_lulus}} </td>
            </tr>
            <td>Alamat Sekolah</td>
            <td>: {{$pdfs->pendidikan->alamat_sekolah}}</td>
        </table>

    </div>
</body>

</html>