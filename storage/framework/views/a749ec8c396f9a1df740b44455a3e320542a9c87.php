<?php $__env->startSection('title', 'Tech4You'); ?>

<?php $__env->startSection('content'); ?>

<main>
    <div id="categories" class="mt-4 container">
        <div class="row flex-nowrap overflow-scroll justify-content-between" style="background-color: white">
            <?php echo $__env->make('partials.category_card', ['category' => 'Smartphones'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('partials.category_card', ['category' => 'Components'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('partials.category_card', ['category' => 'TVs'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('partials.category_card', ['category' => 'Laptops'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('partials.category_card', ['category' => 'Desktops'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('partials.category_card', ['category' => 'Other'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <div class="mt-5 container">
        <div class="row" style="border-left: 0.5rem solid red; margin-bottom: 2rem;"><h2>New Releases</h2></div>
        <div class="row flex-nowrap overflow-scroll">
            <?php echo $__env->renderEach('partials.product_card', $newProducts, 'product'); ?>
        </div>
    </div>
    <div class="mt-5 container">
        <div class="row" style="border-left: 0.5rem solid red; margin-bottom: 2rem;"><h2>Best Smartphones</h2></div>
        <div class="row flex-nowrap overflow-scroll">
            <?php echo $__env->renderEach('partials.product_card', $bestSmartphones, 'product'); ?>
        </div>
    </div>
    <div class="mt-5 container">
        <div class="row" style="border-left: 0.5rem solid red; margin-bottom: 2rem;"><h2>Best Laptops</h2></div>
        <div class="row flex-nowrap overflow-scroll">
            <?php echo $__env->renderEach('partials.product_card', $bestLaptops, 'product'); ?>
        </div>
    </div>
</main>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/pedromacedo/Desktop/lbaw2284/resources/views/pages/home.blade.php ENDPATH**/ ?>