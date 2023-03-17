<table class="static" align="center" border="1px">
    <thead>
        <tr>
            <th>No</th>
            <th>Instansi</th>
            <th>Kabupaten</th>
            <th>Provinsi</th>
            <th>Alamat</th>
            <th>No Telephone</th>
            <th>Email</th>
            <th>Kepala Dinas</th>
            <th>Nip</th>
        </tr>
    </thead>
    @php $no = 1; @endphp
    @foreach ( $instansis as $i)
    <tr>
        <td>{{$no++}}</td>
        <td>{{$i->nama_instansi}}</td>
        <td>{{$i->nama_kabupaten}}</td>
        <td>{{$i->nama_provinsi}}</td>
        <td>{{$i->alamat}}</td>
        <td>{{$i->no_tlp}}</td>
        <td>{{$i->email}}</td>
        <td>{{$i->kepala_dinas}}</td>
        <td>{{"'".$i->nip_kadis}}</td>
    </tr>
    @endforeach
</table>