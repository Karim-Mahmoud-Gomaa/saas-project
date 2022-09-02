<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from quiety.themetags.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Jun 2022 10:39:25 GMT -->
<head>
    <!--required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    
    <!--twitter og-->
    <meta name="twitter:site" content="@themetags">
    <meta name="twitter:creator" content="@themetags">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Quiety - Creative SAAS Technology & IT Solutions Bootstrap 5 HTML Template">
    
    <meta name="twitter:image" content="#">  
    @yield('seo')
    <!--facebook og-->
    <meta property="og:url" content="#">
    <meta name="twitter:title" content="Quiety - Creative SAAS Technology & IT Solutions Bootstrap 5 HTML Template">
    <meta property="og:description" content="Quiety creative Saas, software technology, Saas agency & business Bootstrap 5 Html template. It is best and famous software company and Saas website template.">
    <meta property="og:image" content="#">
    <meta property="og:image:secure_url" content="#">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
    
    <!--meta-->
    <meta name="description" content="Quiety creative Saas, software technology, Saas agency & business Bootstrap 5 Html template. It is best and famous software company and Saas website template.">
    <meta name="author" content="ThemeTags">
    
    <!--favicon icon-->
    <link rel="icon" href="{{asset('assets/web/img/favicon.png')}}" type="image/png" sizes="16x16">
    
    <!--title-->
    
    
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&amp;family=Open+Sans:wght@400;600&amp;display=swap" rel="stylesheet">
    
    <!--build:css-->
    <link rel="stylesheet" href="{{asset('assets/web/css/main.css')}}">
    <!-- endbuild -->
    
    <!--custom css start-->
    <link rel="stylesheet" href="{{asset('assets/web/css/custom.css')}}">
    <!--custom css end-->
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap" rel="stylesheet">
    @php
    $lang=LaravelLocalization::getCurrentLocale();
    @endphp
    @if ($lang=='ar')
    <style>
        .ar-font{
            font-family: 'Noto Kufi Arabic', sans-serif !important;
            text-align: right;
        }
        .rtl{
            direction: rtl !important;
        }
        li > .active{
            font-weight: 600;
        }
        
    </style>
    @endif
</head>

<body>
    
    <!--preloader start-->
    <div id="preloader">
        <div class="preloader-wrap">
            <img src="{{asset('assets/web/img/favicon.png')}}" alt="logo" class="img-fluid preloader-icon" />
            <div class="loading-bar"></div>
        </div>
    </div>
    <!--preloader end-->
    <!--main content wrapper start-->
    <div class="main-wrapper">
        
        @sectionMissing('header')
        <!--header section start-->
        @include('webcompany::layouts.header')
        <!--header section end-->
        @endif
        
        
        <!--content section start-->
        @yield('content')
        <!--content section end-->
        
        
        @sectionMissing('footer')
        <!--footer section start-->
        @include('webcompany::layouts.footer')
        <!--footer section end-->
        @endif
        
    </div>
    
    
    
    <!--build:js-->
    <script src="{{asset('assets/web/js/vendors/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/web/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/web/js/vendors/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/web/js/vendors/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/web/js/vendors/parallax.min.js')}}"></script>
    <script src="{{asset('assets/web/js/vendors/aos.js')}}"></script>
    <script src="{{asset('assets/web/js/app.js')}}"></script>
    <!--endbuild-->
</body>


<!-- Mirrored from quiety.themetags.com/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Jun 2022 10:39:51 GMT -->
</html>