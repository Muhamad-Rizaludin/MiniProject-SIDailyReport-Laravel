@extends('temp.v_temp')
@section('breadcump','Edit User')
@section('title', ('Edit User'))
@section('isicontent')

    <!-- general form elements -->
    <form action="/karyawan/update/{{$karyawan->id }}" method="POST" enctype="multipart/form-data">
    @csrf 
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Edit Data Karyawan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
                    
            <div class="card-body">
                <div class="form-group">
                    <label >Nomor Karyawan</label>
                    <input name="NoKaryawan" class="form-control" value="{{$karyawan->NoKaryawan}}" readonly>
                    
                </div>
                <div class="form-group">
                    <label >Nama Karyawan</label>
                    <input name="NamaKaryawan" class="form-control"   value="{{$karyawan->NamaKaryawan}}" readonly>
                    <div class="text-danger">
                        @error('NamaKaryawan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label >jabatan lama : {{$karyawan->jabatan}}</label><br>
                    <label >jabatan baru</label>
                        <select name="jabatan" class="form-control custom-select">
                            @foreach ($jabatan as $jab)
                                <option value="{{$jab->NamaJabatan}}">{{$jab->NamaJabatan}}</option>                                                
                            @endforeach
                        </select>
                        <div class="text-danger">
                            @error('jabatan')
                                {{ $message }}
                            @enderror
                        </div> 
                </div>
                <div class="form-group">
                    <label >jobdesk lama : {{$karyawan->jobdesk}}</label><br>
                    <label >Jobdesk</label>
                        <select name="jobdesk" class="form-control custom-select">
                            @foreach ($jobdesk as $job)
                                <option value="{{$job->NamaJobdesk}}">{{$job->NamaJobdesk}}</option>                                                 
                            @endforeach
                        </select>
                        <div class="text-danger">
                            @error('jobdesk')
                                {{ $message }}
                            @enderror
                        </div> 
                </div>
                <div class="form-group">
                    <label >Alamat</label>
                    <input name="alamat"  class="form-control"   value="{{$karyawan->alamat}}">
                    <div class="text-danger">
                        @error('alamat')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label >Jenis Kelamin</label>
                            <label class="radio-inline">
                                <input type="radio" name="JenisKelamin" value="Laki-Laki" checked>Laki-Laki
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="JenisKelamin" value="Perempuan">Perempuan
                            </label>
                </div>
                <div class="form-group">
                    <label >Foto</label>
                    <img src="{{url('foto_user/'.$karyawan->foto)}}" width="150px">

                    <br>
                    <label>Ganti Foto</label>
                        <input name="foto" type="file" class="form-control" >
                        <div class="text-danger">
                            @error('foto')
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

                