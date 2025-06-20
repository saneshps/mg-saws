<!doctype html>
<html class="no-js" lang="en-us">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="canonical" href="https://www.mgsaws.com/">
    <?php echo $__env->yieldContent('meta'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href=" <?php echo e(asset('frontend/img/favicon.png')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap" rel="stylesheet">
    <!-- css here -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/meanmenu.css')); ?>  ">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/animate.min.css')); ?> ">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/magnific-popup.css')); ?> ">
    <!-- <link rel="stylesheet" href="assets/css/fontawesome-all.min.css"> -->
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/owl.carousel.min.css')); ?> ">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/owl.theme.default.min.css')); ?> ">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/scrolltop.css')); ?> ">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/default.css')); ?> ">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/wedget.css')); ?> ">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?> ">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/responsive.css')); ?> ">
    <!-- time line -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/timeline.css')); ?> ">
    <!--// time line -->
    <!--  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">

    <!-- testimonials -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.css">
    <!-- testimonials -->

    <!-- slick -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/slick.theme.css')); ?>">
    <!-- slick -->

    <!-- gallery -->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/gallery.css')); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" rel="stylesheet">
    <!-- gallery -->

    <?php echo $__env->yieldContent('style'); ?>

    <!--  -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-B1S0XFP1P2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-B1S0XFP1P2');
    </script>

</head>

<body class="exomos-border-lr">

    <!-- main area start -->
    <main>
        <div class="exomos-nav-area">
            <div class="container">
                <div class="row">
                    <!-- logo start -->
                    <div class="col-xl-2 col-lg-1 col-md-3 col-sm-3">
                        <div class="header-logo">
                            <a href="#"><img src=" <?php echo e(asset('frontend/img/logo.png')); ?>" alt="logo" class="img-fluid"></a>
                        </div>
                    </div>
                    <!-- main menu area start -->
                    <div class="col-xl-8 col-lg-9 col-md-12 col-sm-9">

                        <!-- Header Social Start -->
                        <div class="header-top-right float-right">
                            <ul class="header-search-social">
                                <!-- <li><a id="search-btn" href="#"><i class="fa fa-search"></i></a></li> -->
                                <!-- <li><a id="social-pop-btn" href="#"><i class="fa fa-align-left"></i></a></li> -->
                            </ul>
                        </div>
                        <!-- Header Social End -->
                        <style>
                            .main-menu nav>ul>li .sub-menu li a {
                                display: flex !important;
                                justify-content: space-between;
                                align-items: center;
                            }
                        </style>
                        <div class="main-menu-area text-center">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li><a href="<?php echo e(url('/')); ?>">Home</a> </li>
                                        <li><a href="<?php echo e(url('/about-us')); ?>">About Us</a></li>
                                        <!-- <li><a href="#">Products</a></li> -->

                                        <li><a href="<?php echo e(url('/all-products')); ?>">Products</a>
                                            <ul class="sub-menu text-left">
                                                <?php
                                                $i=0;
                                                ?>
                                                <?php $__currentLoopData = $allcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($sub_categories_count[$i]!=0): ?>
                                                <li>
                                                    <a href="<?php echo e(route('sub',$category->slug)); ?>"><?php echo e($category->name); ?><i class="far fa-angle-right"></i></a>

                                                    <ul class="sub-menu text-left">
                                                        <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($category->id==$sub_category->parent_id): ?>
                                                        <li><a href="<?php echo e(route('sub',$sub_category->slug)); ?>"><?php echo e($sub_category->name); ?>

                                                            </a></li>
                                                        <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>

                                                </li>
                                                <?php else: ?>
                                                <li>
                                                    <a href="<?php echo e(route('sub',$category->slug)); ?>"><?php echo e($category->name); ?></a>
                                                </li>
                                                <?php endif; ?>
                                                <?php
                                                $i++;
                                                ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </li>
                                        <li><a href=" <?php echo e(url('/blogs')); ?>"> Blogs </a></li>
                                        <li><a href="<?php echo e(url('/gallery')); ?>"> Gallery </a></li>

                                        <li><a href="<?php echo e(url('/contact-us')); ?>">Contact Us</a></li>

                                        <a href="<?php echo e(url('/contact-us')); ?>" class="btn btn-type-4"> Request A Quote <i class="fa fa-long-arrow-right"></i> </a>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-2">
                        <div class="search">
                            <div class="search_bar">
                                <!-- <input id='searchOne' type='checkbox'>
						<label for='searchOne'>
							<i class='icon ion-android-search'></i>
							<i class='last icon ion-android-close'></i>
						 
						</label>
						<input placeholder='Search...' type='text'> -->
                                <form action="<?php echo e(url('/search')); ?>" method="get" id="search_form">
                                    <fieldset class="search-suggest">
                                        <input type="search" id="search" name="search" placeholder="Start typing..." aria-haspopup="true" aria-expanded="false" accesskey="s" required="" autofocus="" autocomplete="off" spellcheck="off">
                                        <button type="button" form="search-suggest" id="btn_submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24">
                                                <path d="M15.85 16.56a9.5 9.5 0 11.7-.7l7.45 7.43-.7.71-7.45-7.44zM9.5 1a8.5 8.5 0 110 17 8.5 8.5 0 010-17z"></path>
                                            </svg>
                                            Search
                                        </button>
                                        <div id="searchList"></div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>

                    </div>

                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                    <!-- main menu area end -->
                </div>
            </div>
        </div>
        <!-- search form start -->
        <div class="search-form-area" id="search-overlay">
            <div class="search-form-centered">
                <div id="search-box">
                    <i id="close-btn" class="fa fa-times fa-2x"></i>
                    <form class="search-form">
                        <input class="form-control" placeholder="Type your text" type="text">
                        <button type="submit">
                            <span>Search</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>




        <?php echo $__env->yieldContent('content'); ?>




        <!-- exomos footer area start -->
        <footer>
            <div id="exomos-footer-area" class="exomos-footer-area mt-10 pt-100">

                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 wow fadeInRight" data-wow-delay=".5s">
                            <div class="footer-single-wedget">
                                <div class="custom-html-widget">
                                    <!-- <h3>About Us</h3> -->
                                    <img src=" <?php echo e(asset('frontend/img/logo.png')); ?>" alt="mg logo">
                                    <img src=" <?php echo e(asset('frontend/img/yeslogo.png')); ?>" alt="yes logo">
                                    <p> With 50 years of experience in Aluminum Cutting Machine manufacturing,
                                        Tronzadoras MG has steadily grown and conquered the European market and now
                                        it is spreading its wings in the middle east.
                                    </p>
                                    <a href="http://bigleap.tech/mg/public/about-us" class="btn btn-type-5"> View More <i class="fa fa-long-arrow-right"></i> </a>
                                    <ul class="s-media">
                                        <li> <a href="https://www.facebook.com/Mg-Saws-111172718388784 "> <i class="fab fa-facebook-f"></i> </a> </li>
                                        <li> <a href="https://www.linkedin.com/in/mg-saws-85368124a/"> <i class="fab fa-linkedin-in"></i> </a> </li>
                                        <li> <a href="https://twitter.com/MGtronzadoras"> <i class="fa-brands fa-x-twitter"></i> </a> </li>
                                        <li> <a href="https://www.instagram.com/mgtronzadoras/"> <i class="fab fa-instagram" aria-hidden="true"></i></a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 wow fadeInRight" data-wow-delay=".3s">
                            <div class="footer-single-wedget">
                                <div class="widget_nav_menu">
                                    <h3> Information </h3>
                                    <ul class="menu">
                                        <li><a href="<?php echo e(url('/all-products')); ?>"> <i class="fas fa-angle-double-right"></i> products </a></li>
                                        <li><a href="<?php echo e(url('/about-us')); ?>"><i class="fas fa-angle-double-right"></i> about us</a></li>
                                        <li><a href="<?php echo e(url('/contact-us')); ?>"><i class="fas fa-angle-double-right"></i> contact</a></li>
                                        <li><a href="<?php echo e(url('/blogs')); ?>"> <i class="fas fa-angle-double-right"></i> Blogs </a></li>
                                        <li><a href="<?php echo e(url('/faq')); ?>"><i class="fas fa-angle-double-right"></i> Faq </a></li>
                                        <li><a href="<?php echo e(url('/privacy-policy')); ?>"> <i class="fas fa-angle-double-right"></i> privacy policy</a></li>
                                        <li><a href="<?php echo e(url('/terms-and-conditions')); ?>"><i class="fas fa-angle-double-right"></i> terms & conditions</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 wow fadeInRight" data-wow-delay=".2s">
                            <div class="footer-single-wedget">
                                <div class="widget_nav_menu">
                                    <h3> Location </h3>
                                    <!--ul class="menu">
                                            <?php $__currentLoopData = $allcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a href="<?php echo e(url('all-all-products/sub',$cat->slug)); ?>"><i class="fas fa-angle-double-right"></i> <?php echo e($cat->slug); ?></a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                        
                                        <!-li><a href="#"> <i class="fas fa-angle-double-right"></i> Single Blade Saw</a></li>
                                        <li><a href="#"><i class="fas fa-angle-double-right"></i> Automatic Miter Saw</a></li>
                                        <li><a href="<?php echo e(url('about-us')); ?>"><i class="fas fa-angle-double-right"></i> Machining Centers</a></li>
                                        <li><a href="<?php echo e(url('contact-us')); ?>"><i class="fas fa-angle-double-right"></i> Copy Routers</a></li>
                                        <li><a href="<?php echo e(url('/news-and-events')); ?>"> <i class="fas fa-angle-double-right"></i> End Milling Machines </a></li>
                                        <li><a href="<?php echo e(url('/all-products')); ?>"> <i class="fas fa-angle-double-right"></i> Presses </a></li->
                                    </ul-->
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.781395700687!2d55.75784029999999!3d25.0753974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ef59bec1fadd8d5%3A0x265e1f0f9bac7e56!2sMG%20TRONZADORAS!5e0!3m2!1sen!2sin!4v1665813697922!5m2!1sen!2sin" width="250" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 wow fadeInRight" data-wow-delay=".4s">
                            <div class="footer-single-wedget">
                                <div class="custom-html-widget">
                                    <h3> TRONZADORAS MG, S.A.</h3>
                                    <ul class="contact-details">
                                        <!-- <li> TRONZADORAS MG, S.A. </li> -->
                                        <li><i class="fa fa-map-marker"></i>
                                            York Engineering Solution FZC<br>
                                            OFFICE NO. LV-27D, PO BOX 42167,<br>
                                            HAMRIYAH FREE ZONE PHASE 2,<br>
                                            SHARJAH, UAE
                                        </li>
                                        <li> <i class="fas fa-phone-volume"></i> <a href="tel:+971549931425"> +971 6 5264382 </a></li>
                                        <li> <i class="fas fa-fax"></i> +971 6 5264384 </li>
                                        <li> <i class="fas fa-envelope"></i> <a href="mailto:sales@yesmachinery.ae"> sales@yesmachinery.ae </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="exomos-copyright-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="footer-copyright text-center">
                                <p>© <?php echo date("Y"); ?> All Rights Reserved By <a href="https://www.bigleap.ae/" style="color:white">BIG LEAP</a></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- =================== CTA BUTTON ==================== -->
            <div class="cta-button">
                <div class="cta-phone">
                    <a href="tel:97165264382"> <i class="fas fa-phone-alt"></i> </a>
                </div>
                <div class="cta-mail">
                    <a href="mailto:sales@yesmachinery.ae"> <i class="fas fa-envelope"></i> </a>
                </div>
                <div class="cta-whatsapp">
                    <a href="https://api.whatsapp.com/send?phone=+971508993781&text=Hello from MG Saws!"> <i class="fa-brands fa-whatsapp"></i> </a>
                </div>
            </div>

            <!-- =================== CTA BUTTON ==================== -->

        </footer>
        <!-- exomos footer area end -->

    </main>
    <!-- main area end -->
    <div class="exomos-border-line"></div>
    <!-- scrolltop button -->
    <div class="material-scrolltop"></div>

    <!-- js here -->
    <script src="<?php echo e(asset('frontend/js/modernizr-3.5.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/jquery-1.12.4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/meanmenu.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/scrolltop.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/ajax-form.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/plugins.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>
    <!-- time line -->
    <script src="<?php echo e(asset('frontend/js/timeline.js')); ?>"></script>
    <!--// time line -->

    <!-- Bothelp.io widget -->
    <!-- <script type="text/javascript">
        ! function() {
            var e = {
                    "token": "971508993781",
                    "position": "right",
                    "bottomSpacing": "100px",
                    "callToActionMessage": "Message Us",
                    "displayOn": "everywhere",
                    "subtitle": "",
                    "message": {
                        "name": "Tronzadoras MG",
                        "content": "Hello from MG Saws!",
                    }
                },
                t = document.location.protocol + "//bothelp.io",
                o = document.createElement("script");
            o.type = "text/javascript", o.async = !0, o.src = t + "/widget-folder/widget-whatsapp-chat.js", o.onload = function() {
                BhWidgetWhatsappChat.init(e)
            };
            var n = document.getElementsByTagName("script")[0];
            n.parentNode.insertBefore(o, n)
        }();
    </script> -->
    <!-- /Bothelp.io widget -->

    <!--  -->

    <?php echo $__env->yieldContent('script'); ?>


    <!-- Featured product -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#feature-slider").owlCarousel({
                items: 3,
                itemsDesktop: [1199, 2],
                itemsDesktopSmall: [980, 2],
                itemsMobile: [600, 1],
                pagination: false,
                navigationText: false,
                autoPlay: true
            });
        });
    </script>

    <!--// Featured product -->

    <!-- testimonials -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#testimonial-slider").owlCarousel({
                items: 2,
                itemsDesktop: [1000, 2],
                itemsDesktopSmall: [979, 2],
                itemsTablet: [767, 1],
                pagination: true,
                autoPlay: true
            });
        });
    </script>
    <!--// testimonials -->


    <!-- slick for brand area -->
    <script src="<?php echo e(asset('frontend/js/slick.min.js')); ?>"></script>
    <script>
        $('.logo-slider').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            infiniite: true,
            responsive: [{
                    breakpoint: 2000,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 2,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 2,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }

            ]
        });
    </script>
    <!-- slick for brand area -->


    <!-- gallery -->
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js'> </script>
    <script>
        $(document).ready(function() {

            var itemSelector = '.grid-item';

            var $container = $('#container').isotope({
                itemSelector: itemSelector,
                masonry: {
                    columnWidth: itemSelector,
                    isFitWidth: true
                }
            });

            //Ascending order
            var responsiveIsotope = [
                [480, 7],
                [720, 10]
            ];

            var itemsPerPageDefault = 12;
            var itemsPerPage = defineItemsPerPage();
            var currentNumberPages = 1;
            var currentPage = 1;
            var currentFilter = '*';
            var filterAtribute = 'data-filter';
            var pageAtribute = 'data-page';
            var pagerClass = 'isotope-pager';

            function changeFilter(selector) {
                $container.isotope({
                    filter: selector
                });
            }


            function goToPage(n) {
                currentPage = n;

                var selector = itemSelector;
                selector += (currentFilter != '*') ? '[' + filterAtribute + '="' + currentFilter + '"]' : '';
                selector += '[' + pageAtribute + '="' + currentPage + '"]';

                changeFilter(selector);
            }

            function defineItemsPerPage() {
                var pages = itemsPerPageDefault;

                for (var i = 0; i < responsiveIsotope.length; i++) {
                    if ($(window).width() <= responsiveIsotope[i][0]) {
                        pages = responsiveIsotope[i][1];
                        break;
                    }



                }

                return pages;
            }

            function setPagination() {

                var SettingsPagesOnItems = function() {

                    var itemsLength = $container.children(itemSelector).length;

                    var pages = Math.ceil(itemsLength / itemsPerPage);
                    var item = 1;
                    var page = 1;
                    var selector = itemSelector;
                    selector += (currentFilter != '*') ? '[' + filterAtribute + '="' + currentFilter + '"]' : '';

                    $container.children(selector).each(function() {
                        if (item > itemsPerPage) {
                            page++;
                            item = 1;
                        }
                        $(this).attr(pageAtribute, page);
                        item++;
                    });

                    currentNumberPages = page;

                }();

                var CreatePagers = function() {

                    // var $isotopePager = ($('.' + pagerClass).length == 0) ? $('<div class="' + pagerClass + '"></div>') : $('.' + pagerClass);

                    // $isotopePager.html('');

                    // for (var i = 0; i < currentNumberPages; i++) {
                    //     var $pager = $('<a href="javascript:void(0);" class="pager" ' + pageAtribute + '="' + (i + 1) + '"></a>');
                    //     $pager.html(i + 1);

                    //     $pager.click(function() {
                    //         var page = $(this).eq(0).attr(pageAtribute);
                    //         goToPage(page);
                    //     });

                    //     $pager.appendTo($isotopePager);
                    // }

                    // $container.after($isotopePager);

                }();

            }

            setPagination();
            goToPage(1);

            //Adicionando Event de Click para as categorias
            $('.filters a').click(function() {
                var filter = $(this).attr(filterAtribute);
                currentFilter = filter;

                setPagination();
                goToPage(1);


            });

            //Evento Responsivo
            $(window).resize(function() {
                itemsPerPage = defineItemsPerPage();
                setPagination();
            });



        });



        $(document).ready(function() {

            // filter items on button click
            $('.filter-button-group').on('click', 'li', function() {
                var filterValue = $(this).attr('data-filter');
                $('.grid').isotope({
                    filter: filterValue
                });
                $('.filter-button-group li').removeClass('active');
                $(this).addClass('active');
            });
        })


        $(document).ready(function() {


        })








        $(document).ready(function() {
            $('.popupimg').magnificPopup({
                type: 'image',
                mainClass: 'mfp-with-zoom',
                gallery: {
                    enabled: true
                },

                zoom: {
                    enabled: true,

                    duration: 300, // duration of the effect, in milliseconds
                    easing: 'ease-in-out', // CSS transition easing function

                    opener: function(openerElement) {

                        return openerElement.is('img') ? openerElement : openerElement.find('img');
                    }
                }

            });

        });
    </script>
    <!--// gallery -->

    <!-- search box header -->

    <script>
        $(document).ready(function() {

            $('#search').keyup(function() {

                var query = $(this).val();

                if (query != '') {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: "<?php echo e(route('load')); ?>",
                        method: "POST",
                        data: {
                            query: query,
                            _token: csrf,
                        },
                        success: function(data) {
                            $('#searchList').fadeIn();
                            $('#searchList').html(data);
                        }
                    });
                }
            });


            $(document).on('click', 'li#data_list', function() {
                $('#search').val($(this).text());
                $('#searchList').fadeOut();
                $('form#search_form').submit();
            });

        });
    </script>
    <?php echo $__env->yieldPushContent('child-scripts'); ?>

    <!-- search box header -->
</body>

</html><?php /**PATH D:\laragon\www\mg-saws\resources\views/welcome.blade.php ENDPATH**/ ?>