<?php
 use App\Models\Product;
 use App\Models\User;

function allwishlist(){
    return App\Models\Wishlist::where('user_id', Auth()->id())->get();
}
function wishlistcheck($all_products_id){
    return App\Models\Wishlist::where('user_id',Auth()->id())->where('product_id',$all_products_id)->exists();

}
function allcarts(){
    return App\Models\Cart::where('user_id',Auth()->id())->get();
}
function carttotalproduct(){
    return App\Models\Cart::where('user_id',Auth()->id())->count();
}
function getvendorname($product_id){
    return User::find(Product::find($product_id)->user_id)->name;
}
function available_quantity($product_id){
 return Product::find($product_id)->product_quantity;
}
?>
