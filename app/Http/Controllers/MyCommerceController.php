<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MyCommerceController extends Controller
{
    public function index(){
        return view('website.home.index',[
            'categories'=>Category::all(),
            'products'=>Product::orderBy('id','desc')->take(8)->get(),
        ]);
    }
    public function allProducts(){
        return view('website.products.index',['products'=>Product::orderBy('id', 'desc')->paginate(2)]);
    }
    public function category($id){
        return view('website.products.index', [
            'products' => Product::where('category_id', $id)->orderBy('id', 'desc')->paginate(9)
        ]);
        
    }
    public function subCategory($id){
        return view('website.products.index',['products'=>Product::where('sub_category_id',$id)->orderBy('id','desc')->paginate(9)]);
    }
    public function detail($id){
        return view('website.detail.index',['product'=>Product::find($id)]);
    }
}
