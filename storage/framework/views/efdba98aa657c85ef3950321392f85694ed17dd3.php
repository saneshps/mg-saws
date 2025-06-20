  
  <?php $__env->startSection('meta'); ?>
  <title>Aluminium Fabrication Machine Supplier,UAE,GCC|TRONZADORAS MG</title>
  <meta name="description" content="We are the top Aluminium Fabrication Machine Supplier in UAE supplying quality Aluminium Cutting,drilling Machines in GCC countries at the best price">

  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('style'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/slick.css')); ?> ">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/slick.theme.css')); ?> ">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('content'); ?>

  <!-- exomos title area start -->
  <div id="exomos-breadcrumb-area" class="exomos-breadcrumb-area text-center">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="breadcrumb-content-box">
                      <h1>Products </h1>
                      <ul class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" title="Home"><i class="fa fa-home"></i> Home</a></li>
                          <li class="breadcrumb-item active">Products</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- exomos title area end -->

  <!-- product-page area start -->
  <section class="product-page">
      <div class="container">

          <div class="row">
              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <a href="<?php echo e(url('all-products/sub/'.$category->slug)); ?>">
                      <div class="box">
                          <img src=" <?php echo e(asset('storage/'.$category->tumb)); ?>" alt="<?php echo e($category->image_alt); ?>" title="<?php echo e($category->image_alt); ?>">
                          <div class="box-content">
                              <h3 class="title"><?php echo e($category->name); ?></h3>

                              <!-- <ul class="icon">
                            <li><i class="fa fa-search"></i></li> 
                         </ul> -->
                          </div>

                      </div>

                      <h5> <?php echo e($category->name); ?></h5>
                  </a>
              </div>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
      </div>
  </section>

  <?php $__env->stopSection(); ?>
  <!-- js here -->
  <?php $__env->startSection('script'); ?>
  <script>
      $(document).ready(function() {
          $("#news-slider").owlCarousel({
              items: 4,
              itemsDesktop: [1199, 3],
              itemsDesktopSmall: [1000, 2],
              itemsMobile: [650, 1],
              navigationText: false,
              autoPlay: true
          });
      });
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /homepages/27/d886905960/htdocs/resources/views/frontend/products.blade.php ENDPATH**/ ?>