@extends('layouts.app')

@section('title', 'Perbarui Mapel')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mapel</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin/kelas') }}">Mapel</a></li>
            <li class="breadcrumb-item active">Perbarui</li>
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
          <h3 class="card-title">Perbarui Mapel</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ url('admin/mapel/' . $mapel->id) }}" method="POST" enctype="multipart/form-data"
          autocomplete="off">
          @csrf
          @method('put')
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Nama Mapel</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="masukan nama mapel"
                value="{{ old('nama', $mapel->nama) }}">
            </div>
            <div class="form-group">
              <label for="kelas">Kelas</label>
              <select class="custom-select form-control" name="kelas" id="kelas">
                <option value="">- Pilih -</option>
                <option value="1" {{ old('kelas', $mapel->kelas) == '1' ? 'selected' : '' }}>1</option>
                <option value="2" {{ old('kelas', $mapel->kelas) == '2' ? 'selected' : '' }}>2</option>
                <option value="3" {{ old('kelas', $mapel->kelas) == '3' ? 'selected' : '' }}>3</option>
                <option value="4" {{ old('kelas', $mapel->kelas) == '4' ? 'selected' : '' }}>4</option>
                <option value="5" {{ old('kelas', $mapel->kelas) == '5' ? 'selected' : '' }}>5</option>
                <option value="6" {{ old('kelas', $mapel->kelas) == '6' ? 'selected' : '' }}>6</option>
              </select>
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
