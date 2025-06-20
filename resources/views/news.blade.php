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



<!--==============================
            News-area-start 
 ===============================-->
<section class="news-page-area">


    <div class="container">
        <div class="row news-box">
            @foreach ($events as $event)
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-4 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                <div class="single-blog-wraper mb-30">
                    <div class="blog-img">
                        <img src=" {{ url('/storage/'.$event->image) }}" alt="blog-img">
                    </div>

                    <div class="single-blog-content">
                        <div class="blog-post-comment">
                            <div class="blog-post-admininfo">
                                <span><a href="#">{{ $event->created_at->format('Y-m-d') }}</a></span>
                            </div>


                        </div>
                        <h3 href="#" class="post-title">{{ Str::limit($event->name , 40) }}</h3>
                        <p>{{ Str::limit($event->detail, 100) }}</p>
                        <a href="{{ url('blog-details',$event->id) }}" class="news-more"> Read More <i class="fa fa-long-arrow-right"></i> </a>
                    </div>
                </div>
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