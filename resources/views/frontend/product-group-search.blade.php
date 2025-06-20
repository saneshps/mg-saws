  @extends('welcome')
  @php
  $slug = ucwords(str_replace('-',' ',$slug));
  @endphp
  @section('meta')
  <title> {{ $slug }}</title>
  <meta name="description" content="{{ $slug }}">

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
                      <h1>{{ $slug }}</h1>
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
          <h2> {{ $slug }}</h2>
          
          <div class="row">
           
            
                 
				  @foreach ($products as $product)
				  <div class="col-md-4 col-sm-6">
					  <a href="{{ url('show-product/'.$product->slug) }}">
						  <div class="box">
							  <img src=" {{ asset('storage/'.$product->image) }}" alt="{{ $product->image_alt }}" title="{{ $product->image_alt }}">
							  <div class="box-content">
								  <h3 class="title">{{ $product->name }}</h3>

								  <!-- <ul class="icon">
							 <li><i class="fa fa-search"></i></li> 
						  </ul> -->
							  </div>

						  </div>

						  <h5> {{ $product->name }}</h5>
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