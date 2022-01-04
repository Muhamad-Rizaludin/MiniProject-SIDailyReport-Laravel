<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JabatanModel extends Model
{
    public function alldata()
   {
       return DB::table('jabatans')->get();
   }
   public function tambahdata($data)
   {
       return DB::table('jabatans')->insert($data);
   } 
   public function detailjabatan($id)
   {
    return DB::table('jabatans')->where('id',$id)->first();
   }
   public function updatedata($id, $data)
   {
       return DB::table('jabatans')
       ->where('id', $id)
       ->update($data);
   }
   public function hapusdata($id)
   {
       return DB::table('jabatans')
       ->where('id', $id)
       ->delete();
   }
}
