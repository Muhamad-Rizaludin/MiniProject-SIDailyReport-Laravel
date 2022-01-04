<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
   {
        if(Auth::user()->hasRole('pimpinan'))
        {
            return view('pimpinanhome');
        }
        elseif(Auth::user()->hasRole('spmi'))
        {
            return view('spmihome');
        }
        elseif(Auth::user()->hasRole('karyawan'))
        {
            return view('karyawanhome');
        }
        elseif(Auth::user()->hasRole('admin'))
        {
            return view('adminhome');
        }
   }
   public function myprofile()
   {
    return view('myprofile');
   }
}
