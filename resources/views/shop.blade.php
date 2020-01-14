@extends('layout.master')
@section('content')

</header>


<div class="breadcrumbs">
<div class="breadcrumbs-container container">
    <div>
        <a href="/">Home  </a>
    <i class="fa fa-chevron-right breadcrumb-separator">></i>
    <span>Shop</span>
    </div>

</div>
</div> <!-- end breadcrumbs -->

<div class="container">

        </div>

<div class="products-section container">
    <div class="sidebar">
        <h3>By Category</h3>
        <ul>
            @foreach ($categories as $category)
                 <li> <a href="{{route('shop.index',['category'=>$category->slug])}}">{{$category->name}}</a></li>
            @endforeach
        </ul>
        <h3>By Price</h3>
        <ul>
            <li class=""><a href="shop8387.html?category=laptops">100</a></li>
            <li class=""><a href="shop015b.html?category=desktops">200</a></li>
            <li class=""><a href="shop2d05.html?category=mobile-phones">300 </a></li>
            <li class=""><a href="shopdd66.html?category=tablets">400</a></li>
            <li class=""><a href="shope10b.html?category=tvs">500</a></li>
            <li class=""><a href="shop8d34.html?category=digital-cameras">600 </a></li>
            <li class=""><a href="shop9a8c.html?category=appliances">700</a></li>
        </ul>
    </div> <!-- end sidebar -->
    <div>
        <div style="display:flex; justify-content:space-between">
            <h1 class="stylish-heading">{{$categoryName}}</h1>
            <div >
                    <strong>Price:</strong>
                    <a href="{{route('shop.index',['category'=>request()->category, 'sort'=>'low_high'])}}">Low to High |</a>
                    <a href="{{route('shop.index',['category'=>request()->category, 'sort'=>'high_low'])}}">High to Low</a>
            </div>
        </div>
        <div class="products text-center">
            @foreach ($products as $product)
                <div class="product">
                    <a href="{{route('shop.show', $product->slug)}}"><img src="{{asset('img/'.$product->slug.'.jpg')}}" alt="product"></a>
                    <a href="{{route('shop.show', $product->slug)}}"><div class="product-name">{{ $product->name }}</div></a>
                    <div class="product-price">$.{{ $product->price/100 }}</div>
                </div>
            @endforeach

        </div> <!-- end products -->


        <div class="spacer"></div>

    </div>
</div>



    <!-- Include AlgoliaSearch JS Client and autocomplete.js library -->

@endsection
