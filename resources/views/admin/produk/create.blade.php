@extends('admin.layout.app');

@section('title', 'create produk')
@section('subtitle', 'membuat produk baru baru dengan akses panel admin')

@section('content')
    <form action="{{ route('admin.produk.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label-custom">nama produk</label>
            <input type="name" class="form-control" name="name" value="" required>
            @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="" class="form-label-custom">slug (optional)</label>
                    <input type="texr" class="form-control" name="slug" value="">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label for="" class="form-label-custom">kategori</label>
                    <select name="category_id" id="" class="form-select">
                        <option valu e="">--Pilih Kategori-- </option>
                        @foreach ($dataproduk as $itemproduk)
                            <option value="{{ $itemproduk->id }}">{{ $itemproduk->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="" class="form-label-custom">harga</label>
                    <input type="number" class="form-control" name="price">
                    @error('price')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="" class="form-label-custom">harga Art Carton</label>
                    <input type="number" class="form-control" name="price_art_carton">
                    @error('price_art_carton')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="" class="form-label-custom">harga Art Paper</label>
                    <input type="number" class="form-control" name="price_art_paper">
                    @error('price')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-sm-3">
                <div class="mb-3">
                    <label for="" class="form-label-custom">harga Art hvs</label>
                    <input type="number" class="form-control" name="price_art_hvs">
                    @error('price')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="mb-3">
                    <label for="" class="form-label-custom">harga laminating Doft</label>
                    <input type="number" class="form-control" name="price_Doft">
                    @error('price_Doft')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mb-3">
                    <label for="" class="form-label-custom">harga laminating glossy</label>
                    <input type="number" class="form-control" name="price_glossy">
                    @error('price_glossy')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-sm-4">
                <div class="mb-3">
                    <label for="" class="form-label-custom">harga Potong (min 5x5cm)</label>
                    <input type="number" class="form-control" name="cutting_price">
                    @error('cutting_price')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>




        <div class="mb-3">
            <label for="" class="form-label-custom">deskripsi singkat</label>
            <input type="text" class="form-control" name="brief_description">
            @error('brief_description')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label-custom">deskripsi</label>
            <textarea name="description" id="editor" cols="30" rows="10" class="form-control"
                placeholder="berikan deskripsi tentang produk">

            </textarea>
            @error('description')
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
