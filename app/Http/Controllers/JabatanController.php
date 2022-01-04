<?php

namespace App\Http\Controllers;

use App\Models\JabatanModel;
use App\Helpers\Helper;
use App\Models\Jabatan;
use CreateJabatansTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function __construct()
    {
        $this->JabatanModel = new JabatanModel();
    }

    public function index()
    {
       $data = [
           'jabatan' => $this->JabatanModel->alldata(),
       ];
       return view('v_jabatan',$data);
    }
    public function tambah()
    {
        $data=[
            'KodeJabatan' => Helper::IDgenerator(new Jabatan,'KodeJabatan',6,'KJ'),
        ];
        return view ('createjabatan',$data);
    }
    public function tambahdata()
    {
        Request()->validate([
            'NamaJabatan' => 'required|unique:jabatans,NamaJabatan|min:5|max:30',
            'KodeJabatan' => 'required',
            'Deskripsi' => 'required',
            
        ],[
            //custome pesan
            'NamaJabatan.required' => 'Nama Jabatan Wajib Di Isi !!!',
            'NamaJabatan.unique' => 'Nama Jabatan sudah terdaftar,gunakan yang lain',
            'NamaJabatan.min' => 'Nama Jabatan minimal 5 karakter !!!',
            'NamaJabatan.max' => 'Nama Jabatan maximal 20 karakter !!!',
            'KodeJabatan.required' => 'Kode Jabatan Wajib Di Isi !!!',
            'Deskripsi.required' => 'Deskripsi Wajib Di Isi !!!',
            
        ]);
        //simpan data ke database
        $data =[
            'KodeJabatan' => Request()->KodeJabatan,
            'NamaJabatan' => Request()->NamaJabatan,
            'Deskripsi' => Request()->Deskripsi,
        ];
        $this->JabatanModel->tambahdata($data);
        return redirect()->route('dashboard.jabatan')->with('pesan','Data Telah Berhasil Disimpan!!!');
    }
    public function detail($id)
    {
        if(!$this->JabatanModel->detailjabatan($id))
        {
            abort (404);
        }
       $data = [
           'jabatan' => $this->JabatanModel->detailjabatan($id),
       ];
       return view('v_detailjabatan',$data);
    }
    public function edit($id)
    {
        if(!$this->JabatanModel->detailjabatan($id))
        {
            abort (404);
        }
       $data = [
        'jabatan' => $this->JabatanModel->detailjabatan($id),
        ];
        return view('editjabatan',$data);

    }
    public function updatejab($id)
    {
       //validasi from laravel
       Request()->validate([
        'NamaJabatan' => 'required',
        'KodeJabatan' => 'required',
        'Deskripsi' => 'required',
        ],[
            // custome pesan
            'NamaJabatan.required' => 'Nama Jabatan Wajib Di Isi !!!',
            'KodeJabatan.required' => 'Kode Jabatan Wajib Di Isi !!!',
            'Deskripsi.required' => 'Deskripsi Wajib Di Isi !!!',
        ]);
        $data = [
            'KodeJabatan' => Request()->KodeJabatan,
            'NamaJabatan' => Request()->NamaJabatan,
            'Deskripsi' => Request()->Deskripsi,
        ];
        $this->JabatanModel->updatedata($id, $data);
        return redirect()->route('dashboard.jabatan')->with('pesan','Data Telah Berhasil DiUpdate!!!');
    }
    
    public function destroy( $id)
    {
        if(!$this->JabatanModel->detailjabatan($id))
        {
            abort (404);
        }
        $data = [
            'jabatan' => $this->JabatanModel->detailjabatan($id),
        ];
        $this->JabatanModel->hapusdata($id, $data);
        return redirect()->route('dashboard.jabatan')->with('pesan','Data Telah Berhasil DiHapus !!!');
    }
}
