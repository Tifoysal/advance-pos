<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;
use App\Models\Category;

class ProductController extends FormRequest
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

       public function store(ProductRequest $request,ProductRepository $productRepository)
       {
        $productRepository->store($request);
          return redirect()->route('product.list')->with('success','Add Category Successfully');
       }

       public function update($id, ProductRequest $request,ProductRepository $productRepository)
       {
           $product=$productRepository->find($id);
           $productRepository->update($product, $request);
           return redirect()->back()->with('success', 'Product Updated Successfully.');
       }


}
