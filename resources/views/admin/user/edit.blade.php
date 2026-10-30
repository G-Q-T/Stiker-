@extends('admin.layout.app');

@section('title', 'edit')
@section('subtitle', 'membuat akun edit baru dengan akses panel admin')

@section('content')
    <form action="{{ route('admin.user.update', $user) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label-custom">Nama Lengkap</label>
            <input type="text" class="form-control" name="name" required value="{{ old('name', $user->name) }}">
            @error('name')
                <div class="invalid-feedback d-block"> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="" class="form-label-custom">Email</label>
            <input type="email" class="form-control" name="email" required value="{{ old('email', $user->email) }}">
            @error('emai')
                <div class="invalid-feedback d-block"> {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label-custom">password Baru</label>
            <input type="password" class="form-control" name="password">
            <small>Ubah password, Opsional</small>
        </div>
        @error('password')
            <div class="invalid-feedback d-block"> {{ $message }}</div>
        @enderror
        <div class="mb-3">
            <button type="submit" class="btn-custom btn-custom-primary">simpan</button>
        </div>
    </form>
@endsection
