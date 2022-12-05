<?php $__env->startSection('title', 'Tech4You'); ?>

<?php $__env->startSection('content'); ?>

<ol class="breadcrumb" style="margin-left: 10px">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item active">ManageOrders</li>
</ol>

<script src="extensions/editable/bootstrap-table-editable.js"></script>

<script>
    function encodeForAjax(data) {
    if (data == null) return null;
        return Object.keys(data).map(function(k){
            return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
        }).join('&');
    }

    function sendAjaxRequest(method, url, data, handler) {
        let request = new XMLHttpRequest();

        request.open(method, url, true);
        request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.addEventListener('load', handler);
        request.send(encodeForAjax(data));
    }

    function deleteProduct(id) {
        sendAjaxRequest("POST", "adminManageProducts/delete", {id : id}); // request sent to adminManageProducts/delete with out id {parameter : myVariable}

        document.querySelector("#productForm" + id).remove();
    }

    function updateOrder(id) {
        var newOrderState = document.querySelector("#order_state" + id).value;

        console.log(newOrderState);

        sendAjaxRequest("POST", "adminManageOrders/saveChanges", {id : id, new_order_state : newOrderState});
    }
</script>



<div style="margin-left: 10px; margin: 20px;">
    <h1>All orders...</h1>
    <div id="search_div" style="display: block; text-align: center;">
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="<?php echo e(url('search/orders')); ?>" method="GET" role="search">
            <input type="search" name="search" value="" class="form-control form-control-light text-bg-light" placeholder="Search for users" aria-label="Search">
        </form>
    </div>
    <?php $__currentLoopData = $allOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card userCard" style="margin-top: 30px; display: flex;" id="orderForm<?php echo e($order->id); ?>">
            <div class="card-header">
                <strong>Order <?php echo e($order->id); ?></strong>
            </div>
            <div class="card-body">
                <p class="card-text" id="orderDate"><strong>Date:</strong> <?php echo e(date('d-m-Y', strtotime($order->orderdate))); ?></p>
                <p class="card-text" id="orderAddress"><strong>Address:</strong> <?php echo e($order->street); ?></p>    
                <p class="card-text" id="orderUserId"><strong>User:</strong> <?php echo e($order->name); ?></p>
                <label for="category_selector"><strong>State:</strong> </label>
                <select class="form-select" name="category_selector" id="order_state<?php echo e($order->id); ?>" style="width: 30%">
                    <?php $__currentLoopData = $allOrderStates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderState): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($orderState <> $order->orderstate): ?>)
                            <option style="text-align: center"><?php echo e($orderState); ?></option>
                        <?php else: ?>
                            <option selected="selected" style="text-align: center"><?php echo e($order->orderstate); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="card_buttons">
                <a class="btn" onClick="updateOrder(<?php echo e($order->id); ?>)" style="text-align: center; justify-content: center;">
                    <svg fill="none" height="40" width="40" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 13V19C20 20.1046 19.1046 21 18 21H6C4.89543 21 4 20.1046 4 19V13" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 15V3M12 3L8.5 6.5M12 3L15.5 6.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/pedromacedo/Desktop/lbaw2284/resources/views/pages/adminManageOrders.blade.php ENDPATH**/ ?>