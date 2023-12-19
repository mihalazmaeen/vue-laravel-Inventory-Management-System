<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\Supplier;
use Image;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier=Supplier::all();
        return response()->json($supplier);
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
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            
        ]);
        if($request->photo){



            $position= strpos($request->photo, ';');
            $sub=substr($request->photo, 0, $position);
            $ext=explode('/', $sub)[1];
            $name=time().".".$ext;
            $img=Image::make($request->photo)->resize(240,200);
            $upload_path='backend/supplier/';
            $image_url=$upload_path.$name;
            $img->save($image_url);

             Supplier::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phoneNumber,
            'shopname' => $request->shopName,  
            'photo' => $image_url
    ]);

        }else{
            Supplier::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phoneNumber,
            'shopname' => $request->shopName, 
          
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
        return response()->json(Supplier::find($id)->first());
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
            $upload_path='backend/supplier/';
            $image_url=$upload_path.$name;
            $success=$img->save($image_url);
            if($success){
                $img=Supplier::find($id)->first();
                $image_path=$img->photo;
                $done=unlink($image_path);
                $update=Supplier::find($id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'address' => $request->address,
                    'phone' => $request->phoneNumber,
                    'shopname' => $request->shopName,  
                    'photo' => $image_url
                ]);
            }

        }else{
                $update=Supplier::find($id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'address' => $request->address,
                    'phone' => $request->phoneNumber,
                    'shopname' => $request->shopName, 
                    'photo'=>$request->photo
                     ]);

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
        $employee=Supplier::find($id)->first();
        $photo=$employee->photo;
        if($photo){
            unlink($photo);
            Supplier::find($id)->delete();

        }else{
            Supplier::find($id)->delete();
        }
    }
}
