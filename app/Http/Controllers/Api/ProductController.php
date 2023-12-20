<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\Product;

use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Product::with('category','supplier')->get());
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
            'category_id' => 'required',
            'productName' => 'required|max:255',
            'productCode' => 'required|max:255',
            
        ]);
        if($request->photo){



            $position= strpos($request->photo, ';');
            $sub=substr($request->photo, 0, $position);
            $ext=explode('/', $sub)[1];
            $name=time().".".$ext;
            $img=Image::make($request->photo)->resize(240,200);
            $upload_path='backend/product/';
            $image_url=$upload_path.$name;
            $img->save($image_url);

             Product::create([
            'category_id' => $request->category_id,
            'product_name' => $request->productName,
            'product_code' => $request->productCode,
            'stock' => $request->stock,
            'buying_price' => $request->buyingPrice,  
            'selling_price' => $request->sellingPrice,  
            'supplier_id' => $request->supplier_id,  
            'buying_date' => $request->buyingDate,  
            'product_quantity' => $request->productQuantity,  
            'image' => $image_url
    ]);

        }else{
             Product::create([
            'category_id' => $request->category_id,
            'product_name' => $request->productName,
            'product_code' => $request->productCode,
            'stock' => $request->stock,
            'buying_price' => $request->buyingPrice,  
            'selling_price' => $request->sellingPrice,  
            'supplier_id' => $request->supplier_id,  
            'buying_date' => $request->buyingDate,  
            'product_quantity' => $request->productQuantity, 
          
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
         return response()->json(Product::find($id)->first());
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
            $upload_path='backend/product/';
            $image_url=$upload_path.$name;
            $success=$img->save($image_url);
            if($success){
                $img=Product::find($id)->first();
                $image_path=$img->image;
                $done=unlink($image_path);
                $update=Product::find($id)->update([
                    'category_id' => $request->category_id,
                    'product_name' => $request->productName,
                    'product_code' => $request->productCode,
                    'stock' => $request->stock,
                    'buying_price' => $request->buyingPrice,  
                    'selling_price' => $request->sellingPrice,  
                    'supplier_id' => $request->supplier_id,  
                    'buying_date' => $request->buyingDate,  
                    'product_quantity' => $request->productQuantity,  
                    'image' => $image_url
                ]);
            }

        }else{
                $update=Product::find($id)->update([
                    'category_id' => $request->category_id,
                    'product_name' => $request->productName,
                    'product_code' => $request->productCode,
                    'stock' => $request->stock,
                    'buying_price' => $request->buyingPrice,  
                    'selling_price' => $request->sellingPrice,  
                    'supplier_id' => $request->supplier_id,  
                    'buying_date' => $request->buyingDate,  
                    'product_quantity' => $request->productQuantity,  
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
         $product=Product::find($id)->first();
        $photo=$product->image;
        if($photo){
            unlink($photo);
            Product::find($id)->delete();

        }else{
            Product::find($id)->delete();
        }
    
    }
}
