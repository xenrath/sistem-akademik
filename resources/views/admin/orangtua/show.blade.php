@extends('layouts.app')

@section('title', 'Lihat Orangtua')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Orangtua</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('admin/siswa') }}">Orangtua</a></li>
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
          <h3 class="card-title">Lihat Orangtua</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-lg-8">
              <strong>Nama Orangtua</strong>
            </div>
            <div class="col-lg-4">
              {{ $orangtua->nama }}
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-8">
              <strong>NIK</strong>
            </div>
            <div class="col-lg-4">
              {{ $orangtua->orangtua->nik }}
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-8">
              <strong>Jenis Kelamin</strong>
            </div>
            <div class="col-lg-4">
              @if ($orangtua->orangtua->gender == 'L')
                Laki-laki
              @else
                Perempuan
              @endif
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-8">
              <strong>No. Telepon</strong>
            </div>
            <div class="col-lg-4">
              0{{ $orangtua->orangtua->telp }}
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-8">
              <strong>Alamat</strong>
            </div>
            <div class="col-lg-4">
              {{ $orangtua->orangtua->alamat }}
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-lg-8">
              <strong>Nama Anak</strong>
            </div>
            <div class="col-lg-4">
              @foreach ($orangtua->siswas as $siswa)
                - {{ $siswa->nama }}
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
