```blade
@extends('admin.layout.app')

@section('title', 'Manajemen Produk')
@section('subtitle', 'Pengelolaan Data Produk')

@section('content')

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Data Produk</h5>
            <small class="text-muted">Daftar seluruh produk yang tersedia</small>
        </div>

        <a href="{{ route('admin.produk.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Produk
        </a>
    </div>

    {{-- Tabel Produk --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th class="text-center" width="60">No</th>
                            <th width="110">Gambar</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Slug</th>
                            <th>Harga Utama</th>
                            <th>Art Carton</th>
                            <th>Art Paper</th>
                            <th>HVS</th>
                            <th>Cutting</th>
                            <th>Laminating Doft</th>
                            <th>Laminating Glossy</th>
                            <th>Deskripsi Singkat</th>
                            <th>Deskripsi</th>
                            <th class="text-center" width="110">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($dataproduks as $itemproduk)
                            <tr>
                                {{-- Nomor --}}
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>

                                {{-- Gambar --}}
                                <td>
                                    @if ($itemproduk->image)
                                        <img src="{{ asset('storage/' . $itemproduk->image) }}"
                                            alt="{{ $itemproduk->name }}" class="rounded border"
                                            style="width: 65px; height: 65px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded border d-flex align-items-center justify-content-center"
                                            style="width: 65px; height: 65px;">
                                            <i class="bi bi-image text-muted fs-4"></i>
                                        </div>
                                    @endif
                                </td>

                                {{-- Kategori --}}
                                <td>
                                    {{ $itemproduk->category->name ?? '-' }}
                                </td>

                                {{-- Nama Produk --}}
                                <td class="fw-semibold">
                                    {{ $itemproduk->name }}
                                </td>

                                {{-- Slug --}}
                                <td>
                                    <small class="text-muted">
                                        {{ $itemproduk->slug ?? '-' }}
                                    </small>
                                </td>

                                {{-- Harga --}}
                                <td class="fw-semibold text-nowrap">
                                    Rp {{ number_format($itemproduk->price, 0, ',', '.') }}
                                </td>

                                <td class="text-nowrap">
                                    {{ $itemproduk->price_art_carton !== null
                                        ? 'Rp ' . number_format($itemproduk->price_art_carton, 0, ',', '.')
                                        : '-' }}
                                </td>

                                <td class="text-nowrap">
                                    {{ $itemproduk->price_art_paper !== null
                                        ? 'Rp ' . number_format($itemproduk->price_art_paper, 0, ',', '.')
                                        : '-' }}
                                </td>

                                <td class="text-nowrap">
                                    {{ $itemproduk->price_art_hvs !== null ? 'Rp ' . number_format($itemproduk->price_art_hvs, 0, ',', '.') : '-' }}
                                </td>

                                <td class="text-nowrap">
                                    {{ $itemproduk->cutting_price !== null ? 'Rp ' . number_format($itemproduk->cutting_price, 0, ',', '.') : '-' }}
                                </td>

                                <td class="text-nowrap">
                                    {{ $itemproduk->price_Doft !== null ? 'Rp ' . number_format($itemproduk->price_Doft, 0, ',', '.') : '-' }}
                                </td>

                                <td class="text-nowrap">
                                    {{ $itemproduk->price_glossy !== null ? 'Rp ' . number_format($itemproduk->price_glossy, 0, ',', '.') : '-' }}
                                </td>

                                {{-- Deskripsi --}}
                                <td style="min-width: 180px;">
                                    {{ $itemproduk->brief_description ?? '-' }}
                                </td>

                                <td style="min-width: 200px;">
                                    {!! $itemproduk->description !!}
                                </td>

                                {{-- Aksi --}}
                                <td>
                                    <div class="d-flex justify-content-center gap-2">

                                        <a href="{{ route('admin.produk.edit', $itemproduk->id) }}"
                                            class="btn btn-sm btn-outline-primary" title="Edit Produk">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('admin.produk.destroy', $itemproduk->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                title="Hapus Produk">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="15" class="text-center py-5">
                                    <i class="bi bi-inbox fs-1 text-muted"></i>
                                    <p class="text-muted mb-0 mt-2">
                                        Belum ada data produk.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection
```
