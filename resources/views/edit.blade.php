<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>

<body>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li class="text-danger">{{$error}}</li>
            @endforeach
        </ul>
    </div>

    @endif

    <form action="{{route('update', $toko)}}" method="post">
        @method('patch')
        @csrf
        <input type="text" name="nama" placeholder="Masukkan Nama" value="{{$toko->nama}}">
        <button type="submit">Ubah</button>
    </form>
</body>

</html>