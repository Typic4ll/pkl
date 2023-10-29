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
            <h5 class="card-title">Edit Pegawai</h5>
            <form action="{{ url('/perubahan-pegawai/' .$varPegawai->id) }}" method="post" class="row g-3">
                {{ csrf_field() }}
                <div class="col-12">
                    <label class="form-label">NIP Pegawai</label>
                    <input type="text" name="id" placeholder="Masukkan NIP" class="form-control" value="{{ $varPegawai->id }}" autocomplete="off" disabled >
                </div>
                <div class="col-12">
                    <label class="form-label">Nama Pegawai</label>
                    <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control" value="{{ $varPegawai->nama }}"  autocomplete="off">
                </div>  
                <div class="col-12">
                    <label class="form-label">Jabatan</label>
                    <select type="text" name="jabatan_id" class="form-control form-control-user" placeholder="Perihal">
                        <option value="" disabled selected>Pilih Jabatan</option>
                        @foreach ($show1 as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_jabatan }}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="col-12">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $varPegawai->tanggal_lahir }}"  autocomplete="off">
                </div> 
                <div class="col-12">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" class="form-control" value="{{ $varPegawai->tempat_lahir }}" autocomplete="off">
                </div> 
                <div class="col-12">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control" value="{{ $varPegawai->alamat }}" autocomplete="off">
                </div> 
                <div class="col-12">
                    <label class="form-label">No Telpon</label>
                    <input type="text" name="no_telpon" placeholder="Masukkan No Telpon" class="form-control" value="{{ $varPegawai->no_telpon }}" autocomplete="off">
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