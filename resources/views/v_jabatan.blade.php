@extends('temp.v_temp')
@section('breadcump','Data Jabatan')
@section('title','Data Jabatan')
@section('isicontent')

    <div class="card card-info">
        <div class="card-header">
            <a href="/dashboard/tambahjab" class="btn btn-sm btn-dark"> +Tambah Data Jabatan</a>
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
                        <th> Kode Jabatan </th>
                        <th> Nama Jabatan </th>
                        <th> Deskripsi </th>
                        <th width="100px"> Action </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    @foreach ($jabatan as $data)
                        <tr>
                            <td> {{ $id++ }} </td>
                            <td> {{ $data->KodeJabatan }} </td>
                            <td> {{ $data->NamaJabatan}} </td>
                            <td> {{ $data->Deskripsi}} </td>
                            <td> 
                                <form action="/jabatan/edit/{{$data->id}}" class="d-inline">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                </form>
                                <form action="/jabatan/delete/{{$data->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin Menghapus Data ini?')">
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