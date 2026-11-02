@extends('admin.layout.app');

@section('title', 'manajemen produk')
@section('subtitle', 'Pengelompokkan produk')

@section('content')
    <div class="mb-3" align = "right">
        <a href="{{ route('admin.produk.create') }}">
            <i class="bi bi-person-add"></i>
            tambah kategori produk
        </a>

    </div>
    <div class="table-responsive">
        <table class="table custom">
            <thead>
                <tr>
                    <th>No</th>
                    <th>kategri</th>
                    <th>Nama Produk</th>
                    <th>gambar</th>
                    <th>stock</th>
                    <th>harga</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataproduks as $itemproduk)
                    <tr>
                        <td> {{ $loop->iteration }}</td>
                        <td>{{ $itemproduk->category->name }}</td>
                        <td>{{ $itemproduk->name }}</td>
                        <td>
                            <img src="" alt="">{{ $itemproduk->image }}
                        </td>
                        <td>{{ $itemproduk->stock }}</td>
                        <td>Rp.{{ number_format($itemproduk->price) }}</td>
                        <td>
                            <a href="#"class="table-btn-action" title = "edit">
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
