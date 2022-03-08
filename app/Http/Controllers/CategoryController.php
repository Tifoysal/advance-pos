<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function list_category(){
        $categories = Category::all();

return view('admin.layouts.category.list', compact('categories'));


    }


    public function add_category(){
    return view('admin.layouts.category.create');

    }
    public function store_category(Request $request){
        Category::create([
            'name'=>$request->name,
            'details'=>$request->details
          
           ]);

           return redirect()->back()->with('success','Add Category Successfully');

    }


    public function details_category($category_id){


        
            $categories = Category::find($category_id);
            return view('admin.layouts.category.view', compact('categories'));
         
    }

    public function edit_category($category_id){
         $categories=Category::find($category_id);
        $data=category::all();
       return view('admin.layouts.category.edit', compact('categories', ('data')));
   }
   public function update_category(Request $request, $category_id){
       $data=category::all();
       Category::where('id', $category_id)->update([

           'name'=>$request->name,
           'details'=>$request->details,

       ]);
       return redirect()->back()->with('success','Updated Category Successfully');
}

public function delete_category($category_id){
    

        category::find($category_id)->delete();
        return redirect()->back()->with('success','Category Deleted.');
    }


}

    


