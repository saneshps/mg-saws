@extends('welcome')
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
                    <h1> Blog Details </h1>
                    <ul class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}" title="Home"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item active"> Blog Details </li>
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
                    <li><a> News & Events </a> </li>
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
                <img src=" {{ url('/storage/'.$event->image) }}" alt="news">
            </div>
        </div>


        <div class="row feeds">
            <div class="col-lg-12 col-md-12">
                <div class="news-detail">
                    {{ $event->detail }}
                </div>



                <div class="col-md-12 related">
                    <h2> Related News </h2>
                    <div id="news-slider" class="owl-carousel">
                        @foreach ($latests as $latest)
                        <div class="post-slide p-2">
                            <div class="pic">
                                <img src="{{ url('/storage/'.$latest->image) }}" alt="news">
                            </div>
                            <ul class="post-bar">
                                <!-- <li><i class="fa fa-users"></i> <a href="#">Admin</a></li> -->
                                <li><i class="fa fa-clock-o"></i>{{ $latest->created_at->format('Y-m-d') }}</li>
                                <!-- <li><i class="fa fa-comments"></i> <a href="#">3 Comment</a></li> -->
                            </ul>
                            <p class="post-description">
                                {{ Str::limit($latest->name , 40) }}
                            </p>
                            <a href="{{ url('blog-details',$event->id) }}" class="read-more">read more</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!--div class="col-xl-4 col-lg-4 col-md-4">
                    
                       
                        <div class="single-sid-wdg wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="widget_categories">
                                <h3> Category </h3>
                                <ul>
                                @foreach ($categories as $category)
                                    <li><a href="{{ url('all-products/sub',$category->id) }}"> <i class="fas fa-long-arrow-alt-right"></i> {{ $category->name }}</a></li>
                                @endforeach
                                </ul>
                            </div>
                        </div>

            </div-->
        </div>
    </div>
</section>


<!--==============================
            News-area-end 
 ===============================-->



@endsection
<!-- js here -->
@section('script')
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
@endsection