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
                        <li class="breadcrumb-item"><a href="{{ url('admin/guru') }}">Guru</a></li>
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
                            <table class="table">
                                <tr>
                                    <th>Nama Guru</th>
                                    <td>:</td>
                                    <td>{{ $guru->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td>:</td>
                                    <td>{{ $guru->username }}</td>
                                </tr>
                                <tr>
                                    <th>NUPTK</th>
                                    <td>:</td>
                                    <td>{{ $guru->nuptk }}</td>
                                </tr>
                                <tr>
                                    <th>No. Telepon</th>
                                    <td>:</td>
                                    <td>
                                        @if ($guru->telp)
                                            +62{{ $guru->telp }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>:</td>
                                    <td>{{ $guru->alamat }}</td>
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
