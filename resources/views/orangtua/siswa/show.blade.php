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
            <div class="col-lg-8">
              <table class="table">
                <tr>
                  <th>Nama Siswa</th>
                  <td>:</td>
                  <td>{{ $siswa->nama }}</td>
                </tr>
                <tr>
                  <th>NIS</th>
                  <td>:</td>
                  <td>{{ $siswa->nis }}</td>
                </tr>
                <tr>
                  <th>Gender</th>
                  <td>:</td>
                  @if ($siswa->gender == 'L')
                    <td>Laki-laki</td>
                  @else
                    <td>Perempuan</td>
                  @endif
                </tr>
                <tr>
                  <th>alamat</th>
                  <td>:</td>
                  <td>{{ $siswa->alamat }}</td>
                </tr>
                {{-- <tr>
                                    <th>No. Telepon</th>
                                    <td>:</td>
                                    <td>
                                        @if ($guru->telp)
                                            +62{{ $guru->telp }}
                                        @endif
                                    </td>
                                </tr> --}}
                <tr>
                  <th>Kelas</th>
                  <td>:</td>
                  <td>{{ $siswa->kelas->kelas }}</td>
                </tr>
                <tr>
                  <th>Wali kelas</th>
                  <td>:</td>
                  <td>{{ $siswa->guru->name }}</td>
                </tr>
              </table>
            </div>
            {{-- <div class="col-lg-4">
                            @if ($guru->foto)
                                <img src="{{ asset('storage/uploads/' . $guru->foto) }}" alt="{{ $guru->nama }}"
                                    class="w-100 rounded">
                            @else
                                <img src="{{ asset('storage/uploads/image-placeholder.jpg') }}" alt="{{ $guru->nama }}"
                                    class="w-100 rounded">
                            @endif
                        </div> --}}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
