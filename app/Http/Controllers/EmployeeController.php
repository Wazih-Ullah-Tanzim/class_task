<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function create(){
        return view('employee.create');

    }



    public function store(Request $req){
        //elloquent ORM model
      /*  $obj=new Employee();
        $obj->name=$req->name;
        $obj->email=$req->email;
        $obj->birth_date=$req->birth_date;
        $obj->salary=$req->salary;
        $obj->department = $req->department;
        $obj->gender=$req->gender;
        $obj->address=$req->address;*/
        if($req->status){
            $status = 1;

        }
        else{
            $status = 0;
        }
        // $obj->status = $status;

        /* if ($obj->save()) {
            echo 'Successfully Inserted';
        } */
        // //end elloquent ORM


        //Query builder
        DB::table('employees')->insert([

            'name'=>$req->name,
            'email'=>$req->email,
            'birth_date'=>$req->birth_date,
            'salary'=>$req->salary,
            'department' => $req->department,
            'gender'=>$req->gender,
            'address'=>$req->address,
            'status'=>$status

        ]);
        echo 'Successfully Inserted';

        //Query builder




    }
    public function all(){

    $employees= DB:: table('employees')->get();

    return view('employee.all',compact('employees'));

    }
    public function edit($id){
        $employee=Employee::find($id);
        return view('employee.edit',compact('employee'));

    }
    public function update($id,Request $req){
          //elloquent ORM model
        $obj = Employee::find($id);
        $obj->name=$req->name;
        $obj->email=$req->email;
        $obj->birth_date=$req->birth_date;
        $obj->salary=$req->salary;
        $obj->department = $req->department;
        $obj->gender=$req->gender;
        $obj->address=$req->address;
        if($req->status){
            $status = 1;

        }
        else{
            $status = 0;
        }
        $obj->status = $status;

        if ($obj->save()) {
            return redirect('employees');
        }

    }
    public function delete($id)
    {
        Employee::find($id)->delete();
        return redirect('employees');
    }
}
