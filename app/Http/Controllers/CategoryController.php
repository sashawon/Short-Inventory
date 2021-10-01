<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $result['data'] = Category::all();
        return view('/category',$result);
    }

    public function status(Request $request, $status, $id)
    {
        $model = Category::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('msg','Category Status Update Successfully');
        return redirect('/category');
    }

    public function manage_category(Request $request, $id='')
    {
        if ($id>0) {
            $arr = Category::where(['id'=>$id])->get();

            $result['id'] = $arr['0']->id;
            $result['category_name'] = $arr['0']->category_name;
            
            $result['category']=DB::table('categories')->where(['status'=>1])->where('id','!=',$id)->get();
        } else {
            $result['id'] = 0;
            $result['category_name'] = '';

            $result['category']=DB::table('categories')->where(['status'=>1])->get();
        }
        
        return view('/manage_category',$result);
    }

    public function manage_category_process(Request $request)
    {
        $request->validate([
            'category_name'=>'required'
        ]);

        if ($request->post('id')>0) {
            $model = Category::find($request->post('id'));
            $msg = 'Category Update Successfully';
        } else {
            $model = new Category();
            $msg = 'Category Add Successfully';
        }
        
        $model->category_name = $request->post('category_name');
        $model->status = 1;
        $model->save();
        session()->flash('msg',$msg);
        return redirect('/category');

    }

    public function destroy(Request $request, $id)
    {
        $model = Category::find($id);
        $model->delete();
        session()->flash('msg','Category Delete Successfully');
        return redirect('/category');
    }

}
