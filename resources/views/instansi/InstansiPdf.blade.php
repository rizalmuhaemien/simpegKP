<!DOCTYPE html>
<html>

<head>
    <title>Kantor Dinas Kabupaten Batang</title>
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
                    <!-- <h4>BADAN KEPEGAWAIAN DAERAH</h4> -->
                    <i>Jl. RA. Kartini No. 1 Batang, 51216 Jawa Tengah, Telp . ( 0262 ) 428590</i>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <center>
            <h5>Instansi / Unit Kerja Pemerintahan Kabupaten Batang 2022</h5>
        </center>
        <br>
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Instansi</th>
                    <th>No Telephone</th>
                    <th>Email</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($instansi as $i)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{$i->nama_instansi}}</td>
                    <td>{{$i->no_tlp}}</td>
                    <td>{{$i->email}}</td>
                    <td>{{$i->alamat}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



</body>

</html>