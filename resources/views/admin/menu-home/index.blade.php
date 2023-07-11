@extends('layouts.app')

@section('title', 'Menu Home')

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
            <li class="breadcrumb-item active">Menu Home</li>
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
      <form action="{{ url('admin/menu-home/update') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Menu Home</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label for="home_nama">Nama Sekolah</label>
              <input type="text" class="form-control" id="home_nama" name="home_nama"
                value="{{ old('home_nama', $profilesekolah->home_nama) }}">
            </div>
            <div class="form-group">
              <label for="home_judul">Judul</label>
              <input type="text" class="form-control" id="home_judul" name="home_judul"
                value="{{ old('home_judul', $profilesekolah->home_judul) }}">
            </div>
            <div class="form-group">
              <label for="home_deskripsi">Deskripsi</label>
              <textarea class="form-control" id="home_deskripsi" name="home_deskripsi">{{ old('home_deskripsi', $profilesekolah->home_deskripsi) }}</textarea>
            </div>
            <div class="form-group">
              <label for="home_gambar">
                Gambar
                @if ($profilesekolah->home_gambar)
                  <small>(kosongkan saja jika tidak ingin diubah)</small>
                @endif
              </label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="home_gambar" name="home_gambar" accept="image/*">
                <label class="custom-file-label" for="home_gambar">Pilih Gambar</label>
              </div>
            </div>
            @if ($profilesekolah->home_gambar)
              <div class="row">
                <div class="col-3 col-md-2">
                  <a href="#" data-toggle="modal" data-target="#modal-gambar">
                    <img src="{{ asset('storage/uploads/' . $profilesekolah->home_gambar) }}" alt="Home Gambar"
                      class="rounded w-100">
                  </a>
                </div>
              </div>
              <div class="modal fade" id="modal-gambar">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                      <img src="{{ asset('storage/uploads/' . $profilesekolah->home_gambar) }}" alt="Home Gambar"
                        class="rounded w-100">
                    </div>
                    <div class="modal-footer text-right">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          </div>
          <div class="card-footer text-right">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection
