  
  <?php $__env->startSection('meta'); ?>
  <title><?php echo e($products->metatitle); ?> </title>
  <meta name="description" content="<?php echo e($products->metadescription); ?> ">

  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('style'); ?>
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/slick.css')); ?> ">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/slick.theme.css')); ?> ">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/button.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/fancybox.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/tab.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/table.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/responsive.css')); ?>">
  <!-- related proucts -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <!-- related proucts -->
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('content'); ?>

  <!-- exomos title area start -->
  <div id="exomos-breadcrumb-area" class="exomos-breadcrumb-area text-center">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="breadcrumb-content-box">
            <h1> Products Details </h1>
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


  <!-- product-details area start -->

  <section class="product-details">
    <div class="container">
          <?php if(Session::get('interest')): ?>
        <div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong><?php echo e(Session::get('interest')); ?></strong>
</div>
 <?php endif; ?>
 <?php if(Session::get('callback')): ?>
        <div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong><?php echo e(Session::get('callback')); ?></strong>
</div>
 <?php endif; ?>
      <div class="row">

        <div class="col-lg-5 product-face-2">
          <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
            <div class="swiper-wrapper sw-h">

              <div class="swiper-slide">
                <img src="<?php echo e(asset('storage/'.$products->image)); ?>" alt="<?php echo e($products->image_alt); ?>" title="<?php echo e($products->image_alt); ?>" />
              </div>
              <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="swiper-slide">
                <img src="<?php echo e(asset('storage/'.$image->file_name)); ?>" alt="<?php echo e($image->image_alt); ?>" title="<?php echo e($image->image_alt); ?>" />
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
          <div thumbsSlider="" class="swiper mySwiper">
            <div class="swiper-wrapper  sw-l">
              <div class="swiper-slide">
                <img class="thumb-image" src="<?php echo e(asset('storage/'.$products->image)); ?>" alt="<?php echo e($products->image_alt); ?>" title="<?php echo e($products->image_alt); ?>" />
              </div>
              <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="swiper-slide">
                <img class="thumb-image" src="<?php echo e(asset('storage/'.$image->file_name)); ?>" alt="<?php echo e($image->image_alt); ?>" alt="<?php echo e($image->image_alt); ?>" />
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>

        </div>

        <div class="col-lg-7 product-face-1">
          <h2 class="px-3"> <?php echo e($products->model_no); ?> </h2>
          <h4 class="px-3"> <?php echo e($products->name); ?></h4>

          <p class="py-3 px-3"> <?php echo $products->desc; ?>

          </p>

          <!-- table -->
          <!-- <table class="responsive-table">
            <thead>
              <tr>
                <th scope="col"> Specification </th>
                <th scope="col"> </th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <th scope="row"> Minimum Order Quantity </th>
                <td data-title="Released"> 1 Piece </td>
              </tr>
              <tr>
                <th scope="row"> Place Of Origin </th>
                <td data-title="Released"> India </td>
              </tr>
              <tr>
                <th scope="row">Portable</th>
                <td data-title="Released">Yes</td>
              </tr>
              <tr>
                <th scope="row"> Automatic Grade </th>
                <td data-title="Released">Semi-Automatic</td>
              </tr>
              <tr>
                <th scope="row">Capacity</th>
                <td data-title="Released">10000</td>
              </tr>
              <tr>
                <th scope="row"> Machine Type </th>
                <td data-title="Released">Semi-Automatic</td>
              </tr>
              <tr>
                <th scope="row">Material To Be Cut </th>
                <td data-title="Released">Aluminium</td>
              </tr>
              <tr>
                <th scope="row"> Motor </th>
                <td data-title="Released">2 Hp</td>
              </tr>

            </tbody>
          </table> -->
          <!-- table -->

          <!-- express intrest -->
          <div class="expres-intrest">
            <button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter">
              Express Interest
            </button>
            <button type="button" class="btn request-call" data-toggle="modal" data-target="#exampleModalCenter2">
              <i class="fas fa-phone-alt"></i>
              Request a call back
            </button>
