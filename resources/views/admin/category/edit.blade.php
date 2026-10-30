@extends('admin.layout.app');

@section('title', 'edit category')
@section('subtitle', 'update category dengan akses panel admin')

@section('content')
    <form action="{{ route('admin.category.update', $category->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label-custom">Nama</label>
            <input type="text" class="form-control" name="name" required value="{{ old('name', $category->name) }}">
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label-custom">slug (Opsional)</label>
            <input type="text" class="form-control" name="slug" value="{{ old('slug', $category->slug) }}">
            @error('slug')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">ikon</label>
            <input type="text" class="form-control" name="icon" value="{{ old('icon', $category->icon) }}">
            @error('icon')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label-custom">urutan tampil</label>
            <input type="number" class="form-control" name="sort_order"
                value="{{ old('sort_order', $category->sort_order) }}">
            @error('sort_order')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn-custom btn-custom-primary">simpan</button>
        </div>
    </form>
@endsection
