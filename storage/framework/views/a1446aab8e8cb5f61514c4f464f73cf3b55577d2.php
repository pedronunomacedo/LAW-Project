<?php $__env->startSection('title', 'Tech4You'); ?>

<?php $__env->startSection('content'); ?>

<ol class="breadcrumb" style="margin-left: 10px">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item active">ManageProducts</li>
</ol>

<script src="extensions/editable/bootstrap-table-editable.js"></script>

<h1 style="margin-left: 10px">All products...</h1>

<div style="margin-left: 10px; margin: 20px;">
    
    <table class="table table-hover">
        <thead>
            <tr class="table-active" style="nowrap: nowrap;">
                <!-- <th scope="col">Product id</th> -->
                <th scope="col" style="text-align: center">Product name</th>
                <th scope="col" style="text-align: center">Price</th>
                <th scope="col" style="text-align: center">Stock</th>
                <th scope="col" style="text-align: center">Launch Date</th>
                <th scope="col" style="text-align: center">Category</th>
                <th scope="col" style="text-align: center">Description</th>
                <th colspan=2 style="text-align: center">Options</th>
            </tr>
        </thead>
        <tbody>
            <tr id="addNewProductForm">
                <th colspan=8 style="text-align: center;">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Product name: <input type="text" id="newProductName"></p>
                                    <p>Product price: <input type="text" id="newProductPrice"></p>
                                    <div>
                                        <label for="newProdDescription">Product description: </label>
                                        <textarea id="newProdDescription" name="productDescription" rows="4" cols="50"></textarea>
                                    </div>
                                    <p>Product launch date: <input type="date" name="productLaunchdate" id="newProductLaunchdate"></p>
                                    <p>Stock: <input type="text" name="productStock" id="newProductStock"></p>
                                    <div>
                                        <p>Product category: 
                                            <select class="form-select" name="category_selector" id="newProductCategory">
                                                <option style="text-align: center">Select a category</option>
                                                <option style="text-align: center">Smartphones</option>
                                                <option style="text-align: center">TVs</option>
                                                <option style="text-align: center">Laptops</option>
                                                <option style="text-align: center">Desktops</option>
                                                <option style="text-align: center">Others</option>
                                            </select>
                                        </p>
                                    </div>
                                    <a onClick="addProduct()" type="submit" class="btn btn-success" value="Product create">Create Product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </th>
            </tr>
            <?php $__currentLoopData = $allProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- <?php echo csrf_field(); ?> -->
                <tr id="productForm<?php echo e($product->id); ?>">
                    <!-- <th contenteditable='true' scope="row"><?php echo e($product->id); ?></th> -->
                    <th scope="row" style="white-space: nowrap; text-align: center; justify-content: center;"><input name="product_name" style="all: unset;" value="<?php echo e($product->prodname); ?>" id="product_name<?php echo e($product->id); ?>"></input></th>
                    <td name="productPrice" style="text-align: center; justify-content: center;"><input name="product_price" style="all: unset;" value="<?php echo e($product->price); ?>" id="product_price<?php echo e($product->id); ?>"></input></td>
                    <td name="productStock" style="text-align: center; justify-content: center;"><input name="product_stock" style="all: unset;" value="<?php echo e($product->stock); ?>" id="product_stock<?php echo e($product->id); ?>"></input></td>
                    <td name="productLaunchDate" style="text-align: center; justify-content: center;"><input name="product_launchdate" style="all: unset;" value="<?php echo e($product->launchdate); ?>" id="product_launchDate<?php echo e($product->id); ?>"></input></td>
                    <td>
                        <select class="form-select" id="product_category<?php echo e($product->id); ?>" name="category_selector">
                            <option selected="selected"><?php echo e($product->categoryname); ?></option>
                            <?php $__currentLoopData = $allCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($category <> $product->categoryname): ?>)
                                    <option><?php echo e($category); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <td name="productDescription<?php echo e($product->id); ?>" style="text-align: center; justify-content: center;"><input name="product_description" style="all: unset;" value="<?php echo e($product->proddescription); ?>" id="product_description<?php echo e($product->id); ?>"></input></td>
                    <td>
                        <a class="btn" onClick="deleteProduct(<?php echo e($product->id); ?>)" style="text-align: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16" color="blue">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </a>
                    </td>
                    <td>
                        <a onClick="updateProduct(<?php echo e($product->id); ?>)" class="btn" style="text-align: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-save-fill" viewBox="0 0 16 16">
                                <path d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v7.793L4.854 6.646a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0-.708-.708L8.5 9.293V1.5z"/>
                            </svg>
</a>                    </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/pedromacedo/Desktop/pedroLBAW/2nd-delivery/lbaw2284/resources/views/pages/adminManageProducts.blade.php ENDPATH**/ ?>