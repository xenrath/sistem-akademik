@extends('layouts.app')

@section('title', 'Lihat Jadwal')

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1>Lihat Jadwal</h1>
        </div>
        <div class="col-sm-6 d-none d-sm-block">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Lihat Jadwal</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content pb-3">
    <div class="container-fluid h-100">
      @php
        $haris = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
      @endphp
      @foreach ($haris as $hari)
        <div class="card card-row card-primary">
          <div class="card-header">
            <h3 class="card-title">
              {{ ucfirst($hari) }}
            </h3>
          </div>
          <div class="card-body">
            @php
              $jadwals = \App\Models\Jadwal::where([['kelas_id', $kelas->id], ['hari', $hari]])->get();
            @endphp
            @foreach ($jadwals as $jadwal)
              <div class="card card-info card-outline mb-2">
                <div class="card-header">
                  <h5 class="card-title">{{ $jadwal->mapel->nama }}</h5>
                  <br>
                  <div class="card-tools">
                    <span class="mr-2">{{ $jadwal->jam_awal }} - {{ $jadwal->jam_akhir }}</span>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endforeach
    </div>
  </section>
@endsection
