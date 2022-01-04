<?php

namespace App\Http\Controllers;

use App\Models\JobdeskModel;
use App\Helpers\Helper;
use App\Models\Jobdesk;
use Illuminate\Http\Request;

class JobdeskController extends Controller
{
    //
    public function __construct()
    {
        $this->JobdeskModel = new JobdeskModel();
    }

    public function index()
    {
       $data = [
           'jobdesk' => $this->JobdeskModel->alldata(),
       ];
       return view('v_jobdesk',$data);
    }
    public function tambah()
    {
        $data=[
            'KodeJobdesk' => Helper::IDgenerator(new Jobdesk,'KodeJobdesk',6,'Job'),
        ];
        return view ('createjobdesk',$data);
    }
    public function tambahdata()
    {
        Request()->validate([
            'KodeJobdesk' => 'required',
            'NamaJobdesk' => 'required',
            
        ],[
            //custome pesan
            'KodeJobdesk.required' => 'Kode Jobdesk Wajib Di Isi !!!',
            'NamaJobdesk.required' => 'Nama Jobdesk Wajib Di Isi !!!',
        ]);
        //simpan data ke database
        $data =[
            'KodeJobdesk' => Request()->KodeJobdesk,
            'NamaJobdesk' => Request()->NamaJobdesk,
            
        ];
        $this->JobdeskModel->tambahdata($data);
        return redirect()->route('dashboard.jobdesk')->with('pesan','Data Telah Berhasil Disimpan!!!');
    }
    public function detail($id)
    {
        if(!$this->JobdeskModel->detailjobdesk($id))
        {
            abort (404);
        }
       $data = [
           'jobdesk' => $this->JobdeskModel->detailjobdesk($id),
       ];
       return view('v_detailjobdesk',$data);
    }
    public function edit($id)
    {
        if(!$this->JobdeskModel->detailjobdesk($id))
        {
            abort (404);
        }
       $data = [
        'jobdesk' => $this->JobdeskModel->detailjobdesk($id),
        ];
        return view('editjobdesk',$data);

    }
    public function updatejob($id)
    {
       //validasi from laravel
       Request()->validate([
            'KodeJobdesk' => 'required',
            'NamaJobdesk' => 'required',
        ],[
            //custome pesan
            'KodeJobdesk.required' => 'Kode Jobdesk Wajib Di Isi !!!',
            'NamaJobdesk.required' => 'Nama Jobdesk Wajib Di Isi !!!',
        ]);
        $data = [
            'KodeJobdesk' => Request()->KodeJobdesk,
            'NamaJobdesk' => Request()->NamaJobdesk,
        ];
        $this->JobdeskModel->updatedata($id, $data);
        return redirect()->route('dashboard.jobdesk')->with('pesan','Data Telah Berhasil DiUpdate!!!');
    }
    
    public function destroy( $id)
    {
        if(!$this->JobdeskModel->detailjobdesk($id))
        {
            abort (404);
        }
        $data = [
            'jobdesk' => $this->JobdeskModel->detailjobdesk($id),
        ];
        $this->JobdeskModel->hapusdata($id, $data);
        return redirect()->route('dashboard.jobdesk')->with('pesan','Data Telah Berhasil DiHapus !!!');
    }
    
}
