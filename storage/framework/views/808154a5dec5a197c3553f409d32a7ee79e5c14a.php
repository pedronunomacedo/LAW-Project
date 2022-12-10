<?php $__env->startSection('title', 'Tech4You'); ?>

<?php $__env->startSection('content'); ?>

<ol class="breadcrumb" style="margin: 0px 100px">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item active">ProductsCategory (<?php echo e($category); ?>)</li>
</ol>

<script src="extensions/editable/bootstrap-table-editable.js"></script>

<div class="mainDiv" style="margin: 0px 100px">
    <h1><?php echo e($category); ?></h1>
    <?php if($categoryProducts->total() == 0): ?>
        <h3>Sorry, we could not find any product with the category '<?php echo e($category); ?>'</i></h3>
    <?php else: ?>

    <div class="data_div" id="mainPageCategoryProductsDiv" style="display: flex; justify-content: space-between; flex-wrap: wrap;">
        <?php echo $__env->renderEach('partials.product_card', $categoryProducts, 'product'); ?>
        <!-- <?php $__currentLoopData = $categoryProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card userCard" style="margin-top: 30px; display: flex;" id="productForm<?php echo e($product->id); ?>">
                <div class="card-header">
                    <strong><?php echo e($product->prodname); ?></strong>
                </div>
                <div class="card_body" style="padding: 20px">
                    <div class="card_body" style="display: inline-block;">
                        <p class="card-text productPrice">Price: <?php echo e($product->price); ?></p>
                        <p class="card-text productLaunchdate">Launch date: <?php echo e($product->launchdate); ?></p>    
                    </div>
                    <div class="div_buttons" style="display: inline-block; float: right; align-items: center;">
                        <a class="btn" onClick="" style="text-align: center; justify-content: center;">
                            <svg fill="none" height="40" width="40" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 13V19C20 20.1046 19.1046 21 18 21H6C4.89543 21 4 20.1046 4 19V13" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12 15V3M12 3L8.5 6.5M12 3L15.5 6.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <a class="btn" id="categoryProducts" onClick="deleteProduct(<?php echo e($product->id); ?>, <?php echo e($categoryProducts->total()); ?>)" style="text-align: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
    </div>
    <div class="text-center">
        <?php echo $categoryProducts->appends(request()->input())->links(); ?>

    </span>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/pedromacedo/Desktop/lbaw2284/resources/views/pages/category.blade.php ENDPATH**/ ?>