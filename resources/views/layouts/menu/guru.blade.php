<li class="nav-header">Dashboard</li>
<li class="nav-item">
  <a href="{{ url('guru') }}" class="nav-link {{ request()->is('guru') ? 'active' : '' }}">
    <i class="nav-icon fas fa-home"></i>
    <p>Dashboard</p>
  </a>
</li>
<li class="nav-header">Menu</li>
<li class="nav-item">
  <a href="{{ url('guru/mapel') }}" class="nav-link {{ request()->is('guru/mapel') ? 'active' : '' }}">
    <i class="nav-icon fas fa-book"></i>
    <p>Lihat Mapel</p>
  </a>
</li>
<li class="nav-item">
  <a href="{{ url('guru/siswa') }}" class="nav-link {{ request()->is('guru/siswa') ? 'active' : '' }}">
    <i class="nav-icon fas fa-user"></i>
    <p>Lihat Siswa</p>
  </a>
</li>
{{-- <li class="nav-item">
  <a href="{{ url('guru/jadwal') }}" class="nav-link {{ request()->is('guru/jadwal') ? 'active' : '' }}">
    <i class="nav-icon fas fa-clipboard-list"></i>
    <p>Lihat Jadwal</p>
  </a>
</li> --}}
<li class="nav-item">
  <a href="{{ url('guru/nilai') }}" class="nav-link {{ request()->is('guru/nilai*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-clipboard-list"></i>
    <p>Data Nilai</p>
  </a>
</li>