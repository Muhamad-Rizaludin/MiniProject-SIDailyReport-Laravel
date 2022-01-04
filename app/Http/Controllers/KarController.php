<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\KaryawanModel;
use app\Helpers\Helper;
use App\Models\karyawan;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;

class KarController extends Controller
{
    
    public function __construct()
    {
        $this->KaryawanModel = new KaryawanModel();
    }

    public function index() // Memanggi data di tabel karyawan
    {
       $data = [
           'karyawan' => $this->KaryawanModel->alldata(),
       ];
       return view('v_karyawan',$data);
    }
    public function tambah() // mebuat kode karyawan otomatis
    {
        $data =[
            'user' => $this->KaryawanModel->alldatauser(),
            'jabatan' => $this->KaryawanModel->alldatajab(),
            'jobdesk' => $this->KaryawanModel->alldatajob(),
            
        ];
       return view('createkaryawan',$data);
    }
    public function tambahdata()
    {
        //validasi data
        Request()->validate([
            'NoKaryawan' => 'required',
            'NamaKaryawan' => 'required',
            'jabatan' => 'required',
            'jobdesk' => 'required',
            'alamat' => 'required',
            'JenisKelamin' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,bmp,png|max:1024',
            
        ],[
            //custome pesan
            'NoKaryawan.required' => 'NO Karyawan Wajib Di Isi !!!',
            'NamaKaryawan.required' => 'Nama Karyawan Wajib Di Isi !!!',
            'jabatan.required' => 'jabatan Wajib Di Isi !!!',
            'jobdesk.required' => 'Nama Karyawan Wajib Di Isi !!!',
            'alamat.required' => 'Alamat Wajib Di Isi !!!',
            'JenisKelamin.required' => 'Pilih Jenis Kelamin !!!',
            'foto.required' => 'Foto Wajib di isi !!!',
            
        ]);
        //untuk menyimpan lokasi file foto
        $foto = time().'.'.Request()->foto->extension();  
        Request()->foto->move(public_path('foto_user'), $foto);
        //simpan data ke database
        $data =[
            'NoKaryawan' => Request()->NoKaryawan,
            'NamaKaryawan' => Request()->NamaKaryawan,
            'jabatan' => Request()->jabatan,
            'jobdesk' => Request()->jobdesk,
            'alamat' => Request()->alamat,
            'JenisKelamin' => Request()->JenisKelamin,
            'foto' => $foto,

        ];
        $this->KaryawanModel->tambahdata($data);
        return redirect()->route('dashboard.karyawan')->with('pesan','Data Telah Berhasil Disimpan!!!');
    }
    public function detail($id)
    {
        if(!$this->KaryawanModel->detailkaryawan($id))
        {
            abort (404);
        }
       $data = [
           'karyawan' => $this->KaryawanModel->detailkaryawan($id),
       ];
       return view('v_detailkaryawan',$data);
    }
    public function edit($id)
    {
        if(!$this->KaryawanModel->detailkaryawan($id))
        {
            abort (404);
        }
       $data = [
        'karyawan' => $this->KaryawanModel->detailkaryawan($id),
        'user' => $this->KaryawanModel->alldatauser(),
        'jabatan' => $this->KaryawanModel->alldatajab(),
        'jobdesk' => $this->KaryawanModel->alldatajob(),
        ];
        return view('editkaryawan',$data);

    }
    public function updatekar($id)
    {
       //validasi from laravel
       Request()->validate([
            'NoKaryawan' => 'required',
            'NamaKaryawan' => 'required',
            'jabatan' => 'required',
            'jobdesk' => 'required',
            'alamat' => 'required',
            'JenisKelamin' => 'required',
            'foto_user' =>'mimes:jpg,jpeg,bmp,png|max:1024',
        ],[
            // custome pesan
            'NoKaryawan.required' => 'NO Karyawan Wajib Di Isi !!!',
            'NamaKaryawan.required' => 'Nama Karyawan Wajib Di Isi !!!',
            'jabatan.required' => 'jabatan Wajib Di Isi !!!',
            'jobdesk.required' => 'Nama Karyawan Wajib Di Isi !!!',
            'alamat.required' => 'Alamat Wajib Di Isi !!!',
            'JenisKelamin.required' => 'Pilih Jenis Kelamin !!!',
            'foto.required' => 'Foto Wajib di isi !!!',
        ]);

    //untuk update data user
    if (Request()->foto <> "")
    {
            //untuk menyimpan lokasi file foto
            $foto = time().'.'.Request()->foto->extension();  
            Request()->foto->move(public_path('foto_user'), $foto);

        //simpan ke database
        $data = [
            'NoKaryawan' => Request()->NoKaryawan,
            'NamaKaryawan' => Request()->NamaKaryawan,
            'jabatan' => Request()->jabatan,
            'jobdesk' => Request()->jobdesk,
            'alamat' => Request()->alamat,
            'JenisKelamin' => Request()->JenisKelamin,
            'foto' => $foto,
        ];
        $this->KaryawanModel->updatedata($id, $data);
    }
    else
    {
        $data = [
            'NoKaryawan' => Request()->NoKaryawan,
            'NamaKaryawan' => Request()->NamaKaryawan,
            'jabatan' => Request()->jabatan,
            'jobdesk' => Request()->jobdesk,
            'alamat' => Request()->alamat,
            'JenisKelamin' => Request()->JenisKelamin,
        ];
        $this->KaryawanModel->updatedata($id, $data);
    }
    return redirect()->route('dashboard.karyawan')->with('pesan','Data Telah Berhasil DiUpdate !!!');
    }
    public function destroy( $id)
    {
        if(!$this->KaryawanModel->detailkaryawan($id))
        {
            abort (404);
        }
        $data = [
            'karyawan' => $this->KaryawanModel->detailkaryawan($id),
        ];
        $this->KaryawanModel->hapusdata($id, $data);
        return redirect()->route('dashboard.karyawan')->with('pesan','Data Telah Berhasil DiHapus !!!');
    }
}
