  @extends('welcome')
  @section('meta')
  <title>Aluminium Fabrication Machine Supplier,UAE,GCC|TRONZADORAS MG</title>
  <meta name="description" content="We are the top Aluminium Fabrication Machine Supplier in UAE supplying quality Aluminium Cutting,drilling Machines in GCC countries at the best price">

  @endsection
  @section('style')
  <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }} ">
  <link rel="stylesheet" href="{{ asset('frontend/css/slick.theme.css') }} ">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  @endsection
  @section('content')

  <!-- exomos title area start -->
  <div id="exomos-breadcrumb-area" class="exomos-breadcrumb-area text-center">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="breadcrumb-content-box">
                      <h1>Products </h1>
                      <ul class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a href="{{ url('/') }}" title="Home"><i class="fa fa-home"></i> Home</a></li>
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
              @foreach ($categories as $category)

              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <a href="{{ url('all-products/sub/'.$category->slug) }}">
                      <div class="box">
                          <img src=" {{ asset('storage/'.$category->tumb) }}" alt="{{ $category->image_alt }}" title="{{ $category->image_alt }}">
                          <div class="box-content">
                              <h3 class="title">{{ $category->name }}</h3>

                              <!-- <ul class="icon">
                            <li><i class="fa fa-search"></i></li> 
                         </ul> -->
                          </div>

                      </div>

                      <h5> {{ $category->name }}</h5>
                  </a>
              </div>

              @endforeach
          </div>
      </div>
  </section>

  @endsection
  <!-- js here -->
  @section('script')
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
  @endsection