<div class="card mx-1" style="width: 18rem; ">
    <a href="{{ route('product', ['product_id'=> $product->id]) }}"><img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/10/02/19/51/chip-1710300_960_720.png" alt="Card image cap"></a>
    <div class="card-body">
        <a href="{{ route('product', ['product_id'=> $product->id]) }}"><h5 class="card-title">{{$product->prodname}}</h5></a>
        <p>Price: {{ $product->price }} €</p>
        <div class="ratings">
            <?php
            for ($x = 0; $x < $product->score; $x++) {?> 
                <i class="fa fa-star rating-color"></i>
            <?php } ?>
            <?php
            for ($x = 0; $x <= 4 - $product->score; $x++) {?> 
                <i class="fa fa-star"></i>
            <?php } ?>
        </div>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <div>
            <button class="btn" onclick="addToWishlist({{ $product->id }})"><i class="fas fa-star"></i></button>
            <button class="btn" onclick="addToShopCart({{ $product->id }})"><i class="fas fa-shopping-bag"></i></button>
        </div>
    </div>
</div>

