<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>


    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Ecommerce Example</title>



        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="{{asset('front/fontawesome/font-awesome.min.css')}}">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('front/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">



    </head>
    <body>
        <div id="app">
            <header class="with-background">
                <div class="top-nav container">
                    <div class="top-nav-left">
                        <div class="logo">Ecommerce</div>
                        <ul>
                            <li>
                                <a href="{{route('shop.index')}}">
                                    Shop
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    About
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="top-nav-right">
                        <ul>
                            <li><a href="register.html">Sign Up</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li>
                            <a href="{{route('cart.index')}}">Cart<span class="cart-count"><span>{{Cart::instance('default')->count()}}</span></span></a>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end top-nav -->




            @yield('content')






            <footer>
    <div class="footer-content container">
        <div class="made-with">Made with <i class="fa fa-heart heart"></i> by Andre Madarang</div>
        <ul>
                        <li>Follow Me:</li>
                <li><a href="#"><i class="fa Follow Me:"></i></a></li>
                    <li><a href="http://andremadarang.com/"><i class="fa fa-globe"></i></a></li>
                    <li><a href="http://youtube.com/drehimself"><i class="fa fa-youtube"></i></a></li>
                    <li><a href="http://github.com/drehimself"><i class="fa fa-github"></i></a></li>
                    <li><a href="http://twitter.com/drehimself"><i class="fa fa-twitter"></i></a></li>
    </ul>

    </div> <!-- end footer-content -->
</footer>

        </div> <!-- end #app -->
        <script src="{{ asset('front/js/app.js') }}"></script>
        {{-- <script src="{{ asset('front/cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js') }}"></script> --}}
{{-- <script src="{{ asset('front/cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js') }}"></script> --}}
{{-- <script src="{{asset('front/js/algolia.js')}}"></script> --}}

@yield('extra_js')
    </body>

<!-- Mirrored from laravelecommerceexample.ca/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Jan 2020 08:28:34 GMT -->
</html>
