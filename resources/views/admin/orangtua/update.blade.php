@extends('layouts.app')

@section('title', 'Ubah Orangtua')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ubah Orangtua</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a href="{{ url('admin/orangtua') }}">Orangtua</a>
            </li>
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
      <form action="{{ url('admin/orangtua/' . $orangtua->id) }}" method="POST" autocomplete="off">
        @csrf
        @method('put')
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Ubah Orangtua</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama Orangtua</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="masukan nama orangtua"
                value="{{ old('nama', $orangtua->nama) }}">
            </div>
            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="text" class="form-control" id="nik" name="nik" placeholder="masukan nik"
                value="{{ old('nik', $orangtua->orangtua->nik) }}">
            </div>
            <div class="form-group">
              <label for="gender">Jenis Kelamin</label>
              <select class="custom-select form-control" name="gender" id="gender">
                <option value="">- Pilih -</option>
                <option value="L" {{ old('gender', $orangtua->orangtua->gender) == 'L' ? 'selected' : '' }}>L
                </option>
                <option value="P" {{ old('gender', $orangtua->orangtua->gender) == 'P' ? 'selected' : '' }}>P
                </option>
              </select>
            </div>
            <div class="form-group">
              <label for="telp">No. Telepon</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">+62</span>
                </div>
                <input type="text" id="telp" name="telp" class="form-control"
                  placeholder="masukan nomor telepon" value="{{ old('telp', $orangtua->orangtua->telp) }}">
              </div>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="masukan alamat">{{ old('alamat', $orangtua->orangtua->alamat) }}</textarea>
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
