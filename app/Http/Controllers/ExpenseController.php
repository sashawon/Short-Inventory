<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class ExpenseController extends Controller
{
    public function index()
    {
        $result['data'] = DB::table('expenses')
                        ->leftJoin('products','products.id','=','expenses.product_id')
                        ->leftJoin('employees','employees.id','=','expenses.employee_id')
                        ->select('expenses.id', 'products.name as product_name', 'employees.e_id as employee_id', 'employees.name as employee_name', 'employees.room', 'expenses.mobile', 'expenses.qty', 'expenses.status', 'expenses.created_at')
                        ->get();
        return view('/expense',$result);
    }

    public function manage_expense(Request $request, $id='')
    {
        if ($id>0) {
            $arr = Expense::where(['id'=>$id])->get();

            $result['id'] = $arr['0']->id;
            $result['product_id'] = $arr['0']->product_id;
            $result['employee_id'] = $arr['0']->employee_id;
            $result['mobile'] = $arr['0']->mobile;
            $result['qty'] = $arr['0']->qty;
            $result['status'] = $arr['0']->status;
            
            $result['expense']=DB::table('expenses')->where('id','!=',$id)->get();
        } else {
            $result['id'] = 0;
            $result['product_id'] = '';
            $result['employee_id'] = '';
            $result['mobile'] = '';
            $result['qty'] = '';
            $result['status'] = '';

            $result['expense']=DB::table('expenses')->get();
        }

        $result['product']=DB::table('products')->where(['status'=>1])->get();
        $result['employee']=DB::table('employees')->where(['status'=>1])->get();
        
        return view('/manage_expense',$result);
    }

    public function manage_expense_process(Request $request)
    {
        $request->validate([
            'product_id'=>'required',
            'employee_id'=>'required'
        ]);

        if ($request->post('id')>0) {
            $model = Expense::find($request->post('id'));
            $msg = 'Expense Product Update Successfully';
        } else {
            $model = new Expense();
            $msg = 'Expense Product Add Successfully';
        }
        
        $model->product_id = $request->post('product_id');
        $model->employee_id = $request->post('employee_id');
        $model->mobile = $request->post('mobile');
        $assignQty = $request->post('qty');
        $model->qty = $assignQty;
        $model->status = $request->post('status');        

        $result['product']=DB::table('products')->where('id','=',$request->post('product_id'))->get();
        $result['expense']=DB::table('expenses')->where('id','=',$request->post('id'))->get();

        $expenseQty = $result['expense'][0]->qty;
        $totalProductQty = $result['product'][0]->qty;

        if ($expenseQty>$assignQty) {
            $totalExpenseQty = $expenseQty-$assignQty;
            $stoke = $totalProductQty+$totalExpenseQty;
        } elseif($expenseQty<$assignQty) {
            $totalExpenseQty = $assignQty-$expenseQty;
            $stoke = $totalProductQty-$totalExpenseQty;
        } else {
            $stoke = $totalProductQty;
        }

        if ($stoke>=0) {
            DB::table('products')->where('id','=',$request->post('product_id'))->update(['qty'=>$stoke]);
            $model->save();
            session()->flash('msg',$msg);
        } else {
            session()->flash('msg','Product Not Available');
        }

        return redirect('/expense');

    }

    public function destroy(Request $request, $id)
    {
        $model = Expense::find($id);
        $model->delete();
        session()->flash('msg','Expense Product Delete Successfully');
        return redirect('/expense');
    }

    public function assign()
    {
        $result['data'] = DB::table('expenses')
                        ->where('expenses.status','=','assign')
                        ->leftJoin('products','products.id','=','expenses.product_id')
                        ->leftJoin('employees','employees.id','=','expenses.employee_id')
                        ->select('expenses.id', 'products.name as product_name', 'employees.e_id as employee_id', 'employees.name as employee_name', 'employees.room', 'expenses.mobile', 'expenses.qty', 'expenses.status', 'expenses.created_at')
                        ->get();
        return view('/assign',$result);
    }

    public function manage_assign(Request $request, $id='')
    {
        if ($id>0) {
            $arr = Expense::where(['id'=>$id])->get();

            $result['id'] = $arr['0']->id;
            $result['product_id'] = $arr['0']->product_id;
            $result['employee_id'] = $arr['0']->employee_id;
            $result['mobile'] = $arr['0']->mobile;
            $result['qty'] = $arr['0']->qty;
            $result['status'] = $arr['0']->status;
            
            $result['expense']=DB::table('expenses')->where('id','!=',$id)->get();
        }

        $result['product']=DB::table('products')->where(['status'=>1])->get();
        $result['employee']=DB::table('employees')->where(['status'=>1])->get();
        
        return view('/manage_assign',$result);
    }

    public function manage_assign_process(Request $request)
    {
        if ($request->post('id')>0) {
            $model = Expense::find($request->post('id'));
            $msg = 'Assign Product Update Successfully';
        }
        
        $model->product_id = $request->post('product_id');
        $model->employee_id = $request->post('employee_id');
        $model->mobile = $request->post('mobile');
        $assignQty = $request->post('qty');
        $model->qty = $assignQty;
        $model->status = $request->post('status');
        

        $result['product']=DB::table('products')->where('id','=',$request->post('product_id'))->get();
        $result['expense']=DB::table('expenses')->where('id','=',$request->post('id'))->get();
        
        // echo "<pre>";
        // print_r($result['product']);
        // print_r($result['expense']);
        // die();

        $expenseQty = $result['expense'][0]->qty;
        $totalProductQty = $result['product'][0]->qty;

        if ($expenseQty>$assignQty) {
            $totalExpenseQty = $expenseQty-$assignQty;
            $stoke = $totalProductQty+$totalExpenseQty;
        } elseif($expenseQty<$assignQty) {
            $totalExpenseQty = $assignQty-$expenseQty;
            $stoke = $totalProductQty-$totalExpenseQty;
        } else {
            $stoke = $totalProductQty;
        }

        if ($stoke>=0) {
            DB::table('products')->where('id','=',$request->post('product_id'))->update(['qty'=>$stoke]);
            $model->save();
            session()->flash('msg',$msg);
        } else {
            session()->flash('msg','Product Not Available');
        }
        return redirect('/assign');
    }

    public function assign_destroy(Request $request, $id)
    {
        $model = Expense::find($id);
        $model->delete();
        session()->flash('msg','Assign Product Delete Successfully');
        return redirect('/assign');
    }


    public function repair()
    {
        $result['data'] = DB::table('expenses')
                        ->where('expenses.status','=','repair')
                        ->leftJoin('products','products.id','=','expenses.product_id')
                        ->leftJoin('employees','employees.id','=','expenses.employee_id')
                        ->select('expenses.id', 'products.name as product_name', 'employees.e_id as employee_id', 'employees.name as employee_name', 'employees.room', 'expenses.mobile', 'expenses.qty', 'expenses.status', 'expenses.created_at')
                        ->get();
        return view('/repair',$result);
    }

    public function manage_repair(Request $request, $id='')
    {
        if ($id>0) {
            $arr = Expense::where(['id'=>$id])->get();

            $result['id'] = $arr['0']->id;
            $result['product_id'] = $arr['0']->product_id;
            $result['employee_id'] = $arr['0']->employee_id;
            $result['mobile'] = $arr['0']->mobile;
            $result['qty'] = $arr['0']->qty;
            $result['status'] = $arr['0']->status;
            
            $result['expense']=DB::table('expenses')->where('id','!=',$id)->get();
        }

        $result['product']=DB::table('products')->where(['status'=>1])->get();
        $result['employee']=DB::table('employees')->where(['status'=>1])->get();
        
        return view('/manage_repair',$result);
    }

    public function manage_repair_process(Request $request)
    {
        if ($request->post('id')>0) {
            $model = Expense::find($request->post('id'));
            $msg = 'Repair Product Update Successfully';
        }
        
        $model->product_id = $request->post('product_id');
        $model->employee_id = $request->post('employee_id');
        $model->mobile = $request->post('mobile');
        $assignQty = $request->post('qty');
        $model->qty = $assignQty;
        $model->status = $request->post('status');
        

        $result['product']=DB::table('products')->where('id','=',$request->post('product_id'))->get();
        $result['expense']=DB::table('expenses')->where('id','=',$request->post('id'))->get();
        
        // echo "<pre>";
        // print_r($result['product']);
        // print_r($result['expense']);
        // die();

        $expenseQty = $result['expense'][0]->qty;
        $totalProductQty = $result['product'][0]->qty;

        if ($expenseQty>$assignQty) {
            $totalExpenseQty = $expenseQty-$assignQty;
            $stoke = $totalProductQty+$totalExpenseQty;
        } elseif($expenseQty<$assignQty) {
            $totalExpenseQty = $assignQty-$expenseQty;
            $stoke = $totalProductQty-$totalExpenseQty;
        } else {
            $stoke = $totalProductQty;
        }

        if ($stoke>=0) {
            DB::table('products')->where('id','=',$request->post('product_id'))->update(['qty'=>$stoke]);
            $model->save();
            session()->flash('msg',$msg);
        } else {
            session()->flash('msg','Product Not Available');
        }

        return redirect('/repair');
    }

    public function repair_destroy(Request $request, $id)
    {
        $model = Expense::find($id);
        $model->delete();
        session()->flash('msg','Repair Product Delete Successfully');
        return redirect('/repair');
    }

    public function damage()
    {
        $result['data'] = DB::table('expenses')
                        ->where('expenses.status','=','damage')
                        ->leftJoin('products','products.id','=','expenses.product_id')
                        ->leftJoin('employees','employees.id','=','expenses.employee_id')
                        ->select('expenses.id', 'products.name as product_name', 'employees.e_id as employee_id', 'employees.name as employee_name', 'employees.room', 'expenses.mobile', 'expenses.qty', 'expenses.status', 'expenses.created_at')
                        ->get();
        return view('/damage',$result);
    }

    public function manage_damage(Request $request, $id='')
    {
        if ($id>0) {
            $arr = Expense::where(['id'=>$id])->get();

            $result['id'] = $arr['0']->id;
            $result['product_id'] = $arr['0']->product_id;
            $result['employee_id'] = $arr['0']->employee_id;
            $result['mobile'] = $arr['0']->mobile;
            $result['qty'] = $arr['0']->qty;
            $result['status'] = $arr['0']->status;
            
            $result['expense']=DB::table('expenses')->where('id','!=',$id)->get();
        }

        $result['product']=DB::table('products')->where(['status'=>1])->get();
        $result['employee']=DB::table('employees')->where(['status'=>1])->get();
        
        return view('/manage_damage',$result);
    }

    public function manage_damage_process(Request $request)
    {
        if ($request->post('id')>0) {
            $model = Expense::find($request->post('id'));
            $msg = 'Damage Product Update Successfully';
        }
        
        $model->product_id = $request->post('product_id');
        $model->employee_id = $request->post('employee_id');
        $model->mobile = $request->post('mobile');
        $assignQty = $request->post('qty');
        $model->qty = $assignQty;
        $model->status = $request->post('status');
        

        $result['product']=DB::table('products')->where('id','=',$request->post('product_id'))->get();
        $result['expense']=DB::table('expenses')->where('id','=',$request->post('id'))->get();
        
        // echo "<pre>";
        // print_r($result['product']);
        // print_r($result['expense']);
        // die();

        $expenseQty = $result['expense'][0]->qty;
        $totalProductQty = $result['product'][0]->qty;

        if ($expenseQty>$assignQty) {
            $totalExpenseQty = $expenseQty-$assignQty;
            $stoke = $totalProductQty+$totalExpenseQty;
        } elseif($expenseQty<$assignQty) {
            $totalExpenseQty = $assignQty-$expenseQty;
            $stoke = $totalProductQty-$totalExpenseQty;
        } else {
            $stoke = $totalProductQty;
        }

        if ($stoke>=0) {
            DB::table('products')->where('id','=',$request->post('product_id'))->update(['qty'=>$stoke]);
            $model->save();
            session()->flash('msg',$msg);
        } else {
            session()->flash('msg','Product Not Available');
        }

        return redirect('/damage');
    }

    public function damage_destroy(Request $request, $id)
    {
        $model = Expense::find($id);
        $model->delete();
        session()->flash('msg','Damage Product Delete Successfully');
        return redirect('/damage');
    }
}
