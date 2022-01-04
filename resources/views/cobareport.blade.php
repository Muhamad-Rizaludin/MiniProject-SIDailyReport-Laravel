
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/stmik.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Input Daily Reoport</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('template')}}https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{asset('template')}}https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link">Daily Report STMIK Bandung</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
          <a class="d-block col-sm-2" href="/dashboard/myprofile">
          {{Auth::user()->name}}
          </a>
      </li>
      <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <i class="fas fa-sign-out-alt"><a href="route('logout')" 
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log out') }}
    </a></i>
          
      </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-6">
    <!-- Brand Logo -->
    <div class="brand-link">
      <img src="{{asset('template')}}/dist/img/stmik.png"
           class="brand-image img-circle elevation-6"
           style="opacity: .9">
      <span class="brand-text">STMIK Bandung</span>
    </div>
 
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
     
      <!-- Sidebar Menu -->  
      <!-- /.sidebar-menu -->
      @include('temp.v_nav')
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header ">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
           <p> Input Daily Report</p>
          </div>
          <div class="ml-auto">
            <ol class="breadcrumb float-right">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Input Daily Report</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="isicontent">
      <form action="/dashboard/createreport" method="POST" enctype="multipart/form-data"  onsubmit="return confirm('Pastikan Data Yang dilaporkan sudah benar')">
        @csrf 
        <div class="card card-orange col-sm-10 mx-auto">
            <div class="card-header">
                <div align="center">
                    <h4>Form Input Daily Report</h4>
                </div>
            </div>
            @if(session('pesan'))
                <div class="alert alert-success alert-dimissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    {{(session('pesan'))}}.
                </div>
                @endif
            <div class="card-body">
                <form>
                    <div class="form-group row">
                        <label for="tanggal" class="col-sm-6 col-form-label col-form-label-sm">Tanggal Laporan</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control form-control-sm" name="tanggal" id="tanggal" value="<?php print(date("Y-m-d")); ?>">
                        </div>
                         <div class="text-danger">
                            @error('tanggal')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="NamaKaryawan" class="col-sm-6 col-form-label col-form-label-sm">Nama Karyawan</label>
                        <div class="col-sm-6">
                            <input type="text" name="NamaKaryawan" onkeyup="isi_otomatis()" id="NamaKaryawan" class="form-control">
                            <div class="text-danger">
                                @error('NamaKaryawan')
                                    {{ $message }}
                                @enderror
                            </div> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="NamaJabatan" class="col-sm-6 col-form-label col-form-label-sm">Nama Jabatan</label>
                        <div class="col-sm-6">
                          <input type="text" name="NamaJabatan" id="jabatan" class="form-control">
                            <div class="text-danger">
                                @error('NamaJabatan')
                                    {{ $message }}
                                @enderror
                            </div> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="NamaJobdesk" class="col-sm-6 col-form-label col-form-label-sm">Nama Jobdesk</label>
                        <div class="col-sm-6">
                          <input type="text" name="NamaJobdesk" id="jobdesk" class="form-control">
                            <div class="text-danger">
                                @error('NamaJobdesk')
                                    {{ $message }}
                                @enderror
                            </div> 
                        </div>   
                    </div>

                    <div class="form-group row">
                        <label for="JobdeskDetail" class="col-sm-6 col-form-label col-form-label-sm">Jobdesk Detail</label>
                        <div class="col-sm-6">
                            <input name="JobdeskDetail" class="form-control">
                                <div class="text-danger">
                                    @error('JobdeskDetail')
                                        {{ $message }}
                                    @enderror
                                </div>
                        </div>   
                    </div>

                    <div class="form-group row">
                      <label for="KegiatanHarian" class="col-sm-6 col-form-label col-form-label-sm">Kegiatan Harian</label>
                      <div class="col-sm-6">
                          <textarea name="KegiatanHarian" class="form-control" rows="4" placeholder="Enter ..."></textarea>
                              <div class="text-danger">
                                  @error('KegiatanHarian')
                                      {{ $message }}
                                  @enderror
                              </div>
                      </div>   
                  </div>
                    
                    <div class="form-group row">
                        <label for="status" class="col-sm-6 col-form-label col-form-label-sm">Status Laporan</label>
                        <div class="col-sm-6">
                            <select name="status" class="form-control custom-select">
                                <option selected disabled>--Pilih Status--</option>
                                <option>Ajukan Laporan</option>
                                <option disabled>Laporan Diterima</option>
                            </select>
                            <div class="text-danger">
                                @error('status') 
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>   
                    </div>

                    <div class="form-group col-sm-12">
                        <div class="card-footer col-sm-12">
                            <button class="btn btn-primary">Laporkan</button>
                            <button type="reset" class="btn btn-default float-right">Batal</button>
                        </div>
                    </div>
                  </form>
            </div>
        </div>          
        </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark col-sm-16">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template')}}/dist/js/demo.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script> 
   function isi_otomatis(){
                var NamaKaryawan = $("#NamaKaryawan").val();
                $.ajax({
                    url:'{!!URL::to('coba')!!}',
                    data:"NamaKaryawan="+NamaKaryawan ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#jabatan').val(obj.jabatan);
                    $('#jobdesk').val(obj.jobdesk);
                });
            };
</script>
</body>
</html>