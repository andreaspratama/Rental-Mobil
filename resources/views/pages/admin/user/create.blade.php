@extends('layouts.admin')

@section('judul')
    Tambah User
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">User</h1>

        <div class="card">
            <div class="card-header">
              Tambah User
            </div>
            <div class="card-body">
              <form method="POST" action="{{route('user.store')}}">
                @csrf
                <div class="form-group">
                  <label for="name">Nama User</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama User...">
                  @error('name')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="email">Email User</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email User...">
                  @error('email')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password User...">
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
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
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