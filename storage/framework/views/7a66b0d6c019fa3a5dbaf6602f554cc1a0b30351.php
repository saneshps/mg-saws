
<?php $__env->startSection('meta'); ?>
<title>Aluminum Cutting &End Milling Machine,Manufacturer|Blog|TRONZADORAS MG </title>
<meta name="description" content="Get updates from the top Aluminum Cutting & Drilling Machine Manufacturer Company in GCC providing quality equipments in Oman,UAE,Saudi,Bahrain,Qatar and Kuwait.">

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



<!--==============================
            News-area-start 
 ===============================-->
<section class="news-page-area">


    <div class="container">
        <div class="row news-box">
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="single-blog-wraper mb-30">
                    <a href="<?php echo e(url('news-details/'.$event->slug)); ?>">
                        <div class="blog-img">
                            <img src=" <?php echo e(asset('storage/'.$event->image)); ?>" alt="<?php echo e($event->image_alt); ?>" title="<?php echo e($event->image_alt); ?>">
                        </div>
                    </a>

                    <a href="<?php echo e(url('news-details/'.$event->slug)); ?>">
                        <div class="single-blog-content">
                            <div class="blog-post-comment">
                                <div class="blog-post-admininfo">
                                    <span><a href="#"><?php echo e($event->created_at->format('Y-m-d')); ?></a></span>
                                </div>


                            </div>
                            <a href="<?php echo e(url('news-details/'.$event->slug)); ?>">
                                <h3 href="#" class="post-title"><?php echo e(Str::limit($event->name , 40)); ?></h3>
                            </a>
                            <p><?php echo e(Str::limit(strip_tags($event->detail), 100)); ?></p>
                            <a href="<?php echo e(url('news-details/'.$event->slug)); ?>" class="news-more"> Read More <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </a>

                </div>
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
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /homepages/27/d886905960/htdocs/resources/views/frontend/news.blade.php ENDPATH**/ ?>