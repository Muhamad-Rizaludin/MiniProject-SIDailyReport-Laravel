@extends('temp.v_temp')
@section('breadcump','Tambah Data Dosen dan Karyawan')
@section('title', ('Tambah Data Dosen dan Karyawan'))
@section('isicontent')

    <!-- general form elements -->
    <form action="/dashboard/createkar" method="POST" enctype="multipart/form-data">
    @csrf 
        <div class="card card-info col-sm-6 mx-auto">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Dosen dan Karyawan</h3>
            </div>
                <!-- /.card-header -->
                <!-- form start -->
            <div class="card-body">
                <div class="form-group">
                    <label >Id Karyawan</label>
                        <select name="NoKaryawan" class="form-control custom-select">
                            @foreach ($user as $us)
                                <option value="{{$us->id_karyawan}}">{{$us->id_karyawan}}/{{$us->name}}</option>                                                
                            @endforeach
                        </select>
                        <div class="text-danger">
                            @error('NoKaryawan')
                                {{ $message }}
                            @enderror
                        </div> 
                </div>
                <div class="form-group">
                    <label >Nama Karyawan</label>
                    <input name="NamaKaryawan" class="form-control" value="{{old('NamaKaryawan') }}" >
                    <div class="text-danger">
                        @error('NamaKaryawan')
                            {{ $message }}z
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label >jabatan</label>
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
                    <input name="alamat"  class="form-control"   value="{{old('alamat') }}">
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
                        <input name="foto" type="file" class="form-control" value="{{old('foto') }}" >
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