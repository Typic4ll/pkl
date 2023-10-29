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
              <td>Surat PDF</td>
          </tr>
          <?php $no=1;?>
          <tr>
            @foreach($single as $item)
            <td>{{ $no++ }}</td>
            <td>{{ $item -> no_surat }}</td>
            <td>{{ $item -> asal_surat }}</td>
            <td>{{ $item -> tanggal_surat }}</td>
            <td>{{ $item -> tanggal_terima }}</td>
            <td>{{ $item -> perihal -> nama_perihal}}</td>
            <td>{{ $item -> keterangan }}</td>
            <td>
            <a  href="file/{{ $item -> dokumen }}" target="blank">Lihat Surat</a>
          </tr>
          @endforeach
      </table>
      </div>
    </section>
    <div class="pagination justify-content-end">
      {{ $single->links() }}
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