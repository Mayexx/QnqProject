<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    public function product() {
        $category = category::all();
        return view ('admin.product', compact('category'));
    }
    public function uploadproduct(Request $request)
    {
        $data=new product;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imagename);
        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->quantity=$request->quantity;
        $data->category=$request->category;

        $data->save();

        return redirect()->back()->with('message',"Product Addedd Successfully!");
    }

    public function showproduct() {
        $data=product::all();
        $data = Product::with('category')->get();
        return view ('admin.showproduct', compact('data'));
    }
    public function deleteproduct($id) {
        $data = product::find($id);
        $data->delete();
        return redirect()->back()->with('message',"Product Deleted Successfully!");
    }
    public function updateview($id){
        $data = product::find($id);
        return view('admin.updateview', compact('data'));
    }
    public function updateproduct(Request $request, $id){
        $data=product::find($id);
        $image=$request->file;

        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('productimage',$imagename);
        $data->image=$imagename;
        }    
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->quantity=$request->quantity;

        $data->save();

        return redirect()->back()->with('message',"Product Updated Successfully!");
    }
    public function view_category (){
        $data=category::all();
        return view('admin.category',compact('data'));
    }
    public function add_category (Request $request){
        $data=new category;
        $data->category_name=$request->category;
        $data->save();

        return redirect()->back()->with('message','Category Added Successfully!!');
    }
    public function delete_category ($id){
        $data=category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Category Deleted Successfully!!');
    }
    public function dashboard() {
        return view ('admin.dashboard');
    }
}
