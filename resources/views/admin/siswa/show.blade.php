@extends('layouts.app')

@section('title', 'Lihat Siswa')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Siswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin/siswa') }}">Siswa</a></li>
            <li class="breadcrumb-item active">Lihat</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lihat Siswa</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-lg-9">
              <div class="row mb-3">
                <div class="col-lg-8">
                  <strong>Nama Siswa</strong>
                </div>
                <div class="col-lg-4">
                  {{ $siswa->nama }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-8">
                  <strong>NIS</strong>
                </div>
                <div class="col-lg-4">
                  {{ $siswa->nis }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-8">
                  <strong>Jenis Kelamin</strong>
                </div>
                <div class="col-lg-4">
                  @if ($siswa->gender == 'L')
                    Laki-laki
                  @else
                    Perempuan
                  @endif
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-8">
                  <strong>Alamat</strong>
                </div>
                <div class="col-lg-4">
                  {{ $siswa->alamat }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-8">
                  <strong>Kelas</strong>
                </div>
                <div class="col-lg-4">
                  {{ $siswa->kelas->nama }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-8">
                  <strong>Nama Orangtua</strong>
                </div>
                <div class="col-lg-4">
                  {{ $siswa->orangtua->nama }}
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <img src="{{ asset('storage/uploads/menu-home/logo.png') }}" alt="{{ $siswa->nama }}"
                class="w-100 rounded">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
