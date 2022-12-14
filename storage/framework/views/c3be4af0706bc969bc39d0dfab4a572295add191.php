<div class="product_wishlist_card row mb-3">
    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
        <a href="<?php echo e(route('product', ['product_id'=> $product->id])); ?>"><img class=" w-100" src="<?php echo e($product->imgpath); ?>" alt="Card image cap"></a>
    </div>
    <div class="col-lg-7 col-md-6 mb-4 mb-lg-0">
        <p><strong><?php echo e($product->prodname); ?></strong></p>
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
            <strong><?php echo e($product->price); ?> €</strong>
        </p>
        <button type="button" class="btn btn-primary btn-md m-5">
            <i class="fas fa-trash"></i>
        </button>
    </div>
</div><?php /**PATH /Users/pedromacedo/Desktop/lbaw2284/resources/views/partials/product_shopcart_card.blade.php ENDPATH**/ ?>