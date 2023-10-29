<html>

<head>
    <link href="{{ asset('template/img/logo1.png') }}" rel="icon">
    <link href="{{ asset('template/img/logo1.png') }}" rel="apple-touch-icon">
    <title>Sistem Pengarsipan Surat Masuk & Keluar</title>
    <style type= "text/css">

    body {background-color : #ccc }

    .rangkasurat {width : 930px;margin:0 auto;background-color : #fff;padding: 20px;}

    table {border-bottom : 5px solid # 000; padding: 2px}

    .tengah {text-align : center;line-height: 5px;}

    .table1 {
    color: #232323;
    border-collapse: collapse;
    }

    h3 {
      text-align: right;
      margin-right: 20px
    }
 
 
    .table1, td {
    border: 2px solid #050505;
    padding: 5px 15px;
    }

     </style >

</head>

<body>

<div class = "rangkasurat">

     <table>


                 <th> <img src="{{ asset('template/img/logo1.png') }}" width="80px"> </th>

                 <th class = "tengah">

                       <h3>PEMERINTAH KOTA BANJARMASIN</h3>

                       <h2>DINAS KEBUDAYAAN, KEPEMUDAAN, OLAHRAGA DAN PARIWISATA</h2>

                       <p>Alamat: Jl. Pangeran Hidayatullah (Lingkar Dalam Bunua Anyar) Banjarmasin</p>

                       <p>Website: www.banjarmasintoursm.com</p>

                 </th>
                 
     </table >
     <br>

     <table class="table1">
        <tr>
            <td>No</td>
            <td>No Surat</td>
            <td>Tujuan Surat</td>
            <td>Tanggal Surat</td>
            <td>Perihal</td>
            <td>Keterangan</td>
        </tr>
        <?php $no=1;?>
        <tr>
          @foreach($cetak as $item)
          <td>{{ $no++ }}</td>
          <td>{{ $item -> no_surat }}</td>
          <td>{{ $item -> tujuan_surat }}</td>
          <td>{{ $item -> tanggal_surat }}</td>
          <td>{{ $item -> perihal -> nama_perihal}}</td>
          <td>{{ $item -> keterangan }}</td>
        </tr>
        @endforeach
    </table>
    <h2>Jumlah : {{ $jumlah }}</h2>
    <h3>{{ $pegawai -> jabatan -> nama_jabatan }}</h3><br>
    <h3 style="margin-right: 50px">{{ $pegawai -> nama }}</h3>
    <h3>{{ $pegawai -> id }}</h3>
    </div>
    

</div>

</body>

<script>
    window.print();
  </script>

</html>