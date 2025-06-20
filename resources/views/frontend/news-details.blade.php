@extends('welcome')
@section('meta')
<title>{{$event->meta_title}} </title>
<meta name="description" content="{{$event->meta_content}}">
<meta property="og:title" content="{{$event->meta_title}}" />

<meta property="og:description" content="{{$event->meta_content}}" />

<meta property="og:url" content="{{ url('news-details/'.$event->slug) }}" />



<meta property="og:image" content="{{ asset('storage/'.$event->image) }}" />

<meta property="og:image:secure_url" content="{{ asset('storage/'.$event->image) }}" />

<meta property="og:image:width" content="560" />

<meta property="og:image:height" content="315" />



<meta name="twitter:card" content="summary" />

<meta name="twitter:description" content="{{$event->meta_content}}" />

<meta name="twitter:title" content="{{$event->meta_title}}" />

<meta name="twitter:image" content="{{ asset('storage/'.$event->image) }}" />

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
                    <h1> Blogs </h1>
                    <ul class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" title="Home"><i class="fa fa-home"></i> Home</a></li>
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
                <h2> {{ $event->name }} </h2>
                <div class="post-admininfo">
                    <span><a href="#"> <i class="fas fa-calendar-alt"></i> {{ $event->created_at->format('Y-m-d') }}</a></span>

                </div>
                <ul class="bred">
                    <li> <a href="{{ url('/') }}"> Home </a></li>
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
                <img src="{{ asset('storage/'.$event->image) }}" alt="{{$event->image_alt}}" title="{{$event->image_alt}}">
            </div>
        </div>


        <div class="row feeds">
            <div class="col-lg-12 col-md-12">
                <div class="news-detail">
                    {!! $event->detail !!}
                </div>



                <div class="col-md-12 related">
                    <h2> Related Blogs </h2>
                    <div id="news-slider" class="owl-carousel">
                        @foreach ($latests as $latest)
                        <div class="post-slide p-2">
                            <div class="pic">
                                <img src="{{ asset('storage/'.$latest->image) }}" alt="{{$latest->image_alt}}" title="{{$latest->image_alt}}">
                            </div>
                            <ul class="post-bar">
                                <!-- <li><i class="fa fa-users"></i> <a href="#">Admin</a></li> -->
                                <li><i class="fa fa-clock-o"></i>{{ $latest->created_at->format('Y-m-d') }}</li>
                                <!-- <li><i class="fa fa-comments"></i> <a href="#">3 Comment</a></li> -->
                            </ul>
                            <p class="post-description">
                                {{ Str::limit($latest->name , 40) }}
                            </p>
                            <a href="{{ url('news-details/'.$latest->slug) }}" class="read-more">read more</a>
                        </div>
                        @endforeach
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

@push('child-scripts')
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
@endpush
@endsection