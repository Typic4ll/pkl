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
      <h1>Perihal</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <table class="table table-bordered">
          <tr>
              <td>NO</td>
              <td>Nama Perihal</td>
              <td>Aksi</td>

          </tr>
          <?php $no=1;?>
          <tr>
            @foreach($varPerihal as $item)
            <td>{{ $no++ }}</td>
            <td>{{ $item -> nama_perihal }}</td>
              <td>
                <a href="{{ url('edit-perihal/' .$item->id) }}" title="Edit">
                  <i class="bi bi-pencil m-2"></i>
                </a>
                <a href="{{ url('hapus-perihal/' .$item->id) }}"  title="Hapus">
                  <i class="bi bi-trash m-2"></i>
                </a></td>
          </tr>
          @endforeach
      </table>
      </div>
    </section>
    <a href="{{ url('/tambah-perihal') }}" class="btn btn-primary">Tambah Perihal
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