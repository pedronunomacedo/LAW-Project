<div class="product_wishlist_card row mb-3">
    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
        <a href="{{ route('product', ['product_id'=> $product->id]) }}"><img class="card-img-top w-100" src="https://cdn.pixabay.com/photo/2016/10/02/19/51/chip-1710300_960_720.png" alt="Card image cap"></a>
    </div>
    <div class="col-lg-7 col-md-6 mb-4 mb-lg-0">
        <p><strong>{{$product->prodname}}</strong></p>
        <p>Description:</p>
        <div class="d-flex mt-5" style="max-width: 200px">
            <button class="btn btn-primary px-3 me-2"
            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
            <i class="fas fa-minus"></i>
            </button>

            <div class="form-outline">
                <input id="form1" min="0" name="quantity" value="1" type="number" class="form-control" />
            </div>

            <button class="btn btn-primary px-3 ms-2"
            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
            <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>

    <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
        <p class="text-center">
            <strong>{{$product->price}} €</strong>
        </p>
        <button type="button" class="btn btn-primary btn-md m-5">
            <i class="fas fa-trash"></i>
        </button>
    </div>
</div>