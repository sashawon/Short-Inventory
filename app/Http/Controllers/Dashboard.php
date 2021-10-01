<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class Dashboard extends Controller
{
    public function index()
    {
        $result['category']=DB::table('categories')->where(['status'=>1])->count();
        $result['brand']=DB::table('brands')->where(['status'=>1])->count();
        $result['product']=DB::table('products')->where(['status'=>1])->count();
        $result['employee']=DB::table('employees')->where(['status'=>1])->count();
        $result['assign']=DB::table('expenses')->where(['status'=>'Assign'])->count();
        $result['repair']=DB::table('expenses')->where(['status'=>'Repair'])->count();
        $result['damage']=DB::table('expenses')->where(['status'=>'Damage'])->count();

        // echo "<pre>";
        // print_r($result);
        // die();

        return view('/dashboard',$result);
    }
}
