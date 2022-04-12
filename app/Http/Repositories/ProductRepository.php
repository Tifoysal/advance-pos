<?php

namespace App\Repositories;

use http\Env\Request;
use http\Env\Response;

class CustomerRepository
{

    public function store($request)
    {
        $filename='';
        if ($request->hasfile('image')) {
           
            $file=$request->file('image');
            $filename=date('Ymdhms').'.'.$file->getClientOriginalExtension();
            $file->storeAs('/uploads',$filename);
            
        }

         $product= Product::create([
             'name'=>$request->name,
             'image'=>$request->filename,
             'category_id'=>$request->category,
             'price'=>$request->price,
             'sellers_price'=>$request->sellers_price,
             'details'=>$request->details,
         ]);
       return $product;
    }


    public function update($product,$request)
    {
        $product=Product::find($product);
     $filename=$product->image;
      if($request->hasfile('image'))
      {
          $file=$request->file('image');
          $filename=date('Ymdhms').'.'.$file->getclientOriginalExtension();
          $file->storeAs('/uploads',$filename);

      }
     if($product)
     {
        $product->update([
           'name'=>$request->name,
           'image'=>$request->filename,
           'category_id'=>$request->category,
           'price'=>$request->price,
           'sellers_price'=>$request->sellers_price,
           'details'=>$request->details,
        ]);
    }
}

}