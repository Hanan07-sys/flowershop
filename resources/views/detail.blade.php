<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter</title>
</head>

<body>
    <table border="1" cellspacing="0" cellpadding="">
        <tr>
            <th>ID</th>
            <th>Nama Toko</th>
            <th>Alamat</th>
            <th>Nomer Telp / telp</th>
        </tr>

        <tr>
            <td>{{$toko->id}}</td>
            <td>{{$toko->nama}}</td>
            <td>{{$toko->kontakToko->alamat}}</td>
            <td>{{$toko->kontakToko->no_hp . ' / '.$toko->kontakToko->email}}</td>
        </tr>

    
    </table>
    <p>Jenis Bunga tersedia</p>
        @foreach($toko->bungas as $bunga)
            <p>{{ $bunga->nama }}</p>
        @endforeach
</body>

</html>