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
        $products = Product::where('status', 1)->orderBy('id', 'desc')->paginate(9);
        return view('website.products.index',['products'=>$products]);
    }
    public function category($id){
        $products = Product::where('category_id',$id)->where('status',1)->orderBy('id','desc')->paginate(9);
        return view('website.products.index', [
            'products' => $products,
        ]);
        
    }
    public function subCategory($id){
        $products = Product::where('sub_category_id',$id)->where('status',1)->orderBy('id','desc')->paginate(9);
        return view('website.products.index',['products'=>$products]);
    }

    public function detail($id) {
        $product = Product::find($id);
        $product->hit_count += 1;
        $product->save();

        $relatedProducts = Product::where('category_id', $product->category_id)
                           ->where('id', '!=', $id)
                           ->orderBy('id', 'desc')
                           ->limit(4)
                           ->get();
    
        return view('website.detail.index', [
            'product' => $product,
            'products' => $relatedProducts
        ]);
    }

    public function contact(){
        return view('website.contact.index');
    }

    public function about(){
        return view('website.about.index');
    }

    public function blog(){
        return view('website.blog.index');
    }

    public function blogDetail($id){
        // $blog = Blog::find($id);
        return view('website.blog.detail');
    }
    
}
