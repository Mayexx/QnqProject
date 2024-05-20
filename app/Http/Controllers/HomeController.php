<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Category;




class HomeController extends Controller
{
    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype=='1')
        {
            return view('admin.home');
        }
        else
        {
            $data = product::paginate(8);
            $category = category::all();
            return view('user.home', compact('data', 'category'));
        }
    }
    public function index(){
        if(Auth::id())
        {
            return redirect('redirect');
        }
    else 
        {
            $data = product::paginate(8);
            $category = category::all();
            return view('user.home', compact('data','category'));
        }    
    }
    public function search(Request $request){
        $search=$request->search;
        $data = Product::where('title','Like','%'.$search.'%')->get();
        $category = category::all();
        return view('user.home',compact('data', 'category'));
    }
    public function product_details($id){
        $data = product::find($id);
        $category = category::all();
        return view('user.product_details',compact('data', 'category'));
    }
    public function add_cart(Request $request, $id){
        if(Auth::id()){
            $user=Auth::user();
            $data=product::find($id);

            $cart=new cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->userID=$user->id;
            $cart->phoneNumber=$user->phoneNumber;
            $cart->address=$user->address;

            $cart->product_title=$data->title;
            $cart->image=$data->image;
            $cart->price=$data->price * $request->quantity;
            $cart->productID=$data->id;
            $cart->quantity=$request->quantity;

            $cart->save();

            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }
    public function show_cart(){
        if(Auth::id()){
        $id=Auth::user()->id;
        $cart=cart::where('userID','=',$id)->get();
        $category = category::all();
        return view('user.showcart', compact('cart', 'category'));
        }
        else {
        return redirect('login');
        }
    }
    public function remove_cart($id){
        $cart=cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
    public function cash_order(){
        $user=Auth::user();
        $userID=$user->id;
        $data=cart::where('userID','=',$userID)->get();
        foreach($data as $data){
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phoneNumber=$data->phoneNumber;
            $order->userID=$data->userID;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->productID=$data->productID;


            $order->payment_status='Cash on Delivery';
            $order->delivery_status='Out for Delivery';

            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message','We have received your order. We will connect with you soon...'); 
    }
}
