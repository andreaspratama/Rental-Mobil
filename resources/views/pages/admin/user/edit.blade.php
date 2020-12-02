@extends('layouts.admin')

@section('judul')
    Edit User
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">User</h1>

        <div class="card">
            <div class="card-header">
              Edit User
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('user.update', $item->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="name">Nama User</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama User..." value="{{$item->name}}">
                  @error('name')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="email">Email User</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email User..." value="{{$item->email}}">
                  @error('email')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password User..." value="{{$item->password}}">
                  @error('password')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="role">Role</label>
                  <select class="form-control" name="role">
                    <option>-- Pilih Role --</option>
                    <option value="user" @if($item->role == 'user') selected @endif>User</option>
                    <option value="admin" @if($item->role == 'admin') selected @endif>Admin</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{route('user.index')}}" class="btn btn-secondary float-right">Batal</a>
              </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection