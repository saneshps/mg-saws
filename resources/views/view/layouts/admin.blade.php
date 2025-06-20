<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="robots" content="noindex,nofollow">
    <title>MG</title>
    <link rel="canonical" href="" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <!-- Custom CSS -->
    <link href="  {{ asset('dist/css/style.css') }}" rel="stylesheet">
    @yield('style')
</head>

<body class="skin-default-dark fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">MG</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src=" {{ asset('assets/images/logo-icon.png') }}" alt="homepage " class="dark-logo" style="width: 30px;" />
                            <!-- Light Logo icon -->
                            <img src="{{ asset('assets/images/logo-icon.png') }}" alt="homepage" class="light-logo" style="width: 30px;" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text<span> -->
                        <!-- dark Logo text -->
                        <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" /> -->
                        <!-- Light Logo text -->
                        <!-- <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> -->
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item hidden-sm-up"> <a class="nav-link nav-toggler waves-effect waves-light" href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="fa fa-times"></i></a>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('assets/images/users/1-01.jpg') }}" alt="user" class="img-circle" width="30">
                            </a>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                @guest
                                @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <!-- <span style="font-size:18px; padding-right:20px; color:#12AEE3;"><strong>{{ Auth::user()->name }}</strong></span> -->
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                </div>
                </li>
                </ul>
    </div>
    </nav>
    </header>
    <aside class="left-sidebar">
        <div class="d-flex no-block nav-text-box align-items-center">
            <span><img src="{{ asset('assets/images/logo-icon.png') }}" alt="elegant admin template" style="width: 30px;"></span>
            <a class="waves-effect waves-dark ml-auto hidden-sm-down" href="javascript:void(0)"><i class="ti-menu"></i></a>
            <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        </div>
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li> <a class="waves-effect waves-dark" href="{{ route('admin.home') }}" aria-expanded="false"><i class="fa fa-institution "></i><span class="hide-menu">Dashboard</span></a></li>


                    <li> <a class="waves-effect waves-dark" href="{{ route('category.create') }}" aria-expanded="false"><i class="fa fa-plus-square"></i><span class="hide-menu"></span>Create Category</a></li>

                    <li> <a class="waves-effect waves-dark" href="{{ route('category.index') }}" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu"></span>Category</a></li>


                    <li> <a class="waves-effect waves-dark" href="{{ route('products.create') }}" aria-expanded="false"><i class="fa  fa-plus-square"></i><span class="hide-menu"></span>Create Product</a></li>

                    <li> <a class="waves-effect waves-dark" href="{{ route('products.index') }}" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu"></span>Products</a></li>

                    <li> <a class="waves-effect waves-dark" href="{{ route('events.index') }}" aria-expanded="false"><i class="fa  fa-calendar"></i><span class="hide-menu"></span>Blogs</a></li>


                </ul>
            </nav>
        </div>
    </aside>

    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Tronzadoras MG</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Table produt</li>
                        </ol>

                    </div>
                </div>
            </div>
            <div class="row">
                @yield('content')

            </div>
        </div>
    </div>
    <footer class="footer">
        © {{date('Y')}} Admin by <a href="#">bigleap.ae</a>
    </footer>
    </div>
    <script src=" {{ asset('assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="  {{ asset('assets/node_modules/popper/popper.min.js') }}"></script>
    <script src="  {{ asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="  {{ asset('dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="  {{ asset('dist/js/waves.js') }}"></script>
    <script src="  {{ asset('dist/js/sidebarmenu.js') }}"></script>
    <script src="  {{ asset('assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src=" {{ asset('assets/node_modules/sparkline/jquery.sparkline.min.js ') }}"></script>
    <script src="  {{ asset('dist/js/custom.min.js') }}"></script>
    @yield('script')
    <script>
        var number = 1;
        do {
            function showPreview(event, number) {
                if (event.target.files.length > 0) {
                    let src = URL.createObjectURL(event.target.files[0]);
                    let preview = document.getElementById("file-ip-" + number + "-preview");
                    preview.src = src;
                    preview.style.display = "block";
                }
            }

            function myImgRemove(number) {
                document.getElementById("file-ip-" + number + "-preview").src = "https://i.ibb.co/ZVFsg37/default.png";
                document.getElementById("file-ip-" + number).value = null;
            }
            number++;
        }
        while (number < 5);
    </script>
</body>

</html>