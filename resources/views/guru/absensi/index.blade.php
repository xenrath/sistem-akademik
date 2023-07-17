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
      <form action="{{ url('guru/absensi') }}" method="post">
        @csrf
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
                    {{ date('l') }}
                  </p>
                  <p>
                    <strong>Tanggal</strong>
                    <br>
                    {{ date('d M Y') }}
                  </p>
                  <hr>
                  <a href="{{ url('guru/absensi-list') }}" class="btn btn-info btn-block">
                    <i class="fas fa-list mr-2"></i>Lihat Daftar Absensi
                  </a>
                  <hr>
                  <p>
                    Catatan :
                    <br>
                    <i class="far fa-check-square mr-2"></i>untuk siswa masuk
                    <br>
                    <i class="far fa-square mr-2"></i>untuk siswa tidak masuk
                  </p>
                  @if (!$absensi)
                    <hr>
                    <button type="button" class="btn btn-secondary btn-block" onclick="check_all()">
                      <i class="fas fa-check-square mr-2"></i>Pilih Semua
                    </button>
                    <button type="submit" class="btn btn-primary btn-block">
                      <i class="fas fa-save mr-2"></i>Submit
                    </button>
                  @endif
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
                @if (!$absensi)
                  <table id="example1 " class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th class="text-center" style="width: 20px">#</th>
                        <th class="text-center" style="width: 20px">No</th>
                        <th>Nama</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($siswas as $siswa)
                        <tr>
                          <td class="text-center">
                            <div class="form-group m-0">
                              <div class="icheck-primary m-0">
                                <input type="checkbox" id="checkbox-{{ $siswa->id }}" name="checkbox[]"
                                  value="{{ $siswa->id }}">
                                <label for="checkbox-{{ $siswa->id }}"></label>
                              </div>
                            </div>
                          </td>
                          <td class="text-center">{{ $loop->iteration }}</td>
                          <td>{{ $siswa->nama }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                @else
                  <p class="text-center">Anda sudah melakukan Absensi hari ini</p>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
  <!-- /.card -->
  <script>
    function check_all() {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = true;
      }
    }
  </script>
@endsection
