<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Picture</title>
</head>

<body>
    <p>{{$picture->nama}}</p>
    <p>{{$picture->path}}</p>
    <img src="{{$url}}" alt="" height="200px">

    <form action="{{route('picture.delete' ,$picture )}}" method="post">
        @method('delete')
        @csrf
        <button type="submit">Delete</button>
    </form>

    <form action="{{route('picture.copy' ,$picture )}}" method="get">
        <button type="submit">Copy</button>
    </form>
    <br>
    <form action="{{route('picture.move' ,$picture )}}" method="get">
        <button type="submit">Move</button>
    </form>

</body>

</html>