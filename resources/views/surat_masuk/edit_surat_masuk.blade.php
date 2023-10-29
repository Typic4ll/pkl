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
            <h5 class="card-title">Edit Surat Masuk</h5>
            <form action="{{ url('perubahan-surat-masuk/' .$varSuratMasuk->id) }}" method="post" enctype="multipart/form-data" class="row g-3">
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
                    <input type="text" name="no_surat" placeholder="Masukkan No Surat" class="form-control"  autocomplete="off" value="{{ $varSuratMasuk->no_surat}}" disabled>
                </div> 
                <div class="col-12">
                    <label class="form-label">Asal Surat</label>
                    <input type="text" name="asal_surat" placeholder="Masukkan Asal Surat" class="form-control"  autocomplete="off" value="{{ $varSuratMasuk->asal_surat}}">
                </div> 
                <div class="col-12">
                    <label class="form-label">Tanggal Surat</label>
                    <input type="date" name="tanggal_surat" placeholder="Masukkan Tanggal Surat" class="form-control"  autocomplete="off" value="{{ $varSuratMasuk->tanggal_surat}}">
                </div> 
                <div class="col-12">
                    <label class="form-label">Tanggal Terima Surat</label>
                    <input type="date" name="tanggal_terima" placeholder="Masukkan Tanggal Terima Surat" class="form-control"  autocomplete="off" value="{{ $varSuratMasuk->tanggal_terima}}">
                </div> 
                <div class="col-12">
                    <select type="text" name="perihal_id" class="form-control form-control-user" value="{{ $varSuratMasuk->perihal_id}}">
                        <option value="" disabled selected>Pilih Perihal</option>
                        @foreach ($show1 as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_perihal }}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="col-12">
                    <label class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" placeholder="Masukkan keterangan" class="form-control"  autocomplete="off" value="{{ $varSuratMasuk->keterangan}}">
                </div> 
                {{-- <div class="col-12">
                    <label class="form-label">Scan Surat Pdf</label>
                    <p>{{ $varSuratMasuk->dokumen }}</p>
                    <input type="file" name="dokumen" class="form-control" value="">
                </div>   --}}
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