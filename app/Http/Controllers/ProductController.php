<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class ProductController extends Controller
{
    public function index()
    {
        $result['data'] = DB::table('products')
                        ->leftJoin('categories','categories.id','=','products.category_id')
                        ->leftJoin('brands','brands.id','=','products.brand_id')
                        ->select('products.id', 'products.sku', 'products.name', 'products.slug', 'categories.category_name', 'brands.brand_name', 'products.type', 'products.qty', 'products.desc', 'products.m_date', 'products.exp_date', 'products.status', 'products.created_at')
                        ->get();
        // echo "<pre>";
        // print_r($result);
        // die();
        return view('/product',$result);
    }

    public function status(Request $request, $status, $id)
    {
        $model = Product::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('msg','Product Status Update Successfully');
        return redirect('/product');
    }

    public function manage_product(Request $request, $id='')
    {
        if ($id>0) {
            $arr = Product::where(['id'=>$id])->get();

            $result['id'] = $arr['0']->id;
            $result['sku'] = $arr['0']->sku;
            $result['name'] = $arr['0']->name;
            $result['slug'] = $arr['0']->slug;
            $result['category_id'] = $arr['0']->category_id;
            $result['brand_id'] = $arr['0']->brand_id;
            $result['type'] = $arr['0']->type;
            $result['qty'] = $arr['0']->qty;
            $result['desc'] = $arr['0']->desc;            
            $result['m_date'] = $arr['0']->m_date;            
            $result['exp_date'] = $arr['0']->exp_date;            
            $result['status'] = $arr['0']->status;
        } else {
            $result['id'] = 0;
            $result['sku'] = '';
            $result['name'] = '';
            $result['slug'] = '';
            $result['category_id'] = '';
            $result['brand_id'] = '';
            $result['type'] = '';
            $result['qty'] = '';
            $result['desc'] = '';
            $result['m_date'] = '';
            $result['exp_date'] = '';
            $result['status'] = '';

        }

        /*echo "<pre>";
        print_r($result);
        die();*/

        $result['category']=DB::table('categories')->where(['status'=>1])->get();
        $result['brands']=DB::table('brands')->where(['status'=>1])->get();

        return view('/manage_product',$result);
    }

    public function manage_product_process(Request $request)
    {
        //return $request->post(); 
        //echo "<pre>";
        //print_r($request->post());
        //die();

        $request->validate([
            'name'=>'required',
            'sku'=>'required|unique:products,sku,'.$request->post('id'),
            'slug'=>'required|unique:products,slug,'.$request->post('id'),
        ]);

        if ($request->post('id')>0) {
            $model = Product::find($request->post('id'));
            $msg = 'Product Update Successfully';
        } else {
            $model = new Product();
            $msg = 'Product Add Successfully';
        }
        
        $model->name = $request->post('name');
        $model->sku = $request->post('sku');
        $model->slug = $request->post('slug');
        $model->category_id = $request->post('category_id');
        $model->brand_id = $request->post('brand_id');
        $model->type = $request->post('type');
        $model->qty = $request->post('qty');
        $model->desc = $request->post('desc');
        $model->m_date = $request->post('m_date');
        $model->exp_date = $request->post('exp_date');
        $model->status = 1;
        $model->save();
        $pid = $model->id;

        $model->save();
        session()->flash('msg',$msg);
        return redirect('/product');

    }
    
    public function destroy(Request $request, $id)
    {
        $model = Product::find($id);
        $model->delete();
        session()->flash('msg','Product Delete Successfully');
        return redirect('/product');
    }
}
