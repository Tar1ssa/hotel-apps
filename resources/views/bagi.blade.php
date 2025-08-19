<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bagi</title>
</head>
<body>
    <H1>bagi data</H1>
    <form action="{{ route('hasil_bagi') }}" method="post">
        @csrf
        <label for="">Angka 1</label>
        <input type="number" name="angka1" id="" placeholder="masukkan angka">
        <br>
        <label for="">Angka 2</label>
        <input type="number" name="angka2" id="" placeholder="masukkan angka">
        <br>
        <button type="submit">Proses</button>
        <a href="{{ url()->previous() }}">kembali</a>
    </form>

    <h3>Jumlah hasil : {{ $jumlah ?? 0 }}</h3>
</body>
</html>
