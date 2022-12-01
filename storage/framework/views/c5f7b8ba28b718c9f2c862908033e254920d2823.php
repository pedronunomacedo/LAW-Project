<div class="card mx-1" style="width: 18rem;">
    <a href="<?php echo e(route('product', ['product_id'=> $product->id])); ?>"><img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/10/02/19/51/chip-1710300_960_720.png" alt="Card image cap"></a>
    <div class="card-body">
        <a href="<?php echo e(route('product', ['product_id'=> $product->id])); ?>"><h5 class="card-title"><?php echo e($product->prodname); ?></h5></a>
        <p>Price: <?php echo e($product->price); ?> €</p>
        <p>Rating: <?php echo e($product->score); ?> </p>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <div>
            <button class="btn" onclick="addToWishlist(<?php echo e($product->id); ?>)"><i class="fas fa-star"></i></button>
            <button class="btn" onclick="addToShopCart(<?php echo e($product->id); ?>)"><i class="fas fa-shopping-bag"></i></button>
        </div>
    </div>
</div>

<?php /**PATH /Users/pedromacedo/Desktop/pedroLBAW/3rd-try/lbaw2284/resources/views/partials/product_card.blade.php ENDPATH**/ ?>