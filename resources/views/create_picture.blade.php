<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Picture</title>
</head>

<body>
    <form action="{{ route('picture.save') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="text" name="nama" placeholder="Masukkan nama file">
        <br>
        <input type="file" name="file">
        <br>

        <button type="submit">Submit</button>
    </form>
    
</body>

</html>