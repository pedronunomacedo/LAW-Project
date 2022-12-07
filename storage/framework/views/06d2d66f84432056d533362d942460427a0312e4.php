<?php $__env->startSection('content'); ?>
    <div id="login_page_content">
        <div id="main_image_div">
            <img src="<?php echo e(url('/images/login_page.png')); ?>" id="main_image"/>
        </div>
        <div id="login_register_content">
            <h1>Log In</h1>
            <form class="form-group bg-light bg-opacity-25 mx-auto mt-5" method="POST" action="<?php echo e(route('login')); ?>">
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
                    <input type="checkbox" class="form-check-input" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me</input>
                </label>
                <div class="buttons" id="butons_login_page">
                    <button class="btn btn-dark" type="submit">Login</button>
                    <button class="btn btn-outline-dark" id="register_button" href="<?php echo e(route('register')); ?>">Register</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/pedromacedo/Desktop/lbaw2284/resources/views/auth/login.blade.php ENDPATH**/ ?>