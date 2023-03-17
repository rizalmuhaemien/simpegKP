<table class="static" align="center" border="1px">
    <thead>
        <tr>
            <th>No</th>
            <th>Pegawai</th>
            <th>NIK</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>TTL</th>
            <th>Jabatan</th>
            <th>Golongan</th>
            <th>Instansi</th>
            <th>No HP</th>
            <th>Email</th>
            <th width="50%">Alamat</th>
        </tr>
    </thead>
    @php $no = 1; @endphp
    @foreach ( $datas as $d)
    <tr>
        <td>{{$no++}}</td>
        <td>{{$d->nama_pegawai}}</td>
        <td>{{"'".$d->nik_pegawai}}</td>
        <td>{{$d->jenis_kelamin}}</td>
        <td>{{$d->agama}}</td>
        <td>{{$d->tempat_lahir}}, {{ \Carbon\Carbon::parse($d->tgl_lahir)->format('d-m-Y') }}</td>
        <td>{{$d->bagian_pegawai}}</td>
        <td>{{$d->golongan}}</td>
        <td>{{$d->nama_instansi}}</td>
        <td>{{$d->no_hp}}</td>
        <td>{{$d->email}}</td>
        <td>{{$d->alamat_pegawai}}</td>
    </tr>
    @endforeach
</table>