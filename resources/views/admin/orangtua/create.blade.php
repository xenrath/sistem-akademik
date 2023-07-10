@extends('layouts.app')

@section('title', 'Tambah Siswa')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Siswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin/siswa') }}">Siswa</a></li>
            <li class="breadcrumb-item active">Tambah</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
      <form action="{{ url('admin/siswa') }}" method="POST" autocomplete="off">
        @csrf
        @if (session('error_siswa'))
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5>
              <i class="icon fas fa-ban"></i> Error!
            </h5>
            @foreach (session('error_siswa') as $error)
              - {{ $error }} <br>
            @endforeach
          </div>
        @endif
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Detail Siswa</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label for="siswa_nama">Nama Siswa</label>
              <input type="text" class="form-control" id="siswa_nama" name="siswa_nama"
                placeholder="masukan nama siswa" value="{{ old('siswa_nama') }}">
            </div>
            <div class="form-group">
              <label for="siswa_gender">Jenis Kelamin</label>
              <select class="custom-select form-control" name="siswa_gender" id="siswa_gender">
                <option value="">- Pilih -</option>
                <option value="L" {{ old('siswa_gender') == 'L' ? 'selected' : '' }}>L</option>
                <option value="P" {{ old('siswa_gender') == 'P' ? 'selected' : '' }}>P</option>
              </select>
            </div>
            <div class="form-group">
              <label for="siswa_alamat">Alamat</label>
              <textarea type="text" class="form-control" id="siswa_alamat" name="siswa_alamat" placeholder="masukan alamat">{{ old('siswa_alamat') }}</textarea>
            </div>
            <div class="form-group">
              <label class="form-label">Pilih Kelas</label>
              <select class="form-control select2bs4" id="siswa_kelas_id" name="siswa_kelas_id">
                <option value="">- Pilih -</option>
                @foreach ($kelass as $kelas)
                  <option value="{{ $kelas->id }}" {{ old('siswa_kelas_id') == $kelas->id ? 'selected' : null }}>
                    {{ $kelas->nama }} ({{ $kelas->guru->nama }})</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        @if (session('error_orangtua'))
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5>
              <i class="icon fas fa-ban"></i> Error!
            </h5>
            @foreach (session('error_orangtua') as $error)
              - {{ $error }} <br>
            @endforeach
          </div>
        @endif
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Detail Orangtua</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label for="orangtua_nama">Nama Orangtua</label>
              <input type="text" class="form-control" id="orangtua_nama" name="orangtua_nama"
                placeholder="masukan nama orangtua" value="{{ old('orangtua_nama') }}">
            </div>
            <div class="form-group">
              <label for="orangtua_nik">NIK</label>
              <input type="text" class="form-control" id="orangtua_nik" name="orangtua_nik" placeholder="masukan nik"
                value="{{ old('orangtua_nik') }}">
            </div>
            <div class="form-group">
              <label for="orangtua_gender">Jenis Kelamin</label>
              <select class="custom-select form-control" name="orangtua_gender" id="orangtua_gender">
                <option value="">- Pilih -</option>
                <option value="L" {{ old('orangtua_gender') == 'L' ? 'selected' : '' }}>L</option>
                <option value="P" {{ old('orangtua_gender') == 'P' ? 'selected' : '' }}>P</option>
              </select>
            </div>
            <div class="form-group">
              <label for="orangtua_telp">No. Telepon</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">+62</span>
                </div>
                <input type="text" id="orangtua_telp" name="orangtua_telp" class="form-control"
                  placeholder="masukan nomor telepon" value="{{ old('orangtua_telp') }}">
              </div>
            </div>
            <div class="form-group">
              <label for="orangtua_alamat">Alamat</label>
              <textarea type="text" class="form-control" id="orangtua_alamat" name="orangtua_alamat"
                placeholder="masukan alamat">{{ old('orangtua_alamat') }}</textarea>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-footer text-right">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </section>
@endsection
