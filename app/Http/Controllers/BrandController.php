<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class BrandController extends Controller
{
    public function index()
    {
        $result['data'] = Brand::all();
        return view('/brand',$result);
    }

    public function status(Request $request, $status, $id)
    {
        $model = Brand::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('msg','Brand Status Update Successfully');
        return redirect('/brand');
    }

    public function manage_brand(Request $request, $id='')
    {
        if ($id>0) {
            $arr = Brand::where(['id'=>$id])->get();

            $result['id'] = $arr['0']->id;
            $result['brand_name'] = $arr['0']->brand_name;
            $result['status'] = $arr['0']->status;
        } else {
            $result['id'] = 0;
            $result['brand_name'] = '';
            $result['status'] = '';
        }
        
        return view('/manage_brand',$result);
    }

    public function manage_brand_process(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:brands,brand_name,'.$request->post('id')
        ]);

        if ($request->post('id')>0) {
            $model = Brand::find($request->post('id'));
            $msg = 'Brand Update Successfully';
        } else {
            $model = new Brand();
            $msg = 'Brand Add Successfully';
        }
        
        $model->brand_name = $request->post('name');
        $model->status = 1;
        $model->save();
        session()->flash('msg',$msg);
        return redirect('/brand');

    }
    
    public function destroy(Request $request, $id)
    {
        $model = Brand::find($id);
        $model->delete();
        session()->flash('msg','Brand Delete Successfully');
        return redirect('/brand');
    }
}
