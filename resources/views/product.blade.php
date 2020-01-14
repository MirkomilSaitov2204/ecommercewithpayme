@extends('layout.master')

@section('content')

</header>


<div class="breadcrumbs">
<div class="breadcrumbs-container container">
    <div>
        <a href="/">Home</a>
    <i class="fa fa-chevron-right breadcrumb-separator">></i>
    <span><a href="{{ route('shop.index') }}">Shop</a></span>
    <i class="fa fa-chevron-right breadcrumb-separator">></i>
    <span>{{$product->name}}</span>
    </div>

</div>
</div> <!-- end breadcrumbs -->

<div class="container">

        </div>

<div class="product-section container">
    <div>
        <div class="product-section-image">
            <img src="{{asset('img/'.$product->slug.'.jpg')}}" alt="product" class="active" id="currentImage">
        </div>
        <div class="product-section-images">
            <div class="product-section-thumbnail selected">
                <img src="{{asset('img/'.$product->slug.'.jpg')}}" alt="product">
            </div>

                                                    <div class="product-section-thumbnail">
                    <img src="{{asset('img/'.$product->slug.'.jpg')}}" alt="product">
                </div>
                                    <div class="product-section-thumbnail">
                    <img src="{{asset('img/'.$product->slug.'.jpg')}}" alt="product">
                </div>
                                    <div class="product-section-thumbnail">
                    <img src="{{asset('img/'.$product->slug.'.jpg')}}" alt="product">
                </div>
                                            </div>
    </div>
    <div class="product-section-information">
    <h1 class="product-section-title">{{$product->name}}</h1>
        <div class="product-section-subtitle">{{$product->detail}}</div>
        <div><div class="badge badge-success">In Stock</div></div>
        <div class="product-section-price">$.{{$product->price/100}}</div>

        <p>
                {{$product->description}}
        </p>

        <p>&nbsp;</p>

                <form action="{{ route('cart.store') }}" method="POST">
                     {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="name" value="{{$product->name}}">
                    <input type="hidden" name="price" value="{{$product->price/100}}">
                <button type="submit" class="button button-plain">Add to Cart</button>
            </form>
                </div>
</div> <!-- end product-section -->

<div class="might-like-section">
<div class="container">
    <h2>You might also like...</h2>
    <div class="might-like-grid">
        @foreach ($mightLike as $like)
            <a href="{{route('shop.show', $like->slug)}}" class="might-like-product">
                <img src="{{asset('img/'.$like->slug.'.jpg')}}" alt="product">
                <div class="might-like-product-name">{{$like->name}}</div>
                <div class="might-like-product-price">$.{{$like->price/100}}</div>
            </a>
        @endforeach
    </div>
</div>
</div>






</body>

<!-- Mirrored from laravelecommerceexample.ca/shop/appliance-2 by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Jan 2020 08:29:46 GMT -->
</html>

@endsection
