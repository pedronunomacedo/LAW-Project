<?php $__env->startSection('title', 'Tech4You'); ?>

<?php $__env->startSection('content'); ?>

<ol class="breadcrumb" style="margin-left: 10px">
  <li class="breadcrumb-item"><a href="/">Home</a></li>
  <li class="breadcrumb-item active">ManageUsers</li>
</ol>

<script src="extensions/editable/bootstrap-table-editable.js"></script>

<h1 style="margin-left: 10px">All users...</h1>

<div style="margin-left: 10px; margin: 20px;">
    
    <table class="table table-hover">
        <thead>
            <tr class="table-active" style="nowrap: nowrap;">
                <!-- <th scope="col">User id</th> -->
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <script>
                $('button').click(function(e){
                    $(this).closest('tr').remove()
                })
            </script>
            <?php $__currentLoopData = $allUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="userForm<?php echo e($user->id); ?>">
                    <!-- <th scope="row"><?php echo e($user->id); ?></th> -->
                    <th scope="row" id="userName"><?php echo e($user->name); ?></th>
                    <td id="userEmail"><?php echo e($user->email); ?></td>
                    <td id="userPhoneNumber"><?php echo e($user->phonenumber); ?></td>
                    <td>
                        <a class="btn" onClick="deleteUser(<?php echo e($user->id); ?>)" style="text-align: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rubis/LBAW/lbaw2284/resources/views/pages/adminManageUsers.blade.php ENDPATH**/ ?>