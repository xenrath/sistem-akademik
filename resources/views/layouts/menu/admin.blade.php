<li class="nav-header">Dashboard</li>
<li class="nav-header">Master</li>
<li class="nav-item">
    <a href="{{ url('admin/guru') }}" class="nav-link {{ request()->is('admin/guru*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Data Guru
            {{-- <span class="right badge badge-danger">New</span> --}}
        </p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ url('admin/kelas') }}" class="nav-link {{ request()->is('admin/kelas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-grip-horizontal"></i>
        <p>
            Data Kelas
            {{-- <span class="right badge badge-danger">New</span> --}}
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('admin/siswa') }}" class="nav-link {{ request()->is('admin/siswa*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>
            Data Siswa
        </p>
    </a>
</li>
<li class="nav-header">Profile</li>
<li class="nav-item">
    <a href="" class="nav-link">
        <i class="nav-icon fas fa-user-edit"></i>
        <p>Update Profile</p>
    </a>
<li class="nav-item">
    <a href="#" data-toggle="modal" data-target="#modalLogout"
        class="nav-link {{ request()->is('profile') ? 'active' : '' }}">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>Logout</p>
    </a>
</li>
