<?php $__env->startSection('title', 'Tech4You'); ?>

<?php $__env->startSection('content'); ?>

<div class="container py-5">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('category_page', ['category_id'=> $product->categoryname])); ?>"><?php echo e($product->categoryname); ?></a></li>
            <li class="breadcrumb-item" style="color: black;"><strong><?php echo e($product->prodname); ?></strong></li>
        </ol>
    </nav>
    <div class="row d-flex justify-content-center my-4">
        <div class="col-md-7">
            <div class="product_page_img mb-4">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active bg-dark" aria-current="true" aria-label="Slide 1"></button>
                        <?php for ($x = 1; $x < count($productImages); $x++) { ?>
                            <button class="bg-dark" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $x ?>" aria-label="Slide <?= $x + 1 ?>"></button>
                        <?php } ?>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= $productImages[0]->imgpath ?>" class="d-block ">
                        </div>
                        <?php for ($y = 1; $y < count($productImages); $y++) { ?>
                            <div class="carousel-item">
                                <img src="<?= $productImages[$y]->imgpath ?>" class="d-block ">
                            </div>
                        <?php } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" style="background-color: black; border-radius: 5px" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" style="background-color: black; border-radius: 5px" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="product_page_tabs mb-4">
                <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-description" aria-selected="true">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-reviews" aria-selected="false">Reviews</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                        <p class="mb-0"><?php echo e($product->proddescription); ?></p>
                    </div>
                    <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab">
                        <?php $__currentLoopData = $productReviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <hr class="my-4" />
                            <div id="review<?php echo e($review->id); ?>">
                                <p style="font-weight:normal"><strong><?php echo e($review->name); ?></strong>, <?php echo e($review->reviewdate); ?></p>
                                <p style="font-weight:normal"><?php echo e($review->content); ?></p>
                                <div class="ratings">
                                    <?php
                                    for ($x = 0; $x < $review->rating; $x++) {?> 
                                        <i class="fa fa-star rating-color"></i>
                                    <?php } ?>
                                    <?php
                                    for ($x = 0; $x <= 4 - $review->rating; $x++) {?> 
                                        <i class="fa fa-star"></i>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="mb-4 product_page_info">
                <h4 class="mb-3"><strong><?php echo e($product->prodname); ?></strong></h4>
                <h5 class="mb-3" style="color: red"><strong><?php echo e($product->price); ?> €</strong></h5>
                <button type="button" class="btn btn-danger" onclick="addToShopCart(<?php echo e($product->id); ?>)">
                    <i class="fas fa-shopping-bag"></i>  Add to Shopcart
                </button>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/pedromacedo/Desktop/lbaw2284/resources/views/pages/product.blade.php ENDPATH**/ ?>