<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Model\Employee;
use Illuminate\Http\Request;
use Image;
// use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee=Employee::all();
        return response()->json($employee);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'email' => 'required|max:255',
            
        ]);
        if($request->photo){



            $position= strpos($request->photo, ';');
            $sub=substr($request->photo, 0, $position);
            $ext=explode('/', $sub)[1];
            $name=time().".".$ext;
            $img=Image::make($request->photo)->resize(240,200);
            $upload_path='backend/employee/';
            $image_url=$upload_path.$name;
            $img->save($image_url);

             Employee::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'address' => $request->address,
            'salary' => $request->salary,
            'joining_date' => $request->joiningDate,
            'nid' => $request->nid,
            'phone_number' => $request->phoneNumber,
            'photo' => $image_url
    ]);

        }else{
            Employee::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'address' => $request->address,
            'salary' => $request->salary,
            'joining_date' => $request->joiningDate,
            'nid' => $request->nid,
            'phone_number' => $request->phoneNumber,
          
            ]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Employee::find($id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image=$request->newPhoto;
        if($image){
            $position= strpos($image, ';');
            $sub=substr($image, 0, $position);
            $ext=explode('/', $sub)[1];
            $name=time().".".$ext;
            $img=Image::make($image)->resize(240,200);
            $upload_path='backend/employee/';
            $image_url=$upload_path.$name;
            $success=$img->save($image_url);
            if($success){
                $img=Employee::find($id)->first();
                $image_path=$img->photo;
                $done=unlink($image_path);
                $update=Employee::find($id)->update([
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'email' => $request->email,
                    'address' => $request->address,
                    'salary' => $request->salary,
                    'joining_date' => $request->joiningDate,
                    'nid' => $request->nid,
                    'phone_number' => $request->phoneNumber,
                    'photo'=>$image_url
                ]);
            }else{
                $update=Employee::find($id)->update([
                    'fname' => $request->fname,
                    'lname' => $request->lname,
                    'email' => $request->email,
                    'address' => $request->address,
                    'salary' => $request->salary,
                    'joining_date' => $request->joiningDate,
                    'nid' => $request->nid,
                    'phone_number' => $request->phoneNumber,
                    'photo'=>$request->photo
                     ]);

            }

        }
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee=Employee::find($id)->first();
        $photo=$employee->photo;
        if($photo){
            unlink($photo);
            Employee::find($id)->delete();

        }else{
            Employee::find($id)->delete();
        }
    }
}
