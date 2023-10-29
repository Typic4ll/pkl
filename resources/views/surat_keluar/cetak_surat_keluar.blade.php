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

{{--     <div class="pagetitle">
      <h1>Hello {{ auth()->user()->name }}</h1>
    </div><!-- End Page Title --> --}}

    <section class="section dashboard">
      <div class="row">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Cetak Pertanggal</h5>
            <form action="" method="get" class="row g-3">
                <div class="col-3">
                    <label class="form-label">Tanggal Awal</label>
                    <input type="date" name="tanggal_awal" id="tanggal_awal" placeholder="Masukkan Tanggal Awal" class="form-control"  autocomplete="off">
                </div>  
                <div class="col-3">
                    <label class="form-label">Tanggal Akhir</label>
                    <input type="date" name="tanggal_akhir" id="tanggal_akhir" placeholder="Masukkan Tanggal Akhir" class="form-control"  autocomplete="off">
                </div>  
                <div class="text">
                    <a  href="" onclick="this.href='cetak-surat-keluar/'+document.getElementById('tanggal_awal').value + '/'
                    +document.getElementById('tanggal_akhir').value" class="btn btn-primary" target="blank">Cetak
                    </a>
                </div>                                      
            </form>
            </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    @include('tools.footer')
  </footer><!-- End Footer -->

  <!-- Vendor JS Files -->
  @include('tools.script')

</body>

</html>