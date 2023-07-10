@extends('layouts.app')

@section('title', 'Data Nilai')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Nilai</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Nilai</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Nilai</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center" style="width: 20px">No</th>
                <th>Nama Mapel</th>
                <th>Nilai Absensi</th>
                <th>Nilai Tugas</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($mapels as $mapel)
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
                  <td>{{ $mapel->nama }}</td>
                  <td>{{ $absensi }}</td>
                  <td>{{ $tugas }}</td>
                  <td>{{ $uts }}</td>
                  <td>{{ $uas }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </section>
  <!-- /.card -->
@endsection
