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
            </tr>

            @foreach ($tokos as $toko)
                <tr>
                    <td>{{$toko->id}}</td>
                    <td>{{$toko->nama}}</td>
                </tr>
            @endforeach
        </table>
</body>
</html>