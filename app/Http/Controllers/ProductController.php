<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function productlist(){
        
        $products=Product::all();
        $categories=Category::all();
        return view('admin.layouts.product.list',compact('products','categories'));

    }

    public function productcategory(){
        $categories=Category::all();
        return view('admin.layouts.product.create',compact('categories'));
       }

       public function store(Request $request){
        //    dd($request->all());

         // dd(date('Ymdhms'));
         $filename='';
         if ($request->hasfile('image')) {
            
             $file=$request->file('image');
             $filename=date('Ymdhms').'.'.$file->getClientOriginalExtension();
             $file->storeAs('/uploads',$filename);
            //  dd($filename);
            //   dd($request->all());
             
         }

          Product::create([
              'name'=>$request->name,
              'image'=>$request->filename,
              'category_id'=>$request->category,
              'price'=>$request->price,
              'sellers_price'=>$request->sellers_price,
              'details'=>$request->details,
          ]);
          return redirect()->route('product.list')->with('success','Add Category Successfully');
       }


    //product details

    public function productdetails($product_id){


        
        $products = Product::find($product_id);
        return view('admin.layouts.product.details', compact('products'));
     
}


     //delete
       public function deleteproduct($product_id){
    

        Product::find($product_id)->delete();
        return redirect()->back()->with('success','Product deleted sucessfully');
    }

}
