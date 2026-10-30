<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>

<body>
    <h1>hhalaman perkalian</h1>
    <a href="{{ Route('pertambahan') }}">Pertambahan</a>
    <a href="{{ Route('perkurangan') }}">pengurangan</a>
    <a href="{{ Route('pembagian') }}">pembagian</a>
    <a href="{{ Route('perkalian') }}">perkalian</a>
    <a href="{{ url()->previous() }}">back</a>

    <form action="{{ Route('actionPerkalian') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">angka1</label>
            <input type="number" name = "angka1" placeholder="Masukan Angka">
        </div>
        <div class="form-group">
            <label for="">angka2</label>
            <input type="number" name = "angka2" placeholder="Masukan Angka">
        </div>
        <br>
        <div class="form-group">
            <button type="submit">Jumlah</button>
        </div>
        <h1>hasil perkalian ialah: {{ $kali ?? 0 }}</h1>
    </form>
</body>

</html>
