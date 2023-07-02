@extends('layouts.app')

@section('title', 'Menu Tentang Kami')

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
            <li class="breadcrumb-item active">Menu Tentang Kami</li>
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
      <form action="{{ url('admin/menu-about/update') }}" method="POST" autocomplete="off">
        @csrf
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
          <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection
