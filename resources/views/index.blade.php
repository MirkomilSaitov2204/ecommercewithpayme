@extends('layout.master')

@section('content')
<div class="hero container">
        <div class="hero-copy">
            <h1>Laravel Ecommerce Demo</h1>
            <p>Includes multiple products, categories, a shopping cart and a checkout system with Stripe integration.</p>
            <div class="hero-buttons">
                <a href="https://www.youtube.com/playlist?list=PLEhEHUEU3x5oPTli631ZX9cxl6cU_sDaR" class="button button-white">Screencasts</a>
                <a href="https://github.com/drehimself/laravel-ecommerce-example" class="button button-white">GitHub</a>
            </div>
        </div> <!-- end hero-copy -->

<div class="hero-image">
        <img src="{{ asset('front/img/macbook-pro-laravel.png') }}" alt="hero image">
        </div> <!-- end hero-image -->
    </div> <!-- end hero -->
</header>
<div class="featured-section">

        <div class="container">
            <h1 class="text-center">Laravel Ecommerce</h1>

            <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic lorem.</p>

            <div class="text-center button-container">
                <a href="#" class="button">Featured</a>
                <a href="#" class="button">On Sale</a>
            </div>



            <div class="products text-center">
                @foreach ($products as $product)
                    <div class="product">
                        <a href="{{route('shop.show', $product->slug)}}"><img src="{{asset('img/'.$product->slug.'.jpg')}}" alt="product"></a>
                        <a href="{{route('shop.show', $product->slug)}}"><div class="product-name">{{$product->name}}</div></a>
                        <div class="product-price">$.{{ $product->price/100 }}</div>
                    </div>
                @endforeach


            </div> <!-- end products -->

            <div class="text-center button-container">
            <a href="{{ route('shop.index') }}" class="button">View more products</a>
            </div>

        </div> <!-- end container -->

    </div> <!-- end featured-section -->

    <blog-posts></blog-posts>

@endsection
