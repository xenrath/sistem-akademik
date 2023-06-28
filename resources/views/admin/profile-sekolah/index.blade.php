@extends('layouts.app')

@section('title', 'Ubah Profile')

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
            <li class="breadcrumb-item active">Profile Sekolah</li>
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
      <form action="{{ url('admin/profile-sekolah') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Menu Home</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
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
              <label for="home_gambar">Gambar <small>(kosongkan saja jika tidak ingin diubah)</small></label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="home_gambar" name="home_gambar" accept="image/*">
                <label class="custom-file-label" for="home_gambar">Pilih Gambar</label>
              </div>
            </div>
            @if ($profilesekolah->home_gambar)
              <div class="row">
                <div class="col-md-3">
                  <img src="{{ asset('storage/uploads/' . $profilesekolah->home_gambar) }}" alt="Home Gambar"
                    class="rounded w-100">
                </div>
              </div>
            @endif
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Menu Tentang Kami</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label for="about_deskripsi">Deskripsi</label>
              <textarea class="form-control" id="about_deskripsi" name="about_deskripsi">{{ old('about_deskripsi', $profilesekolah->about_deskripsi) }}</textarea>
            </div>
            <div class="form-group">
              <label for="about_visi">Visi</label>
              <textarea class="form-control" id="about_visi" name="about_visi">{{ old('about_visi', $profilesekolah->about_visi) }}</textarea>
            </div>
            <div class="form-group">
              <label for="about_misi">Misi</label>
              <textarea class="form-control" id="about_misi" name="about_misi">{{ old('about_misi', $profilesekolah->about_misi) }}</textarea>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Menu Galeri</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label for="galeri_gambar">Gambar <small>(kosongkan saja jika tidak ingin ditambahkan)</small></label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="galeri_gambar" name="galeri_gambar[]"
                  accept="image/*" multiple>
                <label class="custom-file-label" for="galeri_gambar">Pilih Gambar</label>
              </div>
            </div>
            @if ($profilesekolah->galeri_gambar)
              <div class="row">
                @foreach (json_encode($profilesekolah->galeri_gambar) as $key => $galeri_gambar)
                  <div class="col-md-3">
                    <img src="{{ asset('storage/uploads/' . $galeri_gambar) }}" alt="Galeri Gambar {{ $key }}"
                      class="rounded w-100">
                  </div>
                @endforeach
              </div>
            @endif
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Menu PPDB</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label for="ppdb_flayer">Flayer <small>(kosongkan saja jika tidak ingin diubah)</small></label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="ppdb_flayer" name="ppdb_flayer" accept="image/*">
                <label class="custom-file-label" for="ppdb_flayer">Pilih Gambar</label>
              </div>
            </div>
            @if ($profilesekolah->ppdb_flayer)
              <div class="row">
                <div class="col-md-3">
                  <img src="{{ asset('storage/uploads/' . $profilesekolah->ppdb_flayer) }}" alt="PPDB Flayer"
                    class="rounded w-100">
                </div>
              </div>
            @endif
          </div>
        </div>
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
        </div>
        <div class="card">
          <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection
