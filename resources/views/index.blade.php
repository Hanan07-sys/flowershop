<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    @if(Auth::check())
    
    <p>Nama: {{$user->name}}</p>
    <p>Email: {{$user->email}}</p>
    <p>id: {{$user->id}}</p>
    <p>Role: {{$user->role}}</p>

    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit" name="">Logout</button>
    </form>
    <br>

    <a href="{{route('change_password')}}">Change password</a>
    <br>

    @else
    <a href="{{route('login')}}">Login</a>
    <a href="{{route('register')}}">Daftar</a>
    @endif

    <br>
    <table border="1" cellspacing="0" cellpadding="">
        <tr>
            <th>ID</th>
            <th>Nama Toko</th>
            <th>Aksi</th>
        </tr>

        @foreach ($data as $toko)
        <tr>
            <td>{{$toko->id}}</td>
            <td>
                <a href="{{ route('detail', $toko->id) }}">
                    {{$toko->nama}}
                </a>
            </td>
            <td>
                <form action="{{route('edit',$toko)}}" method="get">
                    <button type="submit">Edit</button>
                </form>
                <form action="{{route('delete',$toko)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    Current page : {{ $data->currentPage() }}

    Total Page : {{ $data->total() }}

    Data per page: {{ $data->perPage() }}

    {{ $data->links('pagination::bootstrap-4') }}
</body>

</html>