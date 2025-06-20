
<?php $__env->startSection('meta'); ?>
<title>Aluminum Cutting&Milling Machine Dealer,UAE|Contact Us|TRONZADORAS MG</title>
<meta name="description" content="We are a leading Aluminum profile Cutting & Milling Machine Dealer in GCC providing quality Machines in GCC countries Oman,UAE,Saudi,Bahrain,Qatar,Kuwait&Qatar">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('frontend/css/slick.css')); ?> ">
<link rel="stylesheet" href="<?php echo e(asset('frontend/css/slick.theme.css')); ?> ">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<?php $__env->stopSection(); ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<?php $__env->startSection('content'); ?>

<!-- exomos title area start -->
<div id="exomos-breadcrumb-area" class="exomos-breadcrumb-area text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-content-box">
                    <h1> Contact Us </h1>
                    <ul class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" title="Home"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Contact Us </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- exomos title area end -->

<div id="exomos-contact-info-area" class="exomos-contact-info-area mt-100 mb-70">
   
    <div class="container">
        <?php if(Session::get('message')): ?>
        <div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong><?php echo e(Session::get('message')); ?></strong>
</div>
 <?php endif; ?>
        <div class="row">

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="contact-info-box">
                    <div class="contact-info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <ul class="contact-info">
                        <li>
                            <h6> Headquarters </h6>
                        </li>
                        <li>
                            <h4> TRONZADORAS MG, S.A. </h4>
                        </li>
                        <li> P.I. Font de la Parera </li>
                        <li> C/Buenaventura Aribau </li>
                        <li> 08430 La Roca del Vallés </li>
                        <li> Barcelona - Spain </li>
                    </ul>
                </div>
            </div>


            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="contact-info-box">
                    <div class="contact-info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <ul class="contact-info">
                        <li>
                            <h6>Partner</h6>
                        </li>
                        <li>
                            <h4>YES MACHINERY</h4>
                        </li>
                        <li>York Engineering Solution FZC </li>
                        <li> OFFICE NO. LV-27D, PO BOX 42167, </li>
                        <li>HAMRIYAH FREE ZONE PHASE 2, </li>
                        <li>SHARJAH, UAE</li>
                    </ul>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                <div class="contact-info-box">
                    <div class="contact-info-icon">
                        <i class="fas fa-phone-volume"></i>
                    </div>
                    <ul class="contact-info">
                        <li> <a href="tel:+97165264382"> Phn. + 971 6 5264382 </a> </li>
                        <li> <a href="tel:+971547918858"> Tel. + 971 5 47918858 </a> </li>
                        <li> Fax. + 971 6 5264384 </li>
                        <li><a href="mailto:sales@yesmachinery.ae">sales@yesmachinery.ae</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>

<section class="exomos-contact-area mt-100">
    
    <div class="container">
      
        <div class="row mx-auto justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-12">
                <div class="exomos-contact-form-area">
                    <form class="exomos-contact-form" action=" <?php echo e(route('contact-us.send')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <input class="form-control" type="text" name="name" placeholder="Name *" value="<?php echo e(old('name')); ?>">
												<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
     <div class="alert alert-danger mt-1 mb-1"><?php echo e($message); ?></div>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<br>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <input class="form-control" type="email" name="email" placeholder="E-mail *" value="<?php echo e(old('email')); ?>">
																					<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
     <div class="alert alert-danger mt-1 mb-1"><?php echo e($message); ?></div>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<br>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <input class="form-control" type="text" name="company" placeholder="Company" value="<?php echo e(old('company')); ?>">

                                </div>


                                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                    <input class="form-control" type="text" name="country" placeholder="Country" value="<?php echo e(old('country')); ?>">

                                    
                                </div>

                                <div class="col-lg-4 col-sm-12 form-group">
                                    <input type="phone" class="form-control" name="phone" id="phone" placeholder="Your phone *" required="" value="<?php echo e(old('phone')); ?>">
																	<?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
     <div class="alert alert-danger mt-1 mb-1"><?php echo e($message); ?></div>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-xl-12">
					
                                    <textarea class="form-control" name="message" cols="30" rows="8" placeholder="Message"><?php echo e(old('message')); ?></textarea>
													<?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
     <div class="alert alert-danger mt-1 mb-1"><?php echo e($message); ?></div>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					<br>
												 <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="<?php echo e(env('GOOGLE_RECAPTCHA_KEY')); ?>">
                    </div>
					<?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
     <div class="alert alert-danger mt-1 mb-1"><?php echo e($message); ?></div>
<?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
					<br>
                                    <button type="submit" class="btn btn-type-3">submit</button>
                                </div>
                            </div>
                            <p class="form-message float-left mt-15"></p>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4 col-lg-4 col-md-12">
                <img src="<?php echo e(asset('frontend/img/yes-certificate.jpg')); ?>" alt="">
            </div>

        </div>
    </div>
</section>



<!--==============================
            contact-area-start 
 ===============================-->
<div id="exomos-contact-info-area" class="exomos-contact-info-area mt-100 ">
    <div id="exomos-contact-info-area" class="exomos-contact-info-area mt-100 ">
        <!-- <div id="exomos-contact-info-area" class="exomos-contact-info-area mt-100 mb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="contact-info-box">
                                    <div class="contact-info-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <ul class="contact-info">
                                        <li>
                                            <h6>Headquarters</h6>
                                        </li>
                                        <li>
                                            <h4>TRONZADORAS MG, S.A.</h4>
                                        </li>
                                        <li>P.I. Font de la Parera </li>
                                        <li> C/Buenaventura Aribau </li>
                                        <li>08430 La Roca del Vallés</li>
                                        <li>Barcelona - Spain</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="contact-info-box">
                                    <div class="contact-info-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <ul class="contact-info">
                                        <li>
                                            <h6>Partner</h6>
                                        </li>
                                        <li>
                                            <h4>YES MACHINERY</h4>
                                        </li>
                                        <li>York Engineering Solution FZC </li>
                                        <li> OFFICE NO. LV-27D, PO BOX 42167, </li>
                                        <li>HAMRIYAH FREE ZONE PHASE 2, </li>
                                        <li>SHARJAH, UAE</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="contact-info-box">
                                    <div class="contact-info-icon">
                                        <i class="fas fa-phone-volume"></i>
                                    </div>
                                    <ul class="contact-info">
                                        <li>Phn. + 971 6 5264382</li>
                                        <li>Tel. + 971 5 47918858</li>
                                        <li>Fax. + 971 6 5264384</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="contact-info-box">
                                    <div class="contact-info-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <ul class="contact-info">
                                        <li><a href="mailto:sales@yesmachinery.ae">sales@yesmachinery.ae</a></li>
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="col-lg-4">
                        <img src="<?php echo e(asset('frontend/img/yes-certificate.jpg')); ?>" alt="">
                    </div>



                </div>
            </div>
        </div> -->

        <!--==============================
            map-area-start 
 ===============================-->

        <section class="map-area mt-5 pt-5">

            <div class="row m-0">
                <div class="col-lg-12 map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.781395700687!2d55.75784029999999!3d25.0753974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ef59bec1fadd8d5%3A0x265e1f0f9bac7e56!2sMG%20TRONZADORAS!5e0!3m2!1sen!2sin!4v1665813697922!5m2!1sen!2sin" width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>

        </section>

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
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /homepages/27/d886905960/htdocs/resources/views/frontend/contact.blade.php ENDPATH**/ ?>