<li class="nav-header">Dashboard</li>
<li class="nav-item">
  <a href="{{ url('admin') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
    <i class="nav-icon fas fa-home"></i>
    <p>Dashboard</p>
  </a>
</li>
<li class="nav-header">Menu</li>
<li
  class="nav-item {{ request()->is('admin/guru*') || request()->is('admin/kelas*') || request()->is('admin/siswa*') || request()->is('admin/orangtua*') || request()->is('admin/mapel*') || request()->is('admin/jadwal*') ? 'menu-open' : '' }}">
  <a href="#"
    class="nav-link {{ request()->is('admin/guru*') || request()->is('admin/kelas*') || request()->is('admin/siswa*') || request()->is('admin/orangtua*') || request()->is('admin/mapel*') || request()->is('admin/jadwal*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-grip-horizontal"></i>
    <p>
      Kelola Data
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ url('admin/guru') }}" class="nav-link {{ request()->is('admin/guru*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Data Guru</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('admin/kelas') }}" class="nav-link {{ request()->is('admin/kelas*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Data Kelas</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('admin/siswa') }}" class="nav-link {{ request()->is('admin/siswa*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Data Siswa</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('admin/orangtua') }}" class="nav-link {{ request()->is('admin/orangtua*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Data Orangtua</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('admin/mapel') }}" class="nav-link {{ request()->is('admin/mapel*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Data Mapel</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('admin/jadwal') }}" class="nav-link {{ request()->is('admin/jadwal*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Data Jadwal</p>
      </a>
    </li>
  </ul>
</li>
<li
  class="nav-item {{ request()->is('admin/menu-home*') || request()->is('admin/menu-about*') || request()->is('admin/menu-galeri*') || request()->is('admin/menu-ppdb*') || request()->is('admin/menu-kontak*') ? 'menu-open' : '' }}">
  <a href="#"
    class="nav-link {{ request()->is('admin/menu-home*') || request()->is('admin/menu-about*') || request()->is('admin/menu-galeri*') || request()->is('admin/menu-ppdb*') || request()->is('admin/menu-kontak*') ? 'active' : '' }}">
    <i class="nav-icon fas fa-edit"></i>
    <p>
      Profile Sekolah
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ url('admin/menu-home') }}" class="nav-link {{ request()->is('admin/menu-home*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Menu Home</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('admin/menu-about') }}"
        class="nav-link {{ request()->is('admin/menu-about*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Menu Tentang Kami</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('admin/menu-galeri') }}"
        class="nav-link {{ request()->is('admin/menu-galeri*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Menu Galeri</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('admin/menu-ppdb') }}" class="nav-link {{ request()->is('admin/menu-ppdb*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Menu PPDB</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ url('admin/menu-kontak') }}"
        class="nav-link {{ request()->is('admin/menu-kontak*') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Menu Kontak</p>
      </a>
    </li>
  </ul>
</li>
