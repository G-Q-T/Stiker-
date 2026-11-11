@extends('admin.layout.app');

@section('title', 'manajemen Blog')
@section('subtitle', 'Kelola akses blog')

@section('content')
    <div class="mb-3" align = "right">
        <a href="{{ route('admin.blog.create') }}">
            <i class="bi bi-person-add"></i>
            tambah blog
        </a>

    </div>
    <div class="table-responsive">
        <table class="table custom">
            <thead>
                <tr>
                    <th>#</th>
                    <th>categori blog</th>
                    <th>name</th>
                    <th>cover</th>
                    <th>slug</th>
                    <th>deskripsi singkat</th>
                    <th>content</th>
                    <th>author</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $key => $datablog)
                    <tr>
                        <td> {{ $key += 1 }}</td>
                        <td>{{ $datablog->categoryBlog->name ?? '' }}</td>
                        <td>{{ $datablog->name ?? '' }}</td>
                        <td> <img src="{{ asset('storage/' . $datablog->cover_path ?? '') }}" alt="" srcset=""
                                width="100">
                        </td>
                        <td>{{ $datablog->slug ?? '' }}</td>
                        <td>{{ $datablog->brief_description ?? '' }}</td>
                        <td> {!! $datablog->content !!}</td>
                        <td>{{ $datablog->author ?? '' }}</td>
                        <td>
                            <a href="{{ route('admin.blog.edit', $datablog->id) }}"class="table-btn-action" title = "edit">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.blog.destroy', $datablog->id) }}" method="post" class="d-inline"
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
