<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
         if(Category::where('status','show')->count()==0){
            $category=Category::latest()->limit(3)->get();

         }else{
            $category=Category::where('status','show')->get();
         }
        $all_product= Product::all();
        return view('frontend.index',compact('category','all_product'));
    }
    public function product_details($slug){
        $wishlist_status= Wishlist::where('user_id',Auth()->id())->where('product_id',Product::where('product_slug',$slug)->first()->id)->exists();
        if($wishlist_status){
            $wishlist_id= Wishlist::where('user_id',Auth()->id())->where('product_id',Product::where('product_slug',$slug)->first()->id)->first()->id;
        }else{
            $wishlist_id="";
        }
    //    $wishlist_id= Wishlist::where('user_id',Auth()->id())->where('product_id',Product::where('product_slug',$slug)->first()->id)->first()->id;

          return view('frontend.productdetails',[
          'single_product_details'=>Product::where('product_slug',$slug)->firstOrFail(),
           'related_product'=>product::where('product_slug','!=', $slug)->where('category_id',Product::where('product_slug',$slug)->firstOrFail()->category_id)->get(),
           'wishlist_status'=>$wishlist_status,
           'wishlist_id'=>$wishlist_id
          ]);
    }
    public function categorywiseproducts($category_id){
        Category::find($category_id)->category_name;
          return view('frontend.categorywiseproduct',[
              'all_count'=>Category::count(),
              'categorywiseproduct'=>Product::where('category_id',$category_id)->get(),
              'category_name'=> Category::find($category_id)->category_name,
          ]);
    }
}

