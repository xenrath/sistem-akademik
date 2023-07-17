@extends('layouts.app')

@section('title', 'Data Absensi')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Absensi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Absensi</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5>
            <i class="icon fas fa-check"></i> Success!
          </h5>
          {{ session('success') }}
        </div>
      @endif
      @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5>
            <i class="icon fas fa-ban"></i> Error!
          </h5>
          {{ session('error') }}
        </div>
      @endif
      <div class="row">
        <div class="col-md-4">
          <div class="sticky-top mb-3">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Detail Absensi</h4>
              </div>
              <div class="card-body">
                <input type="hidden" class="form-control" id="kelas_id" name="kelas_id" value="{{ $kelas->id }}">
                <p>
                  <strong>Hari</strong>
                  <br>
                  {{ date('l', strtotime($absensi->tanggal)) }}
                </p>
                <p>
                  <strong>Tanggal</strong>
                  <br>
                  {{ date('d M Y', strtotime($absensi->tanggal)) }}
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Absensi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 20px">No</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th style="width: 20px">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($detail_absensis as $detail_absensi)
                    <tr>
                      <td class="text-center">{{ $loop->iteration }}</td>
                      <td>{{ $detail_absensi->siswa->nama }}</td>
                      <td>
                        @if ($detail_absensi->absensi)
                          Masuk
                        @else
                          Tidak Masuk
                        @endif
                      </td>
                      <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                          data-target="#modal-edit-{{ $detail_absensi->id }}">
                          <i class="fas fa-edit"></i>
                        </button>
                      </td>
                    </tr>
                    <div class="modal fade" id="modal-edit-{{ $detail_absensi->id }}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Ubah Absensi</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="{{ url('guru/absensi/' . $detail_absensi->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="modal-body">
                              <p>
                                <strong>Nama Siswa</strong>
                                <br>
                                {{ $detail_absensi->siswa->nama }}
                              </p>
                              <div class="form-group">
                                <label for="absensi">Keterangan</label>
                                <select class="custom-select form-control" name="absensi" id="absensi">
                                  <option value="1" {{ $detail_absensi->absensi == '1' ? 'selected' : '' }}>Masuk
                                  </option>
                                  <option value="0" {{ $detail_absensi->absensi == '0' ? 'selected' : '' }}>Tidak
                                    Masuk</option>
                                </select>
                              </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.card -->
@endsection
