<li class="nav-header">Dashboard</li>
<li class="nav-item">
  <a href="{{ url('orangtua') }}" class="nav-link {{ request()->is('orangtua') ? 'active' : '' }}">
    <i class="nav-icon fas fa-home"></i>
    <p>Dashboard</p>
  </a>
</li>
<li class="nav-header">Menu</li>
<li class="nav-item">
  <a href="{{ url('orangtua/jadwal') }}" class="nav-link {{ request()->is('orangtua/jadwal') ? 'active' : '' }}">
    <i class="nav-icon fas fa-clipboard-list"></i>
    <p>Lihat Jadwal</p>
  </a>
</li>
<li class="nav-item">
  <a href="{{ url('orangtua/nilai') }}" class="nav-link {{ request()->is('orangtua/nilai*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-clipboard-list"></i>
    <p>Lihat Nilai</p>
  </a>
</li>