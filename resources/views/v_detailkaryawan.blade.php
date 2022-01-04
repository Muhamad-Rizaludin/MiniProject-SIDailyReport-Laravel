@extends('temp.v_temp')
@section('breadcump','Detail Karyawan')
@section('title','Detail Karyawan')
@section('isicontent')
<div class="card card-info">
    <br>
<div class="content col-sm-6 mx-auto">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-12 mx-auto">

            <!-- Profile Image -->
            <div class="card card-info card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{url('foto_user/'.$karyawan->foto)}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$karyawan->NamaKaryawan}}</h3>

                <p class="text-muted text-center">Detail Data Karyawan STMIK Bandung</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Id Karyawan</b> <a class="float-right">{{$karyawan->NoKaryawan}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Nama Karyawan</b> <a class="float-right">{{$karyawan->NamaKaryawan}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Jabatan</b> <a class="float-right">{{$karyawan->jabatan}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Jobdesk</b> <a class="float-right">{{$karyawan->jobdesk}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Alamat</b> <a class="float-right">{{$karyawan->alamat}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Jenis Kelamin</b> <a class="float-right">{{$karyawan->JenisKelamin}}</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
</div>
        
@endsection