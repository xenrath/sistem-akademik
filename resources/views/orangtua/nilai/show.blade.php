@extends('layouts.app')

@section('title', 'Data Nilai')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Nilai</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Nilai</li>
          </ol>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
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
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Nilai</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center" style="width: 20px">No</th>
                  <th>Nama</th>
                  <th>Absensi</th>
                  <th>Tugas</th>
                  <th>UTS</th>
                  <th>UAS</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($siswas as $siswa)
                  @php
                    $nilai = \App\Models\Nilai::where([['mapel_id', $mapel->id], ['kelas_id', $siswa->kelas_id], ['siswa_id', $siswa->id]])->first();
                    if ($nilai) {
                        $absensi = $nilai->absensi != null ? $nilai->absensi : '-';
                        $tugas = $nilai->tugas != null ? $nilai->tugas : '-';
                        $uts = $nilai->uts != null ? $nilai->uts : '-';
                        $uas = $nilai->uas != null ? $nilai->uas : '-';
                    } else {
                        $absensi = '-';
                        $tugas = '-';
                        $uts = '-';
                        $uas = '-';
                    }
                  @endphp
                  <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>
                      <span class="mr-2">{{ $absensi }}</span>
                      <button type="button" class="btn btn-default btn-sm" data-toggle="modal"
                        data-target="#modal-absensi-{{ $siswa->id }}">
                        <i class="fas fa-edit"></i>
                      </button>
                    </td>
                    <td>
                      <span class="mr-2">{{ $tugas }}</span>
                      <button type="button" class="btn btn-default btn-sm" data-toggle="modal"
                        data-target="#modal-tugas-{{ $siswa->id }}">
                        <i class="fas fa-edit"></i>
                      </button>
                    </td>
                    <td>
                      <span class="mr-2">{{ $uts }}</span>
                      <button type="button" class="btn btn-default btn-sm" data-toggle="modal"
                        data-target="#modal-uts-{{ $siswa->id }}">
                        <i class="fas fa-edit"></i>
                      </button>
                    </td>
                    <td>
                      <span class="mr-2">{{ $uas }}</span>
                      <button type="button" class="btn btn-default btn-sm" data-toggle="modal"
                        data-target="#modal-uas-{{ $siswa->id }}">
                        <i class="fas fa-edit"></i>
                      </button>
                    </td>
                  </tr>
                  <div class="modal fade" id="modal-absensi-{{ $siswa->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Nilai Absensi</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{ url('guru/nilai/absensi/' . $siswa->id) }}" method="post" autocomplete="off">
                          @csrf
                          <div class="modal-body">
                            <p>
                              <strong>Nama Siswa</strong>
                              <br>
                              {{ $siswa->nama }}
                            </p>
                            <p>
                              <strong>Mata Pelajaran</strong>
                              <br>
                              {{ $mapel->nama }}
                              <input type="hidden" class="form-control" id="mapel_id" name="mapel_id"
                                value="{{ $mapel->id }}">
                            </p>
                            <div class="form-group">
                              <label for="absensi">Nilai</label>
                              <input type="text" class="form-control" id="absensi" name="absensi" required>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="modal-tugas-{{ $siswa->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Nilai Tugas</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{ url('guru/nilai/tugas/' . $siswa->id) }}" method="post" autocomplete="off">
                          @csrf
                          <div class="modal-body">
                            <p>
                              <strong>Nama Siswa</strong>
                              <br>
                              {{ $siswa->nama }}
                            </p>
                            <p>
                              <strong>Mata Pelajaran</strong>
                              <br>
                              {{ $mapel->nama }}
                              <input type="hidden" class="form-control" id="mapel_id" name="mapel_id"
                                value="{{ $mapel->id }}">
                            </p>
                            <div class="form-group">
                              <label for="tugas">Nilai</label>
                              <input type="text" class="form-control" id="tugas" name="tugas" required>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="modal-uts-{{ $siswa->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Nilai UTS</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{ url('guru/nilai/uts/' . $siswa->id) }}" method="post" autocomplete="off">
                          @csrf
                          <div class="modal-body">
                            <p>
                              <strong>Nama Siswa</strong>
                              <br>
                              {{ $siswa->nama }}
                            </p>
                            <p>
                              <strong>Mata Pelajaran</strong>
                              <br>
                              {{ $mapel->nama }}
                              <input type="hidden" class="form-control" id="mapel_id" name="mapel_id"
                                value="{{ $mapel->id }}">
                            </p>
                            <div class="form-group">
                              <label for="uts">Nilai</label>
                              <input type="text" class="form-control" id="uts" name="uts" required>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="modal-uas-{{ $siswa->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Nilai Absensi</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{ url('guru/nilai/uas/' . $siswa->id) }}" method="post" autocomplete="off">
                          @csrf
                          <div class="modal-body">
                            <p>
                              <strong>Nama Siswa</strong>
                              <br>
                              {{ $siswa->nama }}
                            </p>
                            <p>
                              <strong>Mata Pelajaran</strong>
                              <br>
                              {{ $mapel->nama }}
                              <input type="hidden" class="form-control" id="mapel_id" name="mapel_id"
                                value="{{ $mapel->id }}">
                            </p>
                            <div class="form-group">
                              <label for="uas">Nilai</label>
                              <input type="text" class="form-control" id="uas" name="uas" required>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </section>
  <!-- /.card -->
@endsection
