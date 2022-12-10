<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- CSS only -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@800&display=swap" rel="stylesheet"> 
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/loginAndregister.css" rel="stylesheet">
    <link href="/css/categoryPage.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src=<?php echo e(asset('js/app.js')); ?> defer></script>

  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height: 5em">
        <div class="container-fluid">
          <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><h1 class="display-6">Tech4You</h1></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse position-absolute end-0" id="navbarColor02">
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="<?php echo e(url('mainPageSearch/products')); ?>" method="GET" role="search">
              <input type="search" name="search" value="" class="form-control form-control-dark text-bg-dark" placeholder="Search for products" aria-label="Search">
            </form>
            <ul class="navbar-nav mx-2">
              <?php if(Auth::check()): ?>
                <?php if(Auth::user()->isAdmin()): ?>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo e(Auth::user()->name); ?></a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="/profile/<?php echo e(Auth::user()->id); ?>">Profile</a>
                      <a class="dropdown-item" href="/adminManageUsers">Manage Users</a>
                      <a class="dropdown-item" href="/adminManageProducts">Manage Products</a>
                      <a class="dropdown-item" href="/adminManageOrders">Manage Orders</a>
                      <a class="dropdown-item" href="/adminManageFAQs">Manage FAQs</a>
                      <a class="dropdown-item" href="<?php echo e(route('logout')); ?>">Logout</a>
                    </div>
                  </li>
                <?php else: ?>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo e(Auth::user()->name); ?></a>
                    <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href="<?php echo e(route('profile', [Auth::id()])); ?>">Profile</a>
                      <a class="dropdown-item" href="/wishlist">Wishlist</a>
                      <a class="dropdown-item" href="/shopcart">ShopCart</a>
                      <a class="dropdown-item" href="/orders">Orders</a>
                      <div><hr class="dropdown-divider"></div>
                      <a class="dropdown-item" href="<?php echo e(route('logout')); ?>">Logout</a>
                    </div>
                  </li>
                <?php endif; ?>
              <?php else: ?>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <section id="content" class="min-vh-100">
      <?php echo $__env->yieldContent('content'); ?>
    </section>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top mx-5">
      <p class="col-md-4 mb-0 text-muted">&copy; 2022 Tech4You</p>
      <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Contacts</a></li>
      </ul>
    </footer>
  </body>
</html>
<?php /**PATH /Users/pedromacedo/Desktop/lbaw2284/resources/views/layouts/app.blade.php ENDPATH**/ ?>