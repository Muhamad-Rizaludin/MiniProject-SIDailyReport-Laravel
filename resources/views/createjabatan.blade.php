@extends('temp.v_temp')
@section('breadcump','Tambah Jabatan')
@section('title','Tambah Jabatan')
@section('isicontent')
    
    <form action="/dashboard/createjab" method="POST"  enctype="multipart/form-data">
        @csrf
           <!-- /.card -->
                <!-- Horizontal Form -->
        <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title"> Form Tambah Data Jabatan </h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
            <div class="card-body">
                <div class="form-group">
                    <label >Kode Jabatan</label>
                    <input name="KodeJabatan" class="form-control" value="{{$KodeJabatan}}" >
                </div>
                <div class="form-group">
                    <label >Nama Jabatan</label>
                    <input name="NamaJabatan" type="text" class="form-control" value="{{old('NamaJabatan')}}">
                    <div class="text-danger">
                        @error('NamaJabatan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label >Deskripsi</label>
                    <input name="Deskripsi" type="text" class="form-control"   value="{{old('Deskripsi')}}">
                    <div class="text-danger">
                        @error('Deskripsi')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-info">Simpan</button>
                    <button type="reset" class="btn btn-default float-right">Batal</button>
                </div>
            </div>
        </div>         
    </form>
@endsection
