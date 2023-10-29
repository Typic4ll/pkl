<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="{{ url('/') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-mailbox"></i><span>Surat</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ url('data-surat-masuk') }}">
            <i class="bi bi-circle"></i><span>Surat Masuk</span>
          </a>
        </li>
        <li>
          <a href="{{ url('data-surat-keluar') }}">
            <i class="bi bi-circle"></i><span>Surat Keluar</span>
          </a>
        </li>
        <li>
          <a href="{{ url('data-perihal') }}">
            <i class="bi bi-circle"></i><span>Perihal</span>
          </a>
        </li>
        <li>
          <a href="{{ url('data-pegawai') }}">
            <i class="bi bi-circle"></i><span>Pegawai</span>
          </a>
        </li>
        <li>
          <a href="{{ url('data-jabatan') }}">
            <i class="bi bi-circle"></i><span>Jabatan</span>
          </a>
        </li>
      </ul>
    </li><!-- End Components Nav -->
  </ul>