<style>
#Contact{
	     background-color: white;
}	
</style>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form -->
                    <form id="contact" class="interest_send" action="<?php echo e(route('interest.send')); ?>" method="post">
                      <?php echo csrf_field(); ?>
					
                      <input type="hidden" name="category" id="category" value="<?php echo e($products->category_name); ?>" />
                      <input type="hidden" name="product" id="product" value="<?php echo e($products->name); ?>" />
                      <h3> Express Interest For the Product </h3>
                      <fieldset>
                        <input placeholder="Your name" type="text" tabindex="1" required autofocus name="name" id="name">
                      </fieldset>
                      <fieldset>
                        <input placeholder="Your Email Address" type="email" tabindex="2" required name="email" id="email">
                      </fieldset>
                      <fieldset>
                        <input placeholder="Your Phone Number" type="tel" tabindex="3" required name="phone" id="phone">
                      </fieldset>
					  <script src="https://www.google.com/recaptcha/api.js" async defer></script>  
					  <fieldset>
			          
					      			 <div class="g-recaptcha" id="feedback-recaptcha" data-callback="recaptchaCallback" data-sitekey="<?php echo e(env('GOOGLE_RECAPTCHA_KEY')); ?>">
                    </div>
					<br>
					  </fieldset>
                      <fieldset style="border: none !important;">
                        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">SUBMIT</button>
                        <p id="esubmit-msg"></p>
                      </fieldset>
                    </form>
                    <!-- form -->
                  </div>

                </div>
              </div>
            </div>

            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <!-- form -->
                    <form id="contact" class="call_back" action="<?php echo e(route('callBack.send')); ?>" method="post">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" name="category" id="category" value="<?php echo e($products->category_name); ?>" />
                      <input type="hidden" name="product" id="product" value="<?php echo e($products->name); ?>" />
                      <h3> Request Call Back</h3>
                      <fieldset>
                        <input placeholder="Your name" type="text" tabindex="1" required autofocus name="name" id="name">
                      </fieldset>
                      <fieldset>
                        <input placeholder="Your Email Address" type="email" tabindex="2" required name="email" id="email">
                      </fieldset>
                      <fieldset>
                        <input placeholder="Your Phone Number" type="tel" tabindex="3" required name="phone" id="phone">
                      </fieldset>
					    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
					   <fieldset>
					                  
					      			 <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="<?php echo e(env('GOOGLE_RECAPTCHA_KEY')); ?>">
                    </div>
					<br>
					  </fieldset>
                      <fieldset style="border: none !important;">
                        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">SUBMIT</button>
                        <p id="esubmit-msg"></p>
                      </fieldset>
                    </form>
                    <!-- form -->
                  </div>

                </div>
              </div>
            </div>



          </div>
          <!-- express intrest -->
        </div>


      </div>

      <div class="row mr-0">
        <!-- ============  Tab START ============ -->
        <div class="tabs">
          <input type="radio" name="tab" id="tab1" checked="checked">
          <label for="tab1"> Specifications </label>
          <!-- <input type="radio" name="tab" id="tab2">
          <label for="tab2"> Videos </label> -->
          <input type="radio" name="tab" id="tab3">
          <label for="tab3"> Graph </label>
          <input type="radio" name="tab" id="tab4">
          <label for="tab4">Datasheet</label>

          <div class="tab-content-wrapper">
            <div id="tab-content-1" class="tab-content">
              <ul>
                <li> <span> Model : </span> <?php echo e($products->model_no); ?> </li>
                <li> <span> Name : </span> <?php echo e($products->name); ?> </li>
                <li> <span> Category : </span> <?php echo e($products->category_name); ?> </li>
                <li> <span> Options : </span><?php if($products->option): ?> <?php echo $products->option; ?><?php else: ?> -- <?php endif; ?> </li>
                <li> <span> Package : </span><?php if($products->package): ?> <?php echo $products->package; ?> <?php else: ?> -- <?php endif; ?> </li>
              </ul>

            </div>
            <!-- <div id=" tab-content-2" class="tab-content">
              <div class="row">
                <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
                  <div class="face2">
                    <div class="videos-content-area">
                      <iframe src="<?php echo e(asset($video->pdf)); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                    </div>
                  </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
                  <div class="face2">
                    <div class="videos-content-area">
                      <iframe src="https://www.youtube.com/embed/isKbaZHUy1g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
                  <div class="face2">
                    <div class="videos-content-area">
                      <iframe src="https://www.youtube.com/embed/isKbaZHUy1g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">
                  <div class="face2">
                    <div class="videos-content-area">
                      <iframe src="https://www.youtube.com/embed/isKbaZHUy1g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                    </div>
                  </div>
                </div>
              
              </div>
            </div> -->
            <div id="tab-content-3" class="tab-content">

              <div class="row">
                <?php $__currentLoopData = $graphs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $graph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-4 col-lg-4 col-md-6">
                  <a data-fancybox="gallery" href="<?php echo e(asset('storage/'. $graph->graph)); ?>"><img src="<?php echo e(asset('storage/'. $graph->graph)); ?>"></a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- <div class="col-xl-4 col-lg-4 col-md-6">
                  <a data-fancybox="gallery" href="https://www.mgsaws.com/storage/productgraph/20211102094003.jpg"><img src="https://www.mgsaws.com/storage/productgraph/20211102094003.jpg"></a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                  <a data-fancybox="gallery" href="https://www.mgsaws.com/storage/productgraph/20211102094003.jpg"><img src="https://www.mgsaws.com/storage/productgraph/20211102094003.jpg"></a>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                  <a data-fancybox="gallery" href="https://www.mgsaws.com/storage/productgraph/20211102094003.jpg"><img src="https://www.mgsaws.com/storage/productgraph/20211102094003.jpg"></a>
                </div> -->
              </div>
            </div>
            <div id="tab-content-4" class="tab-content">

              <div class="row">
                <?php $__currentLoopData = $datasheets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-4 col-lg-4 col-md-6">
                  <div class="face2">
                    <iframe src="<?php echo e(asset('storage/'. $data->file_name)); ?>" title="Datasheet" frameborder="0"></iframe>
                  </div><div class="face2"><a href="<?php echo e(asset('storage/'. $data->file_name)); ?>" target="_blank">Click Here</a></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              </div>
            </div>
          </div>
        </div>
        <!-- ============  Tab END ============ -->
      </div>
      <?php if(count($relatedProducts ) >0): ?>
      <!-- related products -->
      <div class="row">
        <div class="swiper relatedProduct">

          <h3> Related Products </h3>
          <div class="swiper-wrapper">
            <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide">
              <a href="<?php echo e(url('show-product/'.$related->slug)); ?>"><img src="<?php echo e(asset('storage/'. $related->image)); ?>" alt="" style="width: 70%;" alt="<?php echo e($related->image_alt); ?>" title="<?php echo e($related->image_alt); ?>">
              <h6 class="mt-2" style="font-weight:700"><?php echo e($related->name); ?></h6></a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <!-- <div class="swiper-slide">
              <img src="https://www.mgsaws.com/storage/product/20211102063710.jpg" alt="">
            </div>


            <div class="swiper-slide">
              <img src="https://www.mgsaws.com/storage/product/20211102063710.jpg" alt="">
            </div>


            <div class="swiper-slide">
              <img src="https://www.mgsaws.com/storage/product/20211102063710.jpg" alt="">
            </div>


            <div class="swiper-slide">
              <img src="https://www.mgsaws.com/storage/product/20211102063710.jpg" alt="">
            </div> -->


          </div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>

        </div>
      </div>
      <!-- related products -->
      <?php endif; ?>
      <div class="row">
        <div class="col-12">&nbsp;</div>
      </div>
    </div>
  </section>
  <!-- product-details area end -->


  <!-- youtube area start -->

  <?php $__env->stopSection(); ?>
  <!-- js here -->
  <?php $__env->startSection('script'); ?>


  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
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


  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
  <!-- tab -->
  <!-- <script src='https://code.jquery.com/jquery-1.9.1.min.js'></script> -->
  <script src="<?php echo e(asset('frontend/js/tab.js')); ?>"></script>
  <!-- tab -->

  <!-- related products -->
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".relatedProduct", {
      slidesPerView: 3,
      spaceBetween: 30,
      slidesPerGroup: 1,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      loop: true,
      loopFillGroupWithBlank: true,
      breakpoints: {
        320: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 2,
          spaceBetween: 50,
        },
        1366: {
          slidesPerView: 3,
          spaceBetween: 50,
        },
        1920: {
          slidesPerView: 3,
          spaceBetween: 50,
        },
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
   <script type="text/javascript">
    // $(document).ready(function(e) {
      // $.ajaxSetup({
        // headers: {
          // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        // }
      // });

      // var loading = false;
      // $('.interest_send').on('submit', function(e) {
        // e.preventDefault();
        // loading = true;
      // });


    // });

    //Express interest form
    // if ($(".interest_send").length > 0) {
      // $(".interest_send").validate({
        // rules: {
          // name: {
            // required: true,
            // maxlength: 20
          // },
          // email: {
            // required: true,
            // maxlength: 50,
            // email: true
          // },
          // phone: {
            // required: true,
            // maxlength: 12
          // },
        // },
        // messages: {
          // name: {
            // required: "Please enter fullname",
            // maxlength: "Your name maxlength should be 20 characters long."
          // },
          // email: {
            // required: "Please enter valid email",
            // email: "Please enter valid email",
            // maxlength: "The email name should less than or equal to 50 characters",
          // },
          // phone: {
            // required: "Please enter mobile",
            // maxlength: "Your mobile number maxlength should be 12 characters long."
          // },
        // },
        // submitHandler: function(form) {
          // $.ajaxSetup({
            // headers: {
              // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            // }
          // });
          // $('#contact-submit').html('Loading...');
          // $("#contact-submit").attr("disabled", true);
          // $.ajax({
            // url: "<?php echo e(route('interest.send')); ?>",
            // type: "POST",
            // data: $('.interest_send').serialize(),
            // success: function(response) {
              //$('#contact-submit').html('<i class="fa-solid fa-paper-plane"></i>');
              //  $("#contact-submit").attr("disabled", false);
              // $('#esubmit-msg').html(response.message).delay(5000).fadeOut('slow');

              // document.getElementsByClassName("interest_send").reset();
            // }
          // });
        // }
      // })
    // }
	


</script>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\mg-saws\resources\views/frontend/product-details.blade.php ENDPATH**/ ?>