@extends('admin.layout.app');

@section('title', 'edit blog')
@section('subtitle', 'update blog dengan akses panel admin')

@section('content')
    <form action="{{ route('admin.category_blog.update', $categoryBlog->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label-custom">Nama</label>
            <input type="text" class="form-control" name="name" required value="{{ old('name', $categoryBlog->name) }}">
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label-custom">slug (Opsional)</label>
            <input type="text" class="form-control" name="slug" value="{{ old('slug', $categoryBlog->slug) }}">
            @error('slug')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn-custom btn-custom-primary">simpan</button>
            <a href="{{ url()->previous() }}" class="btn-custom btn-custom-secondary">kembali</a>
        </div>
    </form>
@endsection
