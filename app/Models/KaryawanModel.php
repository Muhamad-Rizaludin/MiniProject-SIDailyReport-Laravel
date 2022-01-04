<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class KaryawanModel extends Model
{
    public function alldata()
    {
        return DB::table('karyawans')->get();
    }
    public function tambahdata($data)
    {
        return DB::table('karyawans')->insert($data);
    }
    public function detailkaryawan($id)
    {
        return DB::table('karyawans')->where('id',$id)->first();
    }
    public function updatedata($id, $data)
    {
        return DB::table('karyawans')
        ->where('id', $id)
        ->update($data);
    }
    public function alldatajab()
    {
        return DB::table('jabatans')->get();
    }
    public function alldatauser()
    {
        return DB::table('users')->get();
    }
    public function alldatajob()
    {
        return DB::table('jobdesks')->get();
    }
    public function hapusdata($id)
    {
        return DB::table('karyawans')
        ->where('id', $id)
        ->delete();
    }
}
