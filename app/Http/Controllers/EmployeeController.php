<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        $result['data'] = Employee::all();
        return view('/employee',$result);
    }

    public function status(Request $request, $status, $id)
    {
        $model = Employee::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('msg','Employee Status Update Successfully');
        return redirect('/employee');
    }

    public function manage_employee(Request $request, $id='')
    {
        if ($id>0) {
            $arr = Employee::where(['id'=>$id])->get();

            $result['id'] = $arr['0']->id;
            $result['e_id'] = $arr['0']->e_id;
            $result['name'] = $arr['0']->name;
            $result['email'] = $arr['0']->email;
            $result['mobile'] = $arr['0']->mobile;
            $result['address'] = $arr['0']->address;
            $result['designation'] = $arr['0']->designation;
            $result['room'] = $arr['0']->room;
            
            $result['employee']=DB::table('employees')->where(['status'=>1])->where('id','!=',$id)->get();
        } else {
            $result['id'] = 0;
            $result['e_id'] = '';
            $result['name'] = '';
            $result['email'] = '';
            $result['mobile'] = '';
            $result['address'] = '';
            $result['designation'] = '';
            $result['room'] = '';

            $result['employee']=DB::table('employees')->where(['status'=>1])->get();
        }
        
        return view('/manage_employee',$result);
    }

    public function manage_employee_process(Request $request)
    {
        $request->validate([
            'e_id'=>'required',
            'name'=>'required'
        ]);

        if ($request->post('id')>0) {
            $model = Employee::find($request->post('id'));
            $msg = 'Employee Update Successfully';
        } else {
            $model = new Employee();
            $msg = 'Employee Add Successfully';
        }
        
        $model->e_id = $request->post('e_id');
        $model->name = $request->post('name');
        $model->email = $request->post('email');
        $model->mobile = $request->post('mobile');
        $model->address = $request->post('address');
        $model->designation = $request->post('designation');
        $model->room = $request->post('room');
        $model->status = 1;
        $model->save();
        session()->flash('msg',$msg);
        return redirect('/employee');

    }

    public function destroy(Request $request, $id)
    {
        $model = Employee::find($id);
        $model->delete();
        session()->flash('msg','Employee Delete Successfully');
        return redirect('/employee');
    }
}
