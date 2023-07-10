@extends('layouts.app')

@section('title', 'Ubah Guru')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Guru</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin/guru') }}">Guru</a></li>
            <li class="breadcrumb-item active">Tambah</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
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
          <h3 class="card-title">Ubah Guru</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ url('admin/guru/' . $guru->id) }}" method="POST" enctype="multipart/form-data"
          autocomplete="off">
          @csrf
          @method('put')
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama Guru</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan nama guru"
                value="{{ old('nama', $guru->nama) }}">
            </div>
            <div class="form-group">
              <label for="nuptk">NUPTK</label>
              <input type="text" class="form-control" id="nuptk" name="nuptk" placeholder="Masukan NUPTK"
                value="{{ old('nuptk', $guru->guru->nuptk) }}">
            </div>
            <div class="form-group">
              <label for="gender">Jenis Kelamin</label>
              <select class="custom-select form-control" name="gender" id="gender">
                <option value="">- Pilih -</option>
                <option value="L" {{ old('gender', $guru->guru->gender) == 'L' ? 'selected' : '' }}>L</option>
                <option value="P" {{ old('gender', $guru->guru->gender) == 'P' ? 'selected' : '' }}>P</option>
              </select>
            </div>
            <div class="form-group">
              <label for="telp">No. Telepon</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">+62</span>
                </div>
                <input type="text" id="telp" name="telp" class="form-control"
                  placeholder="Masukan nomor telepon" value="{{ old('telp', $guru->guru->telp) }}">
              </div>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan alamat">{{ old('alamat', $guru->guru->alamat) }}</textarea>
            </div>
            <div class="form-group">
              <label for="foto">Foto <small>(Kosongkan jika tidak ingin diganti)</small></label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="foto" name="foto" accept="image/*">
                <label class="custom-file-label" for="foto">Pilih Foto</label>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <img class="w-100 rounded" src="{{ asset('storage/uploads/' . $guru->guru->foto) }}"
                  alt="{{ $guru->nama }}">
              </div>
            </div>
          </div>
      </div>
      <div class="card-footer text-right">
        <button type="reset" class="btn btn-secondary">Reset</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
    </div>
  </section>
@endsection
