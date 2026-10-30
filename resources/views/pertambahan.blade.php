@extends('belajar')
@section('content')
    <form action="{{ Route('actionTambah') }}" method="post">
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
        <h1>hasil penjumlahan ialah: {{ $jumlah ?? 0 }}</h1>
    </form>
@endsection
