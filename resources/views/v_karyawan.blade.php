@extends('temp.v_temp')
@section('breadcump','Data Dosen dan Karyawan')
@section('title','Data Dosen dan Karyawan')
@section('isicontent')

    <div class="card card-info">
        <div class="card-header">
            <a href="/dashboard/tambah" class="btn btn-sm btn-dark"> +Tambah Data Dosen dan Karyawan</a>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
         <div class="card-body">
            <br>
            @if(session('pesan'))
            <div class="alert alert-success alert-dimissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                {{(session('pesan'))}}.
            </div>
            @endif
            <table id="example1" class = "table table-bordered table-striped">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> ID Karyawan </th>
                        <th> Nama Karyawan </th>
                        <th> Jabatan </th>
                        <th> Jobdesk </th>
                        <th> Alamat </th>
                        <th> Jenis Kelamin </th>
                        <th> Foto  </th>
                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    @foreach ($karyawan as $data)
                        <tr>
                            <td> {{ $id++ }} </td>
                            <td> {{ $data->NoKaryawan }} </td>
                            <td> {{ $data->NamaKaryawan}} </td>
                            <td> {{ $data->jabatan}} </td>
                            <td> {{ $data->jobdesk}} </td>
                            <td> {{ $data->alamat}} </td>
                            <td> {{ $data->JenisKelamin}} </td>
                            <td> <img src="{{url('foto_user/'.$data->foto)}}" width="100px"> </td>
                            <td> 
                                <a href="/karyawan/detail/{{$data->id}}" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                                <form action="/karyawan/edit/{{$data->id}}" class="d-inline">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                </form>
                                <form action="/karyawan/delete/{{$data->id}}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Menghapus Data ini?')">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection