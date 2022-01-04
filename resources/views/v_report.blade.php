@extends('temp.v_temp')
@section('breadcump','Daily Report')
@section('title','Daily Report')
@section('isicontent')
        <!-- /.card-header -->
        <!-- form start -->
    
    <div class="card card-info">
            <div class="card-header">
                <div align="center">
                <h4>Tabel Hasil Laporan Harian Karyawan dan Dosen STMIK Bandung</h4>
                </div>
                @if (Auth::user()->hasRole('spmi'))
                <a href="/report/export" class="btn btn-sm btn-dark">Export File</a>
                @endif
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            
        <div class="card-body">
            @if(session('pesan'))
            <div class="alert alert-success alert-dimissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                {{(session('pesan'))}}.
            </div>
            @endif
            <table id="example1" class = "table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Tanggal </th>
                        <th> Nama Karyawan </th>
                        <th> Nama Jabatan </th>
                        <th> Nama Jobdesk </th>
                        <th> Jobdesk Detail </th>
                        <th> Kegiatan Harian </th>
                        <th> Status </th>
                        @if (Auth::user()->hasRole('spmi'))
                        <th> Action </th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <?php $id = 1; ?>
                    @foreach ($report as $data)
                        <tr>
                            <td> {{ $id++ }} </td>
                            <td> {{$data->tanggal}} </td>
                            <td> {{ $data->NamaKaryawan}} </td>
                            <td> {{ $data->NamaJabatan}} </td>
                            <td> {{ $data->NamaJobdesk}} </td>
                            <td> {{ $data->JobdeskDetail}} </td>
                            <td> {{ $data->KegiatanHarian}} </td>
                            <td> {{ $data->status}} </td>
                            @if (Auth::user()->hasRole('spmi'))
                            <td> 
                                <a href="/laporan/detail/{{$data->id}}" class="btn btn-sm btn-warning">View</a>
                                <a href="/laporan/generate/{{$data->id}}" class="btn btn-sm btn-primary">Generate</a>
                                <form action="/laporan/delete/{{$data->id}}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Menghapus Data ini?')">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
