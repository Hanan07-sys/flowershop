<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <p>Locale: {{ App::getLocale() }}</p>
    <a href="{{route('set_locale', 'en')}}">English</a>
    <a href="{{route('set_locale', 'id')}}">Indonesia</a>

    <h3>{{ __('Welcome to this page') }}</h3>

    @if(Auth::check())

    <p>{{ __('Name') }}: {{$user->name}}</p>
    <p>{{ __('Email') }}: {{$user->email}}</p>
    <p>{{ __('Role') }}: {{$user->role}}</p>
    <p>id: {{$user->id}}</p>

    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit" name="">{{ __('Logout') }}</button>
    </form>
    <br>

    <a href="{{route('change_password')}}">{{ __('Change Password') }}</a>
    <br>

    @else
    <a href="{{route('login')}}">{{ __('Login') }}</a>
    <a href="{{route('register')}}">{{ __('Register') }}</a>
    @endif

    <br>
    <table border="1" cellspacing="0" cellpadding="">
        <tr>
            <th>ID</th>
            <th>{{ __('Name Shop') }}</th>
            <th>{{ __('Action') }}</th>
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
                    <button type="submit">{{ __('Edit') }}</button>
                </form>
                <form action="{{route('delete',$toko)}}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit">{{ __('Delete') }}</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ __('Current Page') }} : {{ $data->currentPage() }}

    {{ __('Total Data') }} : {{ $data->total() }}

    {{ __('Data per page') }}: {{ $data->perPage() }}

    {{ $data->links('pagination::bootstrap-4') }}
</body>

</html>