<?php $__env->startSection('content'); ?>

  <div id="login_page_content">
    <div id="main_image_div">
        <img src="<?php echo e(url('/images/login_page.png')); ?>" id="main_image"/>
    </div>
    <div id="login_register_content">
      <h1>Register</h1>
      <form class="form-group bg-light bg-opacity-25 p-3 mx-auto mt-5" method="POST" action="<?php echo e(route('register')); ?>" style="width: 20em">
          <?php echo e(csrf_field()); ?>  

          <div class="form-floating mb-3">
            <input class="form-control" placeholder="name" id="name" type="text" name="name" value="<?php echo e(old('name')); ?>" required>
            <label for="name">Name</label>
          </div>
          <?php if($errors->has('name')): ?>
            <span class="error">
                <?php echo e($errors->first('name')); ?>

            </span>
          <?php endif; ?>
          <div class="form-floating mb-3">
            <input class="form-control" placeholder="email" id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required>
            <label for="email">Email</label>
          </div>
          <?php if($errors->has('email')): ?>
            <span class="error">
                <?php echo e($errors->first('email')); ?>

            </span>
          <?php endif; ?>
          <div class="form-floating mb-3">
            <input class="form-control" placeholder="password" id="password" type="password" name="password" required>
            <label for="password">Password</label>
          </div>
          <?php if($errors->has('password')): ?>
            <span class="error">
                <?php echo e($errors->first('password')); ?>

            </span>
          <?php endif; ?>
          <div class="form-floating mb-3">
            <input class="form-control" placeholder="password" id="password-confirm" type="password" name="password_confirmation" required>
            <label for="password-confirm">Confirm Password</label>
          </div>

          <div class="buttons" id="butons_login_page">
            <button class="btn btn-dark" type="submit">Register</button>
            <a class="btn btn-outline-dark hovered_button" href="<?php echo e(route('login')); ?>">Login</a>
          </div>
      </form>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/pedromacedo/Desktop/lbaw2284/resources/views/auth/register.blade.php ENDPATH**/ ?>