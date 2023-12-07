<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
 public function cart_wishlist($wishlist_id){
     $vendor_id = Product::find(Wishlist::find($wishlist_id)->product_id)->user_id;

    if (Cart::where('user_id',auth()->id())->where('product_id',Wishlist::find($wishlist_id)->product_id)->exists()) {
        Cart::where('user_id',auth()->id())->where('product_id',Wishlist::find($wishlist_id)->product_id)->increment('amount',1);
    } else {
        Cart::insert([
            'user_id'=>auth()->id(),
            'vendor_id'=> $vendor_id ,
            'product_id'=>Wishlist::find($wishlist_id)->product_id,
            'created_at'=>Carbon::now(),
        ]);

    }

     Wishlist::find($wishlist_id)->delete();
     return back();
 }
 public function add_cart(Request $request, $product_id){

     if(Product::find($product_id)->product_quantity<$request->qtybutton){
         return back()->with('stockout','Stock Not Available');
     }else{

        if (Cart::where('user_id',auth()->id())->where('product_id',$product_id)->exists()) {
            if(Product::find($product_id)->product_quantity<( Cart::where('user_id',auth()->id())->where('product_id',$product_id)->first()->amount+$request->qtybutton)){
                return back()->with('stockout','Already in the cart!');
            }else{
            Cart::where('user_id',auth()->id())->where('product_id',$product_id)->increment('amount',$request->qtybutton);
            }

        } else {
         Cart::insert([
             'user_id'=>Auth()->id(),
             'vendor_id'=>Product::find($product_id)->user_id,
             'product_id'=> $product_id,
             'amount'=>$request->qtybutton,
             'created_at'=>Carbon::now(),
         ]);
        }
     }

    return back();
 }
 public function cart(){
     return view ('frontend.cart');
 }

 public function clear_shop_cart($user_id){
     Cart::where('user_id',$user_id)->delete();
     return back();
 }
 public function cart_remove($cart_id){
           Cart::find($cart_id)->delete();
           return back();
 }
 public function cart_update (Request $request){
               foreach ($request->qtybutton as $cart_id=>$updated_amount) {
               Cart::find($cart_id)->update([
                   'amount'=> $updated_amount,
               ]);
               }
               return back();
 }

}

