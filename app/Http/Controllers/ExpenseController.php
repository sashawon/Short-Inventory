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
                        ->select('expenses.id', 'products.name as product_name', 'employees.e_id as employee_id', 'employees.name as employee_name', 'employees.room', 'expenses.mobile', 'expenses.qty', 'expenses.created_at')
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
            
            $result['expense']=DB::table('expenses')->where('id','!=',$id)->get();
        } else {
            $result['id'] = 0;
            $result['product_id'] = '';
            $result['employee_id'] = '';
            $result['mobile'] = '';
            $result['qty'] = '';

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
            $msg = 'Expense Update Successfully';
        } else {
            $model = new Expense();
            $msg = 'Expense Add Successfully';
        }
        
        $model->product_id = $request->post('product_id');
        $model->employee_id = $request->post('employee_id');
        $model->mobile = $request->post('mobile');
        $model->qty = $request->post('qty');
        $model->save();
        session()->flash('msg',$msg);
        return redirect('/expense');

    }

    public function destroy(Request $request, $id)
    {
        $model = Expense::find($id);
        $model->delete();
        session()->flash('msg','Expense Delete Successfully');
        return redirect('/expense');
    }
}
