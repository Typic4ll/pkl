<!DOCTYPE html>
<html lang="en">

<head>
    @include('tools.head')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    @include('tools.header')

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    @include('tools.sidebar')

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Pegawai</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <table class="table table-bordered">
          <tr>
              <td>NO</td>
              <td>NIP</td>
              <td>Nama</td>
              <td>Jabatan</td>
              <td>Tanggal Lahir</td>
              <td>Tempat Lahir</td>
              <td>Alamat</td>
              <td>NO Telpon</td>
              <td>Aksi</td>

          </tr>
          <?php $no=1;?>
          <tr>
            @foreach($varPegawai as $item)
            <td>{{ $no++ }}</td>
            <td>{{ $item -> id }}</td>
            <td>{{ $item -> nama }}</td>
            <td>{{ $item -> jabatan -> nama_jabatan }}</td>
            <td>{{ $item -> tempat_lahir }}</td>
            <td>{{ $item -> tanggal_lahir }}</td>
            <td>{{ $item -> alamat }}</td>
            <td>{{ $item -> no_telpon }}</td>
              <td>
                <a href="{{ url('edit-pegawai/' .$item->id) }}" title="Edit">
                  <i class="bi bi-pencil m-2"></i>
                </a>
                <a href="{{ url('hapus-pegawai/' .$item->id) }}"  title="Hapus">
                  <i class="bi bi-trash m-2"></i>
                </a></td>
          </tr>
          @endforeach
      </table>
      </div>
    </section>
    <a href="{{ url('/tambah-pegawai') }}" class="btn btn-primary">Tambah Pegawai
    </a>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    @include('tools.footer')
  </footer><!-- End Footer -->

  <!-- Vendor JS Files -->
  @include('tools.script')
  @include('sweetalert::alert')
</body>

</html>