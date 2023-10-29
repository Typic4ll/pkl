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
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Tambah Surat Masuk</h5>
            <form action="{{ url('/simpan-surat-masuk') }}" method="post" enctype="multipart/form-data" class="row g-3">
                {{ csrf_field() }}

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                 @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-12">
                    <label class="form-label">No Surat</label>
                    <input type="text" name="no_surat" placeholder="Masukkan No Surat" class="form-control"  autocomplete="off">
                </div> 
                <div class="col-12">
                    <label class="form-label">Asal Surat</label>
                    <input type="text" name="asal_surat" placeholder="Masukkan Asal Surat" class="form-control"  autocomplete="off">
                </div> 
                <div class="col-12">
                    <label class="form-label">Tanggal Surat</label>
                    <input type="date" name="tanggal_surat" placeholder="Masukkan Tanggal Surat" class="form-control"  autocomplete="off">
                </div> 
                <div class="col-12">
                    <label class="form-label">Tanggal Terima Surat</label>
                    <input type="date" name="tanggal_terima" placeholder="Masukkan Tanggal Terima Surat" class="form-control"  autocomplete="off">
                </div> 
                <div class="col-12">
                    <label class="form-label">Perihal</label>
                    <select type="text" name="perihal_id" class="form-control form-control-user" placeholder="Perihal">
                        <option value="" disabled selected>Pilih Perihal</option>
                        @foreach ($show as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_perihal }}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="col-12">
                    <label class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" placeholder="Masukkan keterangan" class="form-control"  autocomplete="off">
                </div> 
                <div class="col-12">
                    <label class="form-label">Pegawai</label>
                    <select type="text" name="perihal_id" class="form-control form-control-user" placeholder="Perihal">
                        <option value="" disabled selected>Pilih Pegawai</option>
                        @foreach ($pegawai as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="col-12">
                    <label class="form-label">Scan Surat Pdf</label>
                    <input type="file" name="dokumen" class="form-control">
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

</body>

</html>