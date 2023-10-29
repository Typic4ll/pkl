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
        <div class="col-xxl-2 col-md-4">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Surat Masuk</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-envelope-open-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $jumlah_masuk }}</h6>
                </div>
              </div>
            </div>
            
          </div>
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Undangan Surat Masuk</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-envelope-open-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $jumlah_undangan }}</h6>
                </div>
              </div>
            </div>

        </div>

        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title">Pengajuan Surat Masuk</h5>
  
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-envelope-fill"></i>
              </div>
              <div class="ps-3">
                <h6>{{ $jumlah_pengajuan }}</h6>
              </div>
            </div>
          </div>
      </div>

        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title">Permohonan Surat Masuk</h5>
  
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-envelope-fill"></i>
              </div>
              <div class="ps-3">
                <h6>{{ $jumlah_permohonan }}</h6>
              </div>
            </div>
          </div>
      </div>

      <div class="card info-card sales-card">
        <div class="card-body">
          <h5 class="card-title">Edaran Surat Masuk</h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-envelope-fill"></i>
            </div>
            <div class="ps-3">
              <h6>{{ $jumlah_edaran }}</h6>
            </div>
          </div>
        </div>
    </div>

    <div class="card info-card sales-card">
      <div class="card-body">
        <h5 class="card-title">Keputusan Surat Masuk</h5>

        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-envelope-fill"></i>
          </div>
          <div class="ps-3">
            <h6>{{ $jumlah_keputusan }}</h6>
          </div>
        </div>
      </div>
  </div>

  <div class="card info-card sales-card">
    <div class="card-body">
      <h5 class="card-title">Tugas Surat Masuk</h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-envelope-fill"></i>
        </div>
        <div class="ps-3">
          <h6>{{ $jumlah_tugas }}</h6>
        </div>
      </div>
    </div>
</div>

<div class="card info-card sales-card">
  <div class="card-body">
    <h5 class="card-title">Perjalanan Surat Masuk</h5>

    <div class="d-flex align-items-center">
      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
        <i class="bi bi-envelope-fill"></i>
      </div>
      <div class="ps-3">
        <h6>{{ $jumlah_perjalanan }}</h6>
      </div>
    </div>
  </div>
</div>


          
        </div>
        <div class="col-xxl-2 col-md-4">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Surat Keluar</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-envelope-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $jumlah_keluar }}</h6>
                </div>
              </div>
            </div>
            
          </div>
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Undangan Surat Keluar</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-envelope-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $jumlah_undangan1 }}</h6>
                </div>
              </div>
            </div>
          
        </div>

        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title">Pengajuan Surat Keluar</h5>
  
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-envelope-fill"></i>
              </div>
              <div class="ps-3">
                <h6>{{ $jumlah_pengajuan1 }}</h6>
              </div>
            </div>
          </div>
      </div>

        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title">Permohonan Surat Keluar</h5>
  
            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-envelope-fill"></i>
              </div>
              <div class="ps-3">
                <h6>{{ $jumlah_permohonan1 }}</h6>
              </div>
            </div>
          </div>
      </div>

      <div class="card info-card sales-card">
        <div class="card-body">
          <h5 class="card-title">Edaran Surat Keluar</h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-envelope-fill"></i>
            </div>
            <div class="ps-3">
              <h6>{{ $jumlah_edaran1 }}</h6>
            </div>
          </div>
        </div>
    </div>

    <div class="card info-card sales-card">
      <div class="card-body">
        <h5 class="card-title">Keputusan Surat Keluar</h5>

        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-envelope-fill"></i>
          </div>
          <div class="ps-3">
            <h6>{{ $jumlah_keputusan1 }}</h6>
          </div>
        </div>
      </div>
  </div>

  <div class="card info-card sales-card">
    <div class="card-body">
      <h5 class="card-title">Tugas Surat Keluar</h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-envelope-fill"></i>
        </div>
        <div class="ps-3">
          <h6>{{ $jumlah_tugas1 }}</h6>
        </div>
      </div>
    </div>
</div>

<div class="card info-card sales-card">
  <div class="card-body">
    <h5 class="card-title">Perjalanan Surat Keluar</h5>

    <div class="d-flex align-items-center">
      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
        <i class="bi bi-envelope-fill"></i>
      </div>
      <div class="ps-3">
        <h6>{{ $jumlah_perjalanan1 }}</h6>
      </div>
    </div>
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