
<?php $__env->startSection('meta'); ?>
<title>Aluminum Cutting Machine Dealer,UAE,GCC|Gallery|TRONZADORAS MG </title>
<meta name="description" content="We are the best quality Aluminum Profile Machine Manufacturer&Supplier in UAE providing quality equipments in GCC countries at the best price from top brands">

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
                    <h1> Gallery </h1>
                    <ul class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" title="Home"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Gallery </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- exomos title area end -->

<!-- =========================
       Gallery area start
     ======================== -->
<section class="gallery-area exomos-contact-area ">
    <div class="container">

        <h2> Gallery </h2>
        <div class="filters filter-button-group">
            <ul>
                <li class="active"><a href="javascript:void(0);" data-filter="*">All</a></li>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="javascript:void(0);" data-filter="<?php echo e($cat->id); ?>"> <?php echo e($cat->name); ?> </a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!--li><a href="javascript:void(0);" data-filter="centers"> MACHINING CENTERS </a></li>
                
                <li><a href="javascript:void(0);" data-filter="charts"> PROFILE CHARTS </a></li-->
            </ul>
        </div>
        <div id="container" class="isotope">
            <?php $__currentLoopData = $pro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="grid-item" data-filter="<?php echo e($catt->category); ?>">
                <a href=" <?php echo e(route('show-product', $catt->slug)); ?>">
                    <!-- <img src="https://www.mgsaws.com/storage/product/20230109072425.webp" alt="<?php echo e($catt->image_alt); ?>" title="<?php echo e($catt->image_alt); ?>"> -->
                    <img src=" <?php echo e(url('/storage/'.$catt->image)); ?>" alt="<?php echo e($catt->image_alt); ?>" title="<?php echo e($catt->image_alt); ?>">
                    <div class="overlay"> <?php echo e($catt->name); ?> </div>
                </a>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</section>
<!-- =========================
       Gallery area end
     ======================== -->







<?php $__env->stopSection(); ?>
<!-- js here -->
<?php $__env->startSection('script'); ?>
<script>
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
</script>

<?php $__env->stopSection(); ?>
<!-- js here -->

<!-- Initialize Swiper -->
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\mg-saws\resources\views/frontend/gallery.blade.php ENDPATH**/ ?>