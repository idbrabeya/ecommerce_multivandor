<div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
data-aos-delay="200">
<!-- Single Prodect -->
<div class="product">
    <div class="thumb">
        <a href="single-product.html" class="image">
            <img src="{{asset('uploads/product_photos')}}/{{ $all_products->product_photo }}" alt="Product" />
        </a>

        <div class="actions">
            <a href="" class="action wishlist" title="Wishlist">
                <i class="fa {{ (wishlistcheck($all_products->id))?'fa-heart text-danger':'fa-heart-o' }} fa-heart text-danger"></i>
                {{-- @if(wishlistcheck($all_products->id))
                <i class="fa fa-heart text-danger"></i>
             @else
             <i class="fa fa-heart-o"></i>
             @endif --}}
            </a>

            <a href="#" class="action quickview" data-link-action="quickview"
                title="Quick view" data-bs-toggle="modal"
                data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
            <a href="compare.html" class="action compare" title="Compare"><i
                    class="pe-7s-refresh-2"></i></a>
        </div>
        <button title="Add To Cart" class=" add-to-cart">Add
            To Cart</button>
    </div>
    <div class="content">
        <span class="ratings">
            <span class="rating-wrap">
                <span class="star" style="width: 100%"></span>
            </span>
            <span class="rating-num">{{ wishlistcheck($all_products->id) }}( 5 Review )</span>
        </span>
        <h5 class="title"><a href="{{url('product/details')}}/{{$all_products->product_slug}}">{{$all_products->product_name}}
            </a>
        </h5>
        <span class="price">
            <span class="new">${{ $all_products->product_price}}</span>
        </span>
        <span class="price">
            <span class="new">Vendor:{{ App\Models\User::find($all_products->user_id)->name}}</span>
        </span>
    </div>
</div>
</div>
