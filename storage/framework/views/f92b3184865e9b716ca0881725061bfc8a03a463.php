<div class="product_card mx-1" style="width: 18rem;">
    <div class="product_card_img"><a style="display: block" href="<?php echo e(route('product', ['product_id'=> $product->id])); ?>"><img src="<?php echo e($product->imgpath); ?>" alt="Card image cap"></a></div>
    <h5 class="product_card_name"><a href="<?php echo e(route('product', ['product_id'=> $product->id])); ?>"><?php echo e($product->prodname); ?></a></h5>
    <div class="product_card_desc text-muted small my-1"><?php echo e($product->proddescription); ?></div>
    <div class="product_card_ratings">
        <?php
        for ($x = 0; $x < $product->score; $x++) {?> 
            <i class="fa fa-star rating-color"></i>
        <?php } ?>
        <?php
        for ($x = 0; $x <= 4 - $product->score; $x++) {?> 
            <i class="fa fa-star"></i>
        <?php } ?>
    </div>
    <p class="product_card_price mb-1"><strong><?php echo e($product->price); ?> €</strong></p>
    <div class="product_card_btn my-2">
        <button class="btn p-0" onclick="addToWishlist(<?php echo e($product->id); ?>)"><i class="fas fa-heart"></i> Wishlist</button>
        <button class="btn p-0 mx-4" onclick="addToShopCart(<?php echo e($product->id); ?>)"><i class="fas fa-shopping-cart"></i> Cart</button>
    </div>
</div>

<?php /**PATH /Users/pedromacedo/Desktop/lbaw2284/resources/views/partials/product_card.blade.php ENDPATH**/ ?>