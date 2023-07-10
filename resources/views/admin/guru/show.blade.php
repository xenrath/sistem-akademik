@extends('layouts.app')

@section('title', 'Lihat Guru')

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
            <li class="breadcrumb-item">
              <a href="{{ url('admin/guru') }}">Guru</a>
            </li>
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
          <h3 class="card-title">Lihat Guru</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-lg-8">
              <div class="row mb-3">
                <div class="col-lg-4">
                  <strong>Nama Guru</strong>
                </div>
                <div class="col-lg-8">
                  {{ $guru->nama }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-4">
                  <strong>NUPTK</strong>
                </div>
                <div class="col-lg-8">
                  {{ $guru->guru->nuptk }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-4">
                  <strong>Jenis Kelamin</strong>
                </div>
                <div class="col-lg-8">
                  @if ($guru->guru->gender == 'L')
                    Laki-laki
                  @else
                    Perempuan
                  @endif
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-4">
                  <strong>No. Telepon</strong>
                </div>
                <div class="col-lg-8">
                  {{ $guru->guru->telp }}
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-lg-4">
                  <strong>Alamat</strong>
                </div>
                <div class="col-lg-8">
                  {{ $guru->guru->alamat }}
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <img src="{{ asset('storage/uploads/' . $guru->guru->foto) }}" alt="{{ $guru->nama }}"
                class="w-100 rounded">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
