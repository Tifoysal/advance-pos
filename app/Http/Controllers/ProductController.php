<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Repositories\ProductRepository;
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
