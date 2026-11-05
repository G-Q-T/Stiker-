@extends('admin.layout.app');

@section('title', 'edit produk')
@section('subtitle', 'update produk dengan akses panel admin')

@section('content')
    <form action="{{ route('admin.produk.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label-custom">kategori</label>
            <select name="category_id" id="" class="form-select">
                <option value="">--Pilih Kategori</option>
                <option value=""></option>
            </select>
            @error('category')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">nama produk</label>
            <input type="name" class="form-control" name="name" value="">
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label-custom">stock</label>
            <input type="number" class="form-control" name="stock" value="">
            @error('stock')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">harga</label>
            <input type="number" class="form-control" name="price">
            @error('price')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label-custom">upload gambar</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn-custom btn-custom-primary">simpan</button>
            <a href="{{ url()->previous() }}" class="btn-custom btn-custom-primary">back</a>
        </div>
    </form>
@endsection
