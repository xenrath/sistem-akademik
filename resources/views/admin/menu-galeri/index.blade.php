@extends('layouts.app')

@section('title', 'Menu Galeri')

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
            <li class="breadcrumb-item active">Menu Galeri</li>
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
            - {{ $error }}
          @endforeach
        </div>
      @endif
      <form action="{{ url('admin/menu-galeri/update') }}" method="POST" enctype="multipart/form-data"
        autocomplete="off">
        @csrf
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Menu Galeri</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label for="galeri_gambar">Gambar
                @if ($profilesekolah->galeri_gambar)
                  @if (count(json_decode($profilesekolah->galeri_gambar)) > 0)
                    <small>(kosongkan saja jika tidak ingin ditambahkan)</small>
                  @endif
                @endif
              </label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="galeri_gambar" name="galeri_gambar[]" accept="image/*"
                  multiple>
                <label class="custom-file-label" for="galeri_gambar">Pilih Gambar</label>
              </div>
            </div>
            @if ($profilesekolah->galeri_gambar)
              <div class="row">
                @foreach (json_decode($profilesekolah->galeri_gambar) as $key => $galeri_gambar)
                  <div class="col-4 col-md-3 mb-3">
                    <a href="#" data-toggle="modal" data-target="#modal-gambar-{{ $key }}">
                      <img src="{{ asset('storage/uploads/' . $galeri_gambar) }}" alt="Galeri Gambar {{ $key }}"
                        class="rounded w-100">
                    </a>
                  </div>
                  <div class="modal fade" id="modal-gambar-{{ $key }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-body">
                          <img src="{{ asset('storage/uploads/' . $galeri_gambar) }}"
                            alt="Galeri Gambar {{ $key }}" class="rounded w-100">
                        </div>
                        <div class="modal-footer text-right">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                          <a href="{{ url('admin/menu-galeri/' . $key . '/hapus') }}" class="btn btn-danger">Hapus</a>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            @endif
          </div>
          <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection
