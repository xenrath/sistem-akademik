@extends('layouts.app')

@section('title', 'Perbarui Guru')

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
                    <h3 class="card-title">Perbarui Guru</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ url('admin/siswa/' . $siswa->id) }}" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukan nama" value="{{ old('nama', $siswa->nama) }}">
                        </div>
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="number" class="form-control" id="nis" name="nis"
                                placeholder="Masukan nis" value="{{ old('nis', $siswa->nis) }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                placeholder="Masukan alamat" value="{{ old('alamat', $siswa->alamat) }}" />
                        </div>
                        {{-- <div class="form-group">
                            <label for="gender">Pilih Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="{{ old('gender', $siswa->gender) }} == 'L' ? 'selected' : null }}" name="gender"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="{{ old('gender', $siswa->gender) }} == 'P' ? 'selected' : null }}" name="gender"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Perempuan
                                </label>
                            </div>
                        </div> --}}
                        <div class="mb-3">
                            <label class="form-label" for="gender">Pilih Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="">- Pilih -</option>
                                <option value="gender"
                                    {{ old('gender', $siswa->gender) == 'L' ? 'selected' : null }}>Laki-laki</option>
                                <option value="pakan"
                                    {{ old('gender', $siswa->gender) == 'P' ? 'selected' : null }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Pilih Kelas</label>
                            <select class="form-control @error('kelas_id') is-invalid @enderror" id="kelas_id"
                                name="kelas_id" aria-label="Default select example">
                                <option value="">- Pilih -</option>
                                @foreach ($kelass as $k)
                                    <option value="{{ $k->id }}"
                                        {{ old('kelas_id', $siswa->kelas_id) == $k->id ? 'selected' : null }}>
                                        {{ $k->kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Wali Murid</label>
                            <select class="form-control @error('guru_id') is-invalid @enderror" id="guru_id"
                                name="guru_id" aria-label="Default select example">
                                <option value="">- Pilih -</option>
                                @foreach ($guru as $k)
                                    <option value="{{ $k->id }}"
                                        {{ old('guru_id', $siswa->guru_id) == $k->id ? 'selected' : null }}>
                                        {{ $k->name }}</option>
                                @endforeach
                            </select>
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
