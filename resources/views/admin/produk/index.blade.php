@extends('admin.layout.app');

@section('title', 'manajemen produk')
@section('subtitle', 'Pengelompokkan produk')

@section('content')
    <div class="mb-3" align = "right">
        <a href="{{ route('admin.produk.create') }}">
            <i class="bi bi-plus-circle-fill"></i>
            tambah produk
        </a>

    </div>
    <div class="table-responsive">
        <table class="table custom">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>kategori</th>
                    <th>Nama Produk</th>
                    <th>harga</th>
                    <th>harga Carton</th>
                    <th>harga paper</th>
                    <th>harga hvs</th>
                    <th>harga cutting</th>
                    <th>harga laminating doft</th>
                    <th>harga laminating glossy</th>
                    <th>harga Potong</th>
                    <th>deskripsi singkat</th>
                    <th>deskripsi</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataproduks as $itemproduk)
                    <tr>
                        <td> {{ $loop->iteration }}</td>
                        <td>
                            @if ($itemproduk->image !== null)
                                <img src="{{ asset('storage/' . $itemproduk->image) }}" width="100px"
                                    alt="{{ $itemproduk->name ?? '' }}">
                            @else
                                <span class="text-muted"> Gambar tidak ditemukan</span>
                            @endif
                        </td>
                        <td>{{ $itemproduk->category->name }}</td>
                        <td>{{ $itemproduk->name }}</td>
                        <td>{{ $itemproduk->slug }}</td>
                        <td>Rp.{{ number_format($itemproduk->price) }}</td>
                        <td>{{ $itemproduk->price_art_carton }}</td>
                        <td>{{ $itemproduk->price_art_paper }}</td>
                        <td>{{ $itemproduk->price_art_hvs }}</td>
                        <td>{{ $itemproduk->cutting_price }}</td>
                        <td>{{ $itemproduk->price_Doft }}</td>
                        <td>{{ $itemproduk->price_glossy }}</td>
                        <td>{{ $itemproduk->brief_description }}</td>
                        <td>{{ $itemproduk->description }}</td>
                        <td>
                            <a href="{{ route('admin.produk.edit', $itemproduk->id) }}"class="table-btn-action"
                                title = "edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="#" method="post" class="d-inline"
                                onsubmit = "return confirm('Apakah yakin ingin dihapus')">
                                @csrf
                                @method('DELETE')
                                <button class="table-btn-action" title = "delete">
                                    <i class="bi bi-trash"></i>
                                </button>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
