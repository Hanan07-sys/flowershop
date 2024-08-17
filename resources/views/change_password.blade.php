<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password</title>
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

    @if(Session::has('massage'))
        <p>{{Session::get('massage')}}</p>
    @endif
    <form action="{{ route('save_password') }}" method="post">
        @method('patch')
        @csrf
        <input type="password" name="new_password">
        <input type="password" name="new_password_confirmation">
        <button type="submit">Ubah</button>
    </form>
</body>
</html>