@extends('temp.v_temp')
@section('breadcump','Edit Jobdesk')
@section('title', ('Edit Jobdesk'))
@section('isicontent')

    <!-- general form elements -->
    <form action="/jobdesk/update/{{$jobdesk->id}}" method="POST" enctype="multipart/form-data">
    @csrf 
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Edit Data Jobdesk</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
                    
            <div class="card-body">
                <div class="form-group">
                    <label >Kode Jobdesk</label>
                    <input name="KodeJobdesk" class="form-control" value="{{$jobdesk->KodeJobdesk}}" readonly>
                    
                </div>
                <div class="form-group">
                    <label >Nama Jobdesk</label>
                    <input name="NamaJobdesk" class="form-control"   value="{{$jobdesk->NamaJobdesk}}">
                    <div class="text-danger">
                        @error('NamaJobdesk')
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

                