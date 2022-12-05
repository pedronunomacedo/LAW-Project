<div class="product_wishlist_card row mb-3">
    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
        <a href="{{ route('product', ['product_id'=> $product->id]) }}"><img class="card-img-top w-100" src="https://cdn.pixabay.com/photo/2016/10/02/19/51/chip-1710300_960_720.png" alt="Card image cap"></a>
    </div>
    <div class="col-lg-7 col-md-6 mb-4 mb-lg-0">
        <p><strong>{{$product->prodname}}</strong></p>
        <p>Description:</p>
        <button type="button" class="btn btn-primary btn-md me-1 mt-5">
            <i class="fas fa-trash"></i>
        </button>
        <button type="button" class="btn btn-danger btn-md mt-5" onclick="addToShopCart({{ $product->id }})">
            <i class="fas fa-shopping-bag"></i>
        </button>
    </div>

    <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
        <p class="text-center">
            <strong>{{$product->price}} €</strong>
        </p>
    </div>
</div>


