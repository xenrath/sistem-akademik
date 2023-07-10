@extends('layouts.app')

@section('title', 'Ubah Siswa')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ubah Siswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin/Siswa') }}">Siswa</a></li>
            <li class="breadcrumb-item active">Tambah</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
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
      <form action="{{ url('admin/siswa/' . $siswa->id) }}" method="POST" autocomplete="off">
        @csrf
        @method('put')
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Detail Siswa</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama Siswa</label>
              <input type="text" class="form-control" id="nama" name="nama"
                placeholder="masukan nama siswa" value="{{ old('nama', $siswa->nama) }}">
            </div>
            <div class="form-group">
              <label for="gender">Jenis Kelamin</label>
              <select class="custom-select form-control" name="gender" id="gender">
                <option value="">- Pilih -</option>
                <option value="L" {{ old('gender', $siswa->gender) == 'L' ? 'selected' : '' }}>L</option>
                <option value="P" {{ old('gender', $siswa->gender) == 'P' ? 'selected' : '' }}>P</option>
              </select>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="masukan alamat">{{ old('alamat', $siswa->alamat) }}</textarea>
            </div>
            <div class="form-group">
              <label class="form-label">Pilih Kelas</label>
              <select class="form-control select2bs4" id="kelas_id" name="kelas_id">
                <option value="">- Pilih -</option>
                @foreach ($kelass as $kelas)
                  <option value="{{ $kelas->id }}"
                    {{ old('kelas_id', $siswa->kelas_id) == $kelas->id ? 'selected' : null }}>
                    {{ $kelas->nama }} ({{ $kelas->guru->nama }})</option>
                @endforeach
              </select>
            </div>
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
