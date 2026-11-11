@extends('admin.layout.app')

@section('title', 'Create Blog')
@section('subtitle', 'Membuat blog baru dengan akses panel admin')

@section('content')
    <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nama Blog --}}
        <div class="mb-3">
            <label class="form-label-custom">Nama Blog</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        {{-- Kategori Blog --}}
        <div class="mb-3">
            <label class="form-label-custom">Kategori Blog</label>
            <select name="blog_category_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($blogs as $blog)
                    <option value="{{ $blog->id }}">
                        {{ $blog->name }}
                    </option>
                @endforeach
            </select>
            @error('blog_category_id')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        {{-- Slug --}}
        <div class="mb-3">
            <label class="form-label-custom">Slug (Opsional)</label>
            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
            @error('slug')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        {{-- Deskripsi Singkat --}}
        <div class="mb-3">
            <label class="form-label-custom">Deskripsi Singkat</label>
            <textarea name="brief_description" class="form-control" rows="3">{{ old('brief_description') }}</textarea>
            @error('brief_description')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        {{-- Konten --}}
        <div class="mb-3">
            <label for="editor" class="form-label-custom">Konten Blog</label>
            <textarea name="content" id="content" class="d-none"></textarea>
            <div id="editor">{!! old('content') !!}</div>
        </div>

        {{-- Author --}}
        <div class="mb-3">
            <label class="form-label-custom">Penulis</label>
            <input type="text" class="form-control" name="author" readonly value="{{ auth()->user()->name }}">
            @error('author')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        {{-- Cover Blog --}}
        <div class="mb-3">
            <label class="form-label-custom">Cover Blog</label>
            <input type="file" class="form-control" name="cover_path" accept="image/png,image/jpeg,image/jpg,image/gif">
            @error('cover_path')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        {{-- Submit --}}
        <div class="mb-3">
            <button type="submit" class="btn-custom btn-custom-primary">
                Simpan Blog
            </button>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn-custom btn-custom-primary">simpan</button>
            <a href="{{ url()->previous() }}" class="btn-custom btn-custom-primary">back</a>
        </div>
    </form>
@endsection
