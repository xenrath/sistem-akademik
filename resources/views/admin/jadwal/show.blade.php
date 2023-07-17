@extends('layouts.app')

@section('title', 'Lihat Jadwal')

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1>Lihat Jadwal</h1>
          <button type="button" style="display: none" class="btn btn-default btn-block mt-2" id="button-jadwal"
            data-toggle="modal" data-target="#modal-jadwal">Modal
            Jadwal</button>
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
                  <span>{{ $jadwal->jam_awal }} - {{ $jadwal->jam_akhir }}</span>
                  <div class="card-tools m-0">
                    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal"
                      data-target="#modal-edit-{{ $jadwal->id }}">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal"
                      data-target="#modal-hapus-{{ $jadwal->id }}">
                      <i class="fas fa-trash"></i>
                    </button>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="modal-edit-{{ $jadwal->id }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Perbarui Mapel</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ url('admin/jadwal/' . $jadwal->id) }}" method="POST">
                      @csrf
                      @method('put')
                      <div class="modal-body">
                        <input type="hidden" class="form-control" name="kelas_id" value="{{ $kelas->id }}" required>
                        <div class="form-group">
                          <label for="mapel_id">Mapel</label>
                          <select class="form-control select2bs4" name="mapel_id" id="mapel_id-{{ $jadwal->id }}"
                            required>
                            <option value="">- Pilih -</option>
                            @foreach ($mapels as $mapel)
                              <option value="{{ $mapel->id }}"
                                {{ old('mapel_id', $jadwal->mapel_id) == $mapel->id ? 'selected' : '' }}>
                                {{ $mapel->nama }}</option>
                            @endforeach
                          </select>
                        </div>
                        <input type="hidden" class="form-control" id="hari" name="hari" value="{{ $hari }}" required>
                        <div class="form-group">
                          <label for="jam_awal">Jam Awal</label>
                          <input type="time" class="form-control" id="jam_awal" name="jam_awal"
                            value="{{ $jadwal->jam_awal }}" required>
                        </div>
                        <div class="form-group">
                          <label for="jam_akhir">Jam Akhir</label>
                          <input type="time" class="form-control" id="jam_akhir" name="jam_akhir"
                            value="{{ $jadwal->jam_akhir }}" required>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <script>
                $(function() {
                  $('mapel_id-'.
                    "{{ $jadwal->id }}").select2({
                    theme: 'bootstrap4'
                  });
                });
              </script>
              <div class="modal fade" id="modal-hapus-{{ $jadwal->id }}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Perbarui Mapel</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{ url('admin/jadwal/' . $jadwal->id) }}" method="POST">
                      @csrf
                      @method('delete')
                      <div class="modal-body">
                        <p>
                          <strong>Hari</strong>
                          <br>
                          {{ ucfirst($jadwal->hari) }}
                        </p>
                        <p>
                          <strong>Mapel</strong>
                          <br>
                          {{ $jadwal->mapel->nama }}
                        </p>
                        <hr>
                        <p>Yakin hapus mapel dari jadwal?</p>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
            <button type="button" class="btn btn-outline-primary btn-block {{ count($jadwals) > 0 ? 'mt-4' : '' }}"
              onclick="modal_jadwal('{{ $hari }}')">
              <i class="fas fa-plus"></i>
            </button>
          </div>
        </div>
      @endforeach
    </div>
  </section>
  <div class="modal fade" id="modal-jadwal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Mapel</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ url('admin/jadwal') }}" method="POST">
          @csrf
          <div class="modal-body">
            <input type="hidden" class="form-control" name="kelas_id" value="{{ $kelas->id }}" required>
            <div class="form-group">
              <label for="mapel_id">Mapel</label>
              <select class="form-control select2bs4" name="mapel_id" id="mapel_id" required>
                <option value="">- Pilih -</option>
                @foreach ($mapels as $mapel)
                  <option value="{{ $mapel->id }}" {{ old('mapel_id') == $mapel->id ? 'selected' : '' }}>
                    {{ $mapel->nama }}</option>
                @endforeach
              </select>
            </div>
            <input type="hidden" class="form-control" id="hari" name="hari" required>
            <div class="form-group">
              <label for="jam_awal">Jam Awal</label>
              <input type="time" class="form-control" id="jam_awal" name="jam_awal" required>
            </div>
            <div class="form-group">
              <label for="jam_akhir">Jam Akhir</label>
              <input type="time" class="form-control" id="jam_akhir" name="jam_akhir" required>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    function modal_jadwal(params) {
      var button_jadwal = document.getElementById('button-jadwal');
      var hari = document.getElementById('hari');
      hari.value = params;
      button_jadwal.click();
    }
  </script>
@endsection
