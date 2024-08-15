<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example</title>
</head>

<body>
    <h1>Toko {{$toko->nama}}</h1>
    <h2>Alamat: {{$kontakToko->alamat}}</h2>
    <h2>No.HP: {{$kontakToko->no_hp}}</h2>
    <h2>Email: {{$kontakToko->email}}</h2>



    <h3>Bunga List:</h3>
    @if($bungas->isEmpty())
    <p>Tidak Ada Bunga yang tersedia.</p>
    @else
    <ul>
        @foreach($bungas as $bunga)
        <li>
            {{ $bunga->nama }} - Stok: {{ $bunga->stok }}
            <p>Kategori Penjualan : </p>
            <ul>
                @if(isset($bungaKategoris[$bunga->id]))
                @foreach($bungaKategoris[$bunga->id] as $kategori)
                <li>{{ $kategori->nama }}</li>
                @endforeach
                @else
                <li>No categories available</li>
                @endif
            </ul>
        </li>
        @endforeach
    </ul>
    @endif
    <div>--------------------</div>
    @if($kategoris->isEmpty())
        <p>Tidak Ada Kategori yang tersedia.</p>
    @else
        @foreach($kategoris as $kategori)
            <h4>{{ $kategori->nama }}</h4>
            @if($kategori->getBungas->isEmpty())
                <p>No flowers available in this category.</p>
            @else
                <ul>
                    @foreach($kategori->getBungas as $bunga)
                        <li>{{ $bunga->nama }} - Stok: {{ $bunga->stok }}</li>
                    @endforeach
                </ul>
            @endif
        @endforeach
    @endif
</body>

</html>