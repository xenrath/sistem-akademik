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
                <form action="{{ url('admin/mapel/' . $mapels->id) }}" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="kelas">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukan nama" value="{{ old('nama', $mapels->nama) }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Guru *</label>
                            <select class="form-select form-control @error('guru_id') is-invalid @enderror" id="guru_id"
                                name="guru_id" aria-label="Default select example">
                                <option value="">- Pilih -</option>
                                @foreach ($gurus as $guru)
                                    <option value="{{ $guru->id }}"
                                        {{ old('guru_id', $mapels->guru_id) == $guru->id ? 'selected' : null }}>
                                        {{ $guru->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kelas</label>
                            <select class="form-control @error('kelas_id') is-invalid @enderror" id="kelas_id"
                                name="kelas_id" aria-label="Default select example">
                                <option value="">- Pilih Kelas -</option>
                                @foreach ($kelass as $k)
                                    <option value="{{ $k->id }}"
                                        {{ old('kelas_id', $mapels->kelas_id) == $k->id ? 'selected' : null }}>
                                        {{ $k->kelas }}</option>
                                @endforeach
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
