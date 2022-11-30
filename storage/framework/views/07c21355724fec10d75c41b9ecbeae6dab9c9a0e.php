<?php $__env->startSection('title', 'Tech4You'); ?>

<?php $__env->startSection('content'); ?>

<ol class="breadcrumb" style="margin-left: 10px">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item active">ManageOrders</li>
</ol>

<script src="extensions/editable/bootstrap-table-editable.js"></script>

<h1 style="margin-left: 10px">All orders...</h1>

<div style="margin-left: 10px; margin: 20px;">
    
    <table class="table table-hover">
        <thead>
            <tr class="table-active" style="nowrap: nowrap;">
                <!-- <th scope="col">Product id</th> -->
                <th scope="col" style="text-align: center">ID</th>
                <th scope="col" style="text-align: center">Order Date</th>
                <th scope="col" style="text-align: center">Order State</th>
                <th scope="col" style="text-align: center">User ID</th>
                <th scope="col" style="text-align: center">Address</th>
                <th scope="col" style="text-align: center">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $allOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="orderForm<?php echo e($order->id); ?>">
                    <!-- <th contenteditable='true' scope="row"><?php echo e($order->id); ?></th> -->
                    <th scope="row" id="orderID" style="text-align: center"><?php echo e($order->id); ?></th>
                    <td id="orderDate" style="text-align: center"><?php echo e(date('d-m-Y', strtotime($order->orderdate))); ?></td>
                    <td>
                        <select class="form-select" name="category_selector" id="order_state<?php echo e($order->id); ?>">
                            <?php $__currentLoopData = $allOrderStates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderState): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($orderState <> $order->orderstate): ?>)
                                    <option style="text-align: center"><?php echo e($orderState); ?></option>
                                <?php else: ?>
                                    <option selected="selected" style="text-align: center"><?php echo e($order->orderstate); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>

                    <td id="orderUserID" style="text-align: center"><?php echo e($order->idusers); ?></td>
                    <td id="orderAddress" style="text-align: center"><?php echo e($order->idaddress); ?></td>

                    <td>
                        <a class="btn" onClick="updateOrder(<?php echo e($order->id); ?>)" style="text-align: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-save-fill" viewBox="0 0 16 16">
                                <path d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v7.793L4.854 6.646a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0-.708-.708L8.5 9.293V1.5z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rubis/LBAW/lbaw2284/resources/views/pages/adminManageOrders.blade.php ENDPATH**/ ?>