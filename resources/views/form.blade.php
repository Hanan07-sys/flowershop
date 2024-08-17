<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
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

    <form action="{{route('save')}}" method="post">
        @csrf
        <input type="text" name="nama" placeholder="Masukkan Nama">
        <input type="text" name="alamat" placeholder="Masukkan alamat">
        <input type="text" name="no_hp" placeholder="Masukkan Nomer HP">
        <input type="text" name="email" placeholder="Masukkan Email">
        <button type="submit">Tambah</button>
    </form>
</body>

</html>