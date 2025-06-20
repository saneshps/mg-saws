@extends('welcome')
@section('meta')
<title>Aluminum Cutting Machine Dealer,UAE,GCC|Gallery|TRONZADORAS MG </title>
<meta name="description" content="We are the best quality Aluminum Profile Machine Manufacturer&Supplier in UAE providing quality equipments in GCC countries at the best price from top brands">

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
                    <h1> Gallery </h1>
                    <ul class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" title="Home"><i class="fa fa-home"></i> Home</a></li>
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
                @foreach ($categories as $cat)
                <li><a href="javascript:void(0);" data-filter="{{ $cat->id}}"> {{ $cat->name }} </a></li>
                @endforeach
                <!--li><a href="javascript:void(0);" data-filter="centers"> MACHINING CENTERS </a></li>
                
                <li><a href="javascript:void(0);" data-filter="charts"> PROFILE CHARTS </a></li-->
            </ul>
        </div>
        <div id="container" class="isotope">
            @foreach ($pro as $catt)
            <div class="grid-item" data-filter="{{ $catt->category }}">
                <a href=" {{ route('show-product', $catt->slug) }}">
                    <img src="https://www.mgsaws.com/storage/product/20230109072425.webp" alt="{{$catt->image_alt}}" title="{{$catt->image_alt}}">
                    <!-- <img src=" {{ url('/storage/'.$catt->image) }}" alt="{{$catt->image_alt}}" title="{{$catt->image_alt}}"> -->
                    <div class="overlay"> {{ $catt->name }} </div>
                </a>

            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- =========================
       Gallery area end
     ======================== -->







@endsection
<!-- js here -->
@section('script')
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

@endsection
<!-- js here -->

<!-- Initialize Swiper -->