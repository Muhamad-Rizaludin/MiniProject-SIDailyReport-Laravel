<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JobdeskModel extends Model
{
    use HasFactory;
    public function alldata()
    {
        return DB::table('jobdesks')->get();
    }
    public function tambahdata($data)
    {
        return DB::table('jobdesks')->insert($data);
    }
    public function detailjobdesk($id)
   {
    return DB::table('jobdesks')->where('id',$id)->first();
   }
   public function updatedata($id, $data)
   {
       return DB::table('jobdesks')
       ->where('id', $id)
       ->update($data);
   }
   public function hapusdata($id)
   {
       return DB::table('jobdesks')
       ->where('id', $id)
       ->delete();
   }
}
