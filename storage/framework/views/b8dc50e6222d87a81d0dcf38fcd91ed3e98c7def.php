<?php $__env->startSection('content'); ?>
<form class="form-group bg-dark bg-opacity-25 p-3 mx-auto mt-5" method="POST" action="<?php echo e(route('login')); ?>" style="width: 20em">
    <?php echo e(csrf_field()); ?>

    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required placeholder="email">
        <label for="email">Email</label>
    </div>
    <?php if($errors->has('email')): ?>
        <span class="error">
        <?php echo e($errors->first('email')); ?>

        </span>
    <?php endif; ?>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="password" name="password" required placeholder="password">
        <label for="password">Password</label>
    </div>
    <?php if($errors->has('password')): ?>
        <span class="error">
            <?php echo e($errors->first('password')); ?>

        </span>
    <?php endif; ?>
    <label>
        <input type="checkbox" class="form-check-input" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
    </label>
    <button class="btn btn-dark" type="submit">
        Login
    </button>
    <a class="btn btn-outline-dark" href="<?php echo e(route('register')); ?>">Register</a>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/pedromacedo/Desktop/pedroLBAW/2nd-delivery/lbaw2284/resources/views/auth/login.blade.php ENDPATH**/ ?>