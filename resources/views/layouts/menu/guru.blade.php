<li class="nav-header">Dashboard</li>
<li class="nav-header">Menu</li>
<li
    class="nav-item {{ request()->is('guru/guru*') || request()->is('guru/kelas*') || request()->is('guru/siswa*') ? 'menu-open' : '' }}">
    <a href="#"
        class="nav-link {{ request()->is('guru/guru*') || request()->is('guru/kelas*') || request()->is('guru/siswa*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-grip-horizontal"></i>
        <p>
            Kelola Data
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ url('guru/mapel') }}" class="nav-link {{ request()->is('guru/mapel*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Mapel</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('guru/kelas') }}" class="nav-link {{ request()->is('guru/kelas*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Kelas</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('guru/siswa') }}" class="nav-link {{ request()->is('guru/siswa*') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Siswa</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-header">Profile</li>
<li class="nav-item">
    <a href="" class="nav-link">
        <i class="nav-icon fas fa-user-edit"></i>
        <p>Update Profile</p>
    </a>
</li>
<li class="nav-item">
    <a href="#" data-toggle="modal" data-target="#modalLogout"
        class="nav-link {{ request()->is('profile') ? 'active' : '' }}">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>Logout</p>
    </a>
</li>
