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
      <h1>Jabatan</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <table class="table table-bordered">
          <tr>
              <td>NO</td>
              <td>Nama Jabatan</td>
              <td>Aksi</td>

          </tr>
          <?php $no=1;?>
          <tr>
            @foreach($varJabatan as $item)
            <td>{{ $no++ }}</td>
            <td>{{ $item -> nama_jabatan }}</td>
              <td>
                <a href="{{ url('edit-jabatan/' .$item->id) }}" title="Edit">
                  <i class="bi bi-pencil m-2"></i>
                </a>
                <a href="{{ url('hapus-jabatan/' .$item->id) }}"  title="Hapus">
                  <i class="bi bi-trash m-2"></i>
                </a></td>
          </tr>
          @endforeach
      </table>
      </div>
      <div class="card">
        <div class="card-body">
        <form action="{{ url('/simpan-jabatan') }}" method="post" class="row g-3">
            {{ csrf_field() }}
            <div class="col-12">
                <label class="form-label">Nama Jabatan</label>
                <input type="text" name="nama_jabatan" placeholder="Masukkan Nama Jabatan" class="form-control"  autocomplete="off">
            </div>   
            <div class="text">
                <button type="submit" name="simpan" class="btn btn-success">Simpan</button> 
            </div>                                      
        </form>
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
  @include('sweetalert::alert')
</body>

</html>