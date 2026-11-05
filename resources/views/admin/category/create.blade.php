@extends('admin.layout.app');

@section('title', 'create category')
@section('subtitle', 'membuat categoryproduk baru baru dengan akses panel admin')

@section('content')
    <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label-custom">Nama</label>
            <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
            @error('name')
                <div c ass="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label-custom">slug (Opsional)</label>
            <input type="email" class="form-control" name="slug" value="{{ old('slug') }}">
            @error('slug')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">ikon</label>
            <input type="text" class="form-control" name="icon">
            @error('icon')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label-custom">urutan tampil</label>
            <input type="number" class="form-control" name="sort_order">
            @error('sort_order')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn-custom btn-custom-primary">simpan</button>
        </div>
    </form>
@endsection
