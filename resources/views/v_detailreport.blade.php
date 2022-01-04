@extends('temp.v_temp')
@section('breadcump','Detail Report')
@section('title','Detail Report')
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

                </div>

                <h3 class="profile-username text-center">{{$report->NamaKaryawan}}</h3>

                <p class="text-muted text-center">Detail Hasil Reposrt karyawan STMIK Bandung</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Tanggal</b> <a class="float-right">{{$report->tanggal}}</a>
                    </li> 
                    <li class="list-group-item">
                        <b>Nama Karyawan</b> <a class="float-right">{{$report->NamaKaryawan}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Nama Jabatan</b> <a class="float-right">{{$report->NamaJabatan}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Nama Jobdesk</b> <a class="float-right">{{$report->NamaJobdesk}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Jobdesk Detail</b> <a class="float-right">{{$report->JobdeskDetail}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Kegiatan Harian</b> <a class="float-right">{{$report->KegiatanHarian}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Status</b> <a class="float-right">{{$report->status}}</a>
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