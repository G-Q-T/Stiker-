@extends('admin.layout.app');

@section('title', 'create user')
@section('subtitle', 'membuat akun user baru dengan akses panel admin')

@section('content')
 <form action="{{route('admin.user.store' )}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label-custom">Nama Lengkap</label>
        <input type="text" class="form-control" name="name" required value="{{old('name')}}">
        @error('name')
            <div class="invalid-feedback d-block">{{$message}}</div>
        @enderror
    </div>

        <div class="mb-3">
        <label for="" class="form-label-custom">Email</label>
        <input type="email" class="form-control" name="email" required value="{{old('email')}}">
         @error('email')
            <div class="invalid-feedback d-block">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label-custom">password</label>
        <input type="password" class="form-control" name="password" required>
         @error('password')
            <div class="invalid-feedback d-block">{{$message}}</div>
        @enderror
    </div>
    <div class="mb-3">
        <button type="submit" class="btn-custom btn-custom-primary">simpan</button>
    </div>
 </form>
@endsection
