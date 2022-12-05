<?php $__env->startSection('title', 'Tech4You'); ?>

<?php $__env->startSection('content'); ?>

<ol class="breadcrumb" style="margin-left: 10px">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item active"><?php echo e($product->prodname); ?></li>
</ol>

<h1 style="margin-left: 10px"><?php echo e($product->prodname); ?></h1>

<div class="container">
    <?php $__currentLoopData = $productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <img src="https://cdn.pixabay.com/photo/2016/10/02/19/51/chip-1710300_960_720.png" />
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <div id="productDescription">
        <h2>Description</h2>
        <p><?php echo e($product->proddescription); ?></p>
    </div>
    <div id="productInfo">
        <h5 style="color: red">Price: <?php echo e($product->price); ?> €</h5>
        <h6>Score: <?php echo e($product->score); ?></h6>
    </div>
    <div id="generalInfo">
        <p>Pick up on the store in 15 min. <strong>(FREE)</p>
    </div>

    <div id="product_buttons">
        <button onClick="" class="btn btn-light">Add to wishlist</button>
        <button onClick="" type="button" class="btn btn-info">Add to shop cart</button>
    </div>
    
    <h3>Reviews...</h3>
    <section id="product_reviews">
        <?php $__currentLoopData = $productReviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div id="review<?php echo e($review->id); ?>">
                <p style="font-weight:normal"><strong>userID</strong>: <?php echo e($review->idusers); ?></p>
                <p style="font-weight:normal"><strong>Date:</strong> <?php echo e($review->reviewdate); ?></p>
                <p style="font-weight:normal"><strong>Rating</strong>: <?php echo e($review->rating); ?></p>
                <p style="font-weight:normal"><strong>Content:</strong> <?php echo e($review->content); ?></p>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/pedromacedo/Desktop/lbaw2284/resources/views/pages/product.blade.php ENDPATH**/ ?>