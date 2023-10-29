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
      <h1>Surat Masuk</h1>
    </div><!-- End Page Title -->
    
    <div class="d-inline-flex mb-3">
      <a  href="{{ url('/cetak-surat-masuk') }}" class="btn btn-primary">Cetak Rekap Surat
      </a>
    </div>

    <div class="d-inline-flex" style="padding-left: 480px">
      <form class="" method="get">
        <input type="text" name="search" placeholder="Search" title="Enter search keyword" autocomplete="off">
        <button class="btn btn-primary" type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>
    <section class="section dashboard">
      <div class="row">
        <table class="table table-bordered">
          <tr>
              <td>No</td>
              <td>No Surat</td>
              <td>Asal Surat</td>
              <td>Tanggal Surat</td>
              <td>Tanggal Terima</td>
              <td>Perihal</td>
              <td>Keterangan</td>
              <td>Penerima Surat</td>
              <td>Surat PDF</td>
              <td>Aksi</td>
          </tr>
          <?php $no=1;?>
          <tr>
            @foreach($varSuratMasuk as $item)
            <td>{{ $no++ }}</td>
            <td>{{ $item -> no_surat }}</td>
            <td>{{ $item -> asal_surat }}</td>
            <td>{{ $item -> tanggal_surat }}</td>
            <td>{{ $item -> tanggal_terima }}</td>
            <td>{{ $item -> perihal -> nama_perihal}}</td>
            <td>{{ $item -> keterangan }}</td>
            <td>{{ $item -> pegawai -> nama}}</td>
            <td>
            <a  href="file/{{ $item -> dokumen }}" target="blank">Lihat Surat</a>
              <td>
                <a href="{{ url('edit-surat-masuk/' .$item->id) }}" title="Edit">
                  <i class="bi bi-pencil m-2"></i>
                </a>
                <a href="{{ url('hapus-surat-masuk/' .$item->id) }}"  title="Hapus">
                  <i class="bi bi-trash m-2"></i>
                </a></td>
          </tr>
          @endforeach
      </table>
      </div>
    </section>
    <a href="{{ url('/tambah-surat-masuk') }}" class="btn btn-primary">Tambah Surat Masuk
    </a>
    <div class="pagination justify-content-end">
      {{ $varSuratMasuk->links() }}
    </div>
    
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