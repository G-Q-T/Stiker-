@extends('admin.layout.app')

@section('title', 'Edit Blog')
@section('subtitle', 'Mengubah data blog melalui panel admin')

@section('content')

    <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data" id="formBlog">

        @csrf
        @method('PUT')

        {{-- Nama Blog --}}
        <div class="mb-3">
            <label class="form-label-custom">Nama Blog</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $blog->name) }}" required>

            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        {{-- Kategori Blog --}}
        <div class="mb-3">
            <label class="form-label-custom">Kategori Blog</label>

            <select name="blog_category_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>

                @foreach ($categoriesBlog as $category)
                    <option value="{{ $category->id }}"
                        {{ old('blog_category_id', $blog->blog_category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
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

            <input type="text" class="form-control" name="slug" value="{{ old('slug', $blog->slug) }}">

            @error('slug')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        {{-- Deskripsi Singkat --}}
        <div class="mb-3">
            <label class="form-label-custom">Deskripsi Singkat</label>

            <textarea name="brief_description" class="form-control" rows="3">{{ old('brief_description', $blog->brief_description) }}</textarea>

            @error('brief_description')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        {{-- Konten --}}
        <div class="mb-3">
            <label for="editor" class="form-label-custom">Konten Blog</label>

            <textarea name="content" id="content" class="d-none">{{ old('content', $blog->content) }}</textarea>

            <div id="editor">{!! old('content', $blog->content) !!}</div>

            @error('content')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        {{-- Author --}}
        <div class="mb-3">
            <label class="form-label-custom">Penulis</label>

            <input type="text" class="form-control" name="author" value="{{ old('author', $blog->author) }}">

            @error('author')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        {{-- Cover Blog --}}
        <div class="mb-3">
            <div class="row">
                <div class="col-6">
                    <label class="form-label-custom">Cover Blog</label>

                    <input type="file" class="form-control" name="cover_path"
                        accept="image/png,image/jpeg,image/jpg,image/gif">
                </div>

                <div class="col-6">
                    <label class="form-label-custom">Cover Blog Sebelumnya</label>

                    @if ($blog->cover_path)
                        <img src="{{ asset('storage/' . $blog->cover_path) }}" alt="Cover Blog" width="100%">
                    @else
                        <p>Belum ada cover.</p>
                    @endif
                </div>
            </div>

            @error('cover_path')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        {{-- Submit --}}
        <div class="mb-3">
            <button type="submit" class="btn-custom btn-custom-primary">
                Update Blog
            </button>

            <a href="{{ route('admin.blog.index') }}" class="btn-custom btn-custom-primary">
                Kembali
            </a>
        </div>

    </form>

@endsection
