
<?php $__env->startSection('meta'); ?>
<title><?php echo e($event->meta_title); ?> </title>
<meta name="description" content="<?php echo e($event->meta_content); ?>">
<meta property="og:title" content="<?php echo e($event->meta_title); ?>" />

<meta property="og:description" content="<?php echo e($event->meta_content); ?>" />

<meta property="og:url" content="<?php echo e(url('news-details/'.$event->slug)); ?>" />



<meta property="og:image" content="<?php echo e(asset('storage/'.$event->image)); ?>" />

<meta property="og:image:secure_url" content="<?php echo e(asset('storage/'.$event->image)); ?>" />

<meta property="og:image:width" content="560" />

<meta property="og:image:height" content="315" />



<meta name="twitter:card" content="summary" />

<meta name="twitter:description" content="<?php echo e($event->meta_content); ?>" />

<meta name="twitter:title" content="<?php echo e($event->meta_title); ?>" />

<meta name="twitter:image" content="<?php echo e(asset('storage/'.$event->image)); ?>" />

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
                    <h1> Blogs </h1>
                    <ul class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" title="Home"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active"> Blogs </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- exomos title area end -->

<section class="news-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 news-1">
                <h2> <?php echo e($event->name); ?> </h2>
                <div class="post-admininfo">
                    <span><a href="#"> <i class="fas fa-calendar-alt"></i> <?php echo e($event->created_at->format('Y-m-d')); ?></a></span>

                </div>
                <ul class="bred">
                    <li> <a href="<?php echo e(url('/')); ?>"> Home </a></li>
                    <li><a> Blogs </a> </li>
                </ul>
                <h3> Follow Us</h3>
                <ul class="follow-us">
                    <li><a href="#"> <i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>

            </div>
            <div class="col-lg-6 news-2">
                <img src="<?php echo e(asset('storage/'.$event->image)); ?>" alt="<?php echo e($event->image_alt); ?>" title="<?php echo e($event->image_alt); ?>">
            </div>
        </div>


        <div class="row feeds">
            <div class="col-lg-12 col-md-12">
                <div class="news-detail">
                    <?php echo $event->detail; ?>

                </div>



                <div class="col-md-12 related">
                    <h2> Related Blogs </h2>
                    <div id="news-slider" class="owl-carousel">
                        <?php $__currentLoopData = $latests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="post-slide p-2">
                            <div class="pic">
                                <img src="<?php echo e(asset('storage/'.$latest->image)); ?>" alt="<?php echo e($latest->image_alt); ?>" title="<?php echo e($latest->image_alt); ?>">
                            </div>
                            <ul class="post-bar">
                                <!-- <li><i class="fa fa-users"></i> <a href="#">Admin</a></li> -->
                                <li><i class="fa fa-clock-o"></i><?php echo e($latest->created_at->format('Y-m-d')); ?></li>
                                <!-- <li><i class="fa fa-comments"></i> <a href="#">3 Comment</a></li> -->
                            </ul>
                            <p class="post-description">
                                <?php echo e(Str::limit($latest->name , 40)); ?>

                            </p>
                            <a href="<?php echo e(url('news-details/'.$latest->slug)); ?>" class="read-more">read more</a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!--==============================
            News-area-end 
 ===============================-->




<!-- js here -->

<?php $__env->startPush('child-scripts'); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script>
    $(document).ready(function() {
        $("#news-slider").owlCarousel({

            responsive: {
                0: {
                    items: 2
                }, // from zero to 480 screen width 4 items
                375: {
                    items: 2
                }, // from zero to 480 screen width 4 items
                480: {
                    items: 3
                }, // from zero to 480 screen width 4 items
                768: {
                    items: 3
                }, // from 480 screen widthto 768 6 items
                1024: {
                    items: 4 // from 768 screen width to 1024 8 items
                }
            },
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /homepages/27/d886905960/htdocs/resources/views/frontend/news-details.blade.php ENDPATH**/ ?>