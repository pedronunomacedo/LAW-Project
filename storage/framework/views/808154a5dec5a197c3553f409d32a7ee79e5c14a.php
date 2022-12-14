<?php $__env->startSection('title', 'Tech4You'); ?>

<?php $__env->startSection('content'); ?>



<!--<script src="extensions/editable/bootstrap-table-editable.js"></script>-->

<main>
    <?php if($categoryProducts->total() == 0): ?>
        <h3>Sorry, we could not find any product with the category '<?php echo e($category); ?>'</i></h3>
    <?php else: ?>
    <div class="mt-5 container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" style="color: black;"><?php echo e($category); ?></li>
            </ol>
        </nav>
        <div class="row" style="border-left: 0.5rem solid red; margin-bottom: 2rem;"><h2><?php echo e($category); ?></h2></div>
        <div class="row flex-wrap justify-content-between" style="gap: 2rem">
            <?php echo $__env->renderEach('partials.product_card', $categoryProducts, 'product'); ?>
        </div>
    </div>
    <div class="text-center">
        <?php echo $categoryProducts->appends(request()->input())->links(); ?>

    </div>
</main>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/pedromacedo/Desktop/lbaw2284/resources/views/pages/category.blade.php ENDPATH**/ ?>