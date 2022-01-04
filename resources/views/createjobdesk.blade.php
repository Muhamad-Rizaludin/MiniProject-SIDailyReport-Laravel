@extends('temp.v_temp')
@section('breadcump','Tambah Jobdesk')
@section('title','Tambah Jobdesk')
@section('isicontent')
    
    <form action="/dashboard/createjob" method="POST"  enctype="multipart/form-data">
        @csrf
           <!-- /.card -->
                <!-- Horizontal Form -->
        <div class="card card-info">
                  <div class="card-header">
                    <h3 class="card-title"> Form Tambah Jobdesk</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
            <div class="card-body">
                <div class="form-group">
                    <label >Kode Jobdesk</label>
                    <input name="KodeJobdesk" class="form-control" value="{{$KodeJobdesk}}" readonly>
                </div>
                <div class="form-group">
                    <label >Nama Jobdesk</label>
                    <input name="NamaJobdesk" type="text" class="form-control" value="{{old('NamaJobdesk')}}">
                    <div class="text-danger">
                        @error('NamaJobdesk')
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
