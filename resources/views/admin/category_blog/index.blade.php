@extends('admin.layout.app');

@section('title', 'manajemen kategori Blog')
@section('subtitle', 'Kelola akses akun kedalam Admin Panel')

@section('content')
    <div class="mb-3" align = "right">
        <a href="{{ route('admin.category_blog.create') }}">
            <i class="bi bi-person-add"></i>
            tambah kategori produk
        </a>

    </div>
    <div class="table-responsive">
        <table class="table custom">
            <thead>
                <tr>
                    <th>#</th>
                    <th>nama</th>
                    <th>slug url</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $categories)
                    <tr>
                        <td> {{ $key += 1 }}</td>
                        <td>{{ $categories->name ?? '' }}</td>
                        <td>{{ $categories->slug ?? '' }}</td>
                        <td>
                            <a href="{{ route('admin.category_blog.edit', $categories->id) }}"class="table-btn-action"
                                title = "edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.category_blog.destroy', $categories->id) }}" method="post"
                                class="d-inline" onsubmit = "return confirm('Apakah yakin ingin dihapus')">
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
