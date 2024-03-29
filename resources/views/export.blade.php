<?php
//import koneksi ke database
?>
<html>
<head>
  <title >Hasil Daily Report Karyawan dan Dosen STMIK Bandung
    Tanggal : <?php print(date("Y-m-d")); ?>
  </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>
<body>
<div class="container">
        <br>
            <div align="center">
                <h2>Daily Report Karyawan dan Dosen STMIK Bandung</h2>
                <h5 >Tanggal : <?php print(date("Y-m-d")); ?> </h5>
                <img src="{{asset('template')}}/dist/img/stmik.png">
            </div>
		<br>	
					<!-- Masukkan table nya disini, dimulai dari tag TABLE -->
                    <table id="mauexport" class = "table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Nama Karyawan </th>
                        <th> Nama Jabatan </th>
                        <th> Nama Jobdesk </th>
                        <th> Jobdesk Detail </th>
                        <th> Kegiatan Harian </th>
                        <th> Status </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id=1; ?>
                    @foreach ($report as $data)
                        <tr>
                            <td> {{ $id++ }} </td>
                            <td> {{ $data->NamaKaryawan}} </td>
                            <td> {{ $data->NamaJabatan}} </td>
                            <td> {{ $data->NamaJobdesk}} </td>
                            <td> {{ $data->JobdeskDetail}} </td>
                            <td> {{ $data->KegiatanHarian}} </td>
                            <td> {{ $data->status}} </td>
                        </tr>
                     @endforeach
                </tbody>
            </table>
            <a href="/dashboard" class="btn btn-primary" >
              kembali
            </a>
</div>	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
	
</body>

</html>