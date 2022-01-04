@extends('temp.v_temp')
@section('breadcump','Edit Jabatan')
@section('title', ('Edit Jabatan'))
@section('isicontent')

    <!-- general form elements -->
    <form action="/jabatan/update/{{ $jabatan->id}}" method="POST" enctype="multipart/form-data">
    @csrf 
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Edit Data Jabatan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
                    
            <div class="card-body">
                <div class="form-group">
                    <label >Kode Jabatan</label>
                    <input name="KodeJabatan" class="form-control" value="{{$jabatan->KodeJabatan}} " readonly>
                    
                </div>
                <div class="form-group">
                    <label >Nama Jabatan</label>
                    <input name="NamaJabatan" class="form-control"   value="{{$jabatan->NamaJabatan}}">
                    <div class="text-danger">
                        @error('NamaJabatan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label >Deskripsi</label>
                    <input name="Deskripsi"  class="form-control"   value="{{$jabatan->Deskripsi}}">
                    <div class="text-danger">
                        @error('Deskripsi')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-info">Update</button>
                    <button type="reset" class="btn btn-default float-right">Batal</button>
                </div>
            </div>
        </div>
    </form>
 @endsection           

                