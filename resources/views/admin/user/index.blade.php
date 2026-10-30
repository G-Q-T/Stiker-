@extends('admin.layout.app');

@section('title', 'manajemen user')
@section('subtitle', 'Kelola akses akun kedalam Admin Panel')

@section('content')
<div class="mb-3" align = "right">
    <a href="{{route ('admin.user.create')}}">
        <i class="bi bi-person-add"></i>
        tambah users
    </a>

</div>
    <div class="table-responsive">
        <table class="table custom">
            <thead>
                <tr>
                    <th>#</th>
                    <th>nama</th>
                    <th>email</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datausers as $key => $user)
                <tr>
                     <td> {{$key += 1}}</td>
                     <td>{{$user -> name ?? ''}}</td>
                     <td>{{$user -> email ?? ''}}</td>
                     <td>
                      <a  href="{{route('admin.user.edit' , $user->id)}}"class="table-btn-action" title = "edit" >
                        <i class="bi bi-pencil"></i>
                      </a>
                      <form action="{{route('admin.user.destroy' , $user->id)}}" method="post" class="d-inline" onsubmit = "return confirm('Apakah yakin ingin dihapus')">
                        @csrf
                        @method('DELETE')
                          <button class="table-btn-action" title = "delete"  >
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
