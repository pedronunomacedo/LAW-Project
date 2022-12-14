<div class="text-center py-3 category_card" style="width: 10rem; height: 12rem">
    <a href="<?php echo e(route('category_page', ['category_id'=> $category])); ?>" style="text-decoration: none">
        <div class="mx-auto">
            <img class="rounded-circle" src='/img/<?php echo e($category); ?>.png' alt=<?php echo e($category); ?> style="width: 108px; height: 108px">
        </div>
        <h5 class="mt-4"><?php echo e($category); ?></h5>
    </a>
</div>
<?php /**PATH /Users/pedromacedo/Desktop/lbaw2284/resources/views/partials/category_card.blade.php ENDPATH**/ ?>