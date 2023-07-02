@extends('layouts.app')

@section('title', 'Menu PPDB')

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
            <li class="breadcrumb-item active">Menu PPDB</li>
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
      <form action="{{ url('admin/menu-ppdb/update') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Menu PPDB</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label for="ppdb_flayer">Flayer
                @if ($profilesekolah->ppdb_flayer)
                  <small>(kosongkan saja jika tidak ingin diubah)</small>
                @endif
              </label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="ppdb_flayer" name="ppdb_flayer" accept="image/*">
                <label class="custom-file-label" for="ppdb_flayer">Pilih Gambar</label>
              </div>
            </div>
            @if ($profilesekolah->ppdb_flayer)
              <div class="row">
                <div class="col-md-3">
                  <a href="#" data-toggle="modal" data-target="#modal-gambar">
                    <img src="{{ asset('storage/uploads/' . $profilesekolah->ppdb_flayer) }}" alt="PPDB Flayer"
                      class="rounded w-100">
                  </a>
                </div>
              </div>
              <div class="modal fade" id="modal-gambar">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                      <img src="{{ asset('storage/uploads/' . $profilesekolah->ppdb_flayer) }}" alt="PPDB Flayer"
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
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection
