@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-body p-5 text-center">
                <h4>Selamat Datang <strong>{{ auth()->user()->nama }}</strong></h4>
                <p>Anda masuk sebagai {{ ucfirst(auth()->user()->level) }}</p>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection
