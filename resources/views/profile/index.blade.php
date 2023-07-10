@extends('layouts.app')

@section('title', 'Profile')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5>
            <i class="icon fas fa-check"></i> Success!
          </h5>
          {{ session('success') }}
        </div>
      @endif
      @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5>
            <i class="icon fas fa-ban"></i> Error!
          </h5>
          @foreach (session('error') as $error)
            - {{ $error }} <br>
          @endforeach
        </div>
      @endif
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">Update Profile</h5>
        </div>
        <form action="{{ url('profile') }}" method="post" enctype="multipart/form-data" autocomplete="off">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama {{ ucfirst($user->level) }}</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="masukan nama user"
                value="{{ old('nama', $user->nama) }}">
            </div>
            @if ($user->level == 'guru')
              <div class="form-group">
                <label for="nuptk">NUPTK</label>
                <input type="text" class="form-control" id="nuptk" name="nuptk" placeholder="masukan nuptk"
                  value="{{ old('nuptk', $user->guru->nuptk) }}">
              </div>
              <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select class="custom-select form-control" name="gender" id="gender">
                  <option value="">- Pilih -</option>
                  <option value="L" {{ old('gender', $user->guru->gender) == 'L' ? 'selected' : '' }}>L</option>
                  <option value="P" {{ old('gender', $user->guru->gender) == 'P' ? 'selected' : '' }}>P</option>
                </select>
              </div>
              <div class="form-group">
                <label for="telp">No. Telepon</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">+62</span>
                  </div>
                  <input type="text" id="telp" name="telp" class="form-control"
                    placeholder="masukan nomor telepon" value="{{ old('telp', $user->guru->telp) }}">
                </div>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="masukan alamat">{{ old('alamat', $user->guru->alamat) }}</textarea>
              </div>
              <div class="form-group">
                <label for="foto">Foto</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="foto" name="foto" accept="image/*">
                  <label class="custom-file-label" for="foto">Pilih Foto</label>
                </div>
              </div>
              @if ($user->guru->foto)
                <div class="row">
                  <div class="col-lg-3">
                    <img src="{{ asset('storage/uploads/' . $user->guru->foto) }}" alt="{{ $user->nama }}" class="w-100">
                  </div>
                </div>
              @endif
            @endif
            <hr>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="masukan username"
                value="{{ old('username', $user->username) }}">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" class="form-control" value="{{ old('password') }}">
              <small>(Kosongkan saja jika tidak ingin diubah)</small>
            </div>
          </div>
          <div class="card-footer text-right">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection
