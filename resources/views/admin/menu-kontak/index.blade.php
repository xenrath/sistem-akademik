@extends('layouts.app')

@section('title', 'Menu Kontak')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profile Sekolah</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Menu Kontak</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5>
            <i class="icon fas fa-check"></i> Berhasil!
          </h5>
          {{ session('success') }}
        </div>
      @endif
      @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5>
            <i class="icon fas fa-ban"></i> Gagal!
          </h5>
          @foreach (session('error') as $error)
            - {{ $error }} <br>
          @endforeach
        </div>
      @endif
      <form action="{{ url('admin/menu-kontak/update') }}" method="POST" autocomplete="off">
        @csrf
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Menu Kontak</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label for="kontak_alamat">Alamat</label>
              <textarea class="form-control" id="kontak_alamat" name="kontak_alamat">{{ old('kontak_alamat', $profilesekolah->kontak_alamat) }}</textarea>
            </div>
            <div class="form-group">
              <label for="kontak_email">Email</label>
              <input type="text" class="form-control" id="kontak_email" name="kontak_email"
                value="{{ old('kontak_email', $profilesekolah->kontak_email) }}">
            </div>
            <div class="form-group">
              <label for="kontak_telp">Telepon / WA</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">+62</span>
                </div>
                <input type="text" id="kontak_telp" name="kontak_telp" class="form-control"
                  value="{{ old('kontak_telp', $profilesekolah->kontak_telp) }}">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kontak_latitude">Latitude</label>
                  <input type="text" class="form-control" id="kontak_latitude" name="kontak_latitude"
                    value="{{ old('kontak_latitude', $profilesekolah->kontak_latitude) }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="kontak_longitude">Longitude</label>
                  <input type="text" class="form-control" id="kontak_longitude" name="kontak_longitude"
                    value="{{ old('kontak_longitude', $profilesekolah->kontak_longitude) }}">
                </div>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="link_facebook">Facebook</label>
                  <input type="text" class="form-control" id="link_facebook" name="link_facebook"
                    value="{{ old('link_facebook', $profilesekolah->link_facebook) }}">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="link_instagram">Instagram</label>
                  <input type="text" class="form-control" id="link_instagram" name="link_instagram"
                    value="{{ old('link_instagram', $profilesekolah->link_instagram) }}">
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection
