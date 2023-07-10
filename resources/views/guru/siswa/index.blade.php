@extends('layouts.app')

@section('title', 'Data Siswa')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Siswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Siswa</li>
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
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Siswa</h3>
          <div class="float-right">
            <a href="{{ url('guru/siswa/create') }}" class="btn btn-primary btn-sm">
              <i class="fas fa-plus"></i> Tambah
            </a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center" style="width: 20px">No</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th class="text-center" style="width: 40px">Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($siswas as $siswa)
                <tr>
                  <td class="text-center">{{ $loop->iteration }}</td>
                  <td>{{ $siswa->nis }}</td>
                  <td>{{ $siswa->nama }}</td>
                  <td>
                    @if ($siswa->gender == 'L')
                      Laki-laki
                    @else
                      Perempuan
                    @endif
                  </td>
                  <td class="text-center">
                    <a href="{{ url('guru/siswa/' . $siswa->id) }}" class="btn btn-info">
                      <i class="fas fa-eye"></i>
                    </a>
                  </td>
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
