@extends('layout.master')

@section('content')

</header>


<div class="breadcrumbs">
<div class="breadcrumbs-container container">
    <div>
        <a href="/">Home</a>
    <i class="fa fa-chevron-right breadcrumb-separator"></i>
    <span>Shopping Cart</span>
    </div>

</div>
</div> <!-- end breadcrumbs -->

<div class="cart-section container">
    <div>
            @if (session()->has('success_message'))
                <div class="alert alert-success">
                    {{ session()->get('success_message') }}
                </div>
            @endif
            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif

            @if (Cart::count()>0)
                    <h2>{{Cart::count() }} item(s) in shopping Cart</h2>
                    <div class="cart-table">
                        @foreach (Cart::content() as $item)
                        <div class="cart-table-row">
                                <div class="cart-table-row-left">
                                    <a href="{{ route('shop.show',$item->model->slug) }}"><img src="{{asset('img/'.$item->model->slug.'.jpg')}}" alt="item" class="cart-table-img"></a>
                                    <div class="cart-item-details">
                                        <div class="cart-table-item"><a href="{{ route('shop.show',$item->model->slug) }}">{{ $item->model->name }}</a></div>
                                        <div class="cart-table-description">{{ $item->model->detail }}</div>
                                    </div>
                                </div>
                                <div class="cart-table-row-right">
                                    <div class="cart-table-actions">
                                        {{-- <a href="#">Remove</a> <br> --}}
                                    <form action="{{route('cart.delete', $item->rowId)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        <button type="submit" class="cart-options">Remove</button>

                                    </form>
                                    <form action="{{route('cart.switchToSaveForLater', $item->rowId)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{-- {{ method_field('DELETE') }} --}}
                                        <button type="submit" class="cart-options">Save For Later</button>

                                    </form>
                                        {{-- <a href="#">Save for Later</a> --}}
                                    </div>
                                    <div>
                                        <select class="quantity" data-id="{{ $item->rowId }}">
                                                @for($i = 1; $i < 11; $i++)
                                                    <option {{ $item->qty ==$i ? 'selected' : " " }}>{{ $i }}</option>
                                                @endfor
                                        </select>
                                    </div>
                                    <div>
                                        $.{{ $item->subtotal }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <div class="cart-totals">
                        <div class="cart-totals-left">
                            Shipping is free we are awesome like that. Also this is additional stuff I dont like feel like figuring out :)
                        </div>
                        <div class="cart-totals-right">
                            <div>
                                Subtotal <br>
                                Tax <br>
                                <span class="cart-totals-total">Total</span>
                            </div>
                            <div class="cart-totals-subtotal">
                                $.{{ Cart::subtotal() }} <br>
                                $.{{ Cart::tax() }} <br>
                                <span class="cart-totals-total">$.{{ Cart::total() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="cart-buttons">
                        <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
                        <a href="{{ route('checkout.index') }}" class="button-primary">Proced to checkout</a>
                    </div>

                    @else

                    <h3>No items in Cart!</h3>
                    <div class="spacer"></div>
                    <a href="{{ route('shop.index') }}" class="button">Continue Shopping</a>
                    <div class="spacer"></div>


                    @endif

                    @if(Cart::instance('saveForLater')->count()>0)

                    <h2>{{ Cart::instance('saveForLater')->count() }} Item(s) Save For Later </h2>

                    <div class="saved-for-later cart-table">
                        @foreach (Cart::instance('saveForLater')->content() as $item)


                        <div class="cart-table-row">
                            <div class="cart-table-row-left">
                                <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{asset('img/'.$item->model->slug.'.jpg')}}" alt="item" class="cart-table-img"></a>
                                <div class="cart-item-details">
                                <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}"> {{ $item->model->name   }}</a></div>
                                        <div class="cart-table-description">{{ $item->model->detail  }}</div>
                                    </div>
                            </div>
                            <div class="cart-table-row-right">
                                    <div class="cart-table-actions">
                                        {{-- <a href="#">Remove</a> <br> --}}
                                    <form action="{{route('cart.destroysaved', $item->rowId)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        <button type="submit" class="cart-options">Remove</button>

                                    </form>
                                    <form action="{{route('cart.switchToCart', $item->rowId)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{-- {{ method_field('DELETE') }} --}}
                                        <button type="submit" class="cart-options">Move to Cart</button>

                                    </form>
                                                                           {{-- <a href="#">Save for Later</a> --}}
                                    </div>
                                    <div>
                                        <select name="" class="quantity" >
                                            <option value="" selected>1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                        </select>
                                    </div>
                                    <div>
                                        $.{{ $item->model->price/100 }}
                                    </div>
                                </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <h3>No items in Save For Later</h3>
                    @endif



    </div>

</div> <!-- end cart-section -->

<div class="might-like-section">
<div class="container">
    <h2>You might also like...</h2>
    <div class="might-like-grid">
        @foreach ($mightLike as $like)
             <a href="{{route('shop.show', $like->slug)}}" class="might-like-product">
                <img src="{{asset('img/'.$like->slug.'.jpg')}}" alt="product">
                <div class="might-like-product-name">{{ $like->name }}</div>
             <div class="might-like-product-price">$.{{$like->price/100}}</div>
            </a>
        @endforeach
    </div>
</div>
</div>




@endsection

@section('extra_js')
    <script src="{{asset('js/app.js')}}"></script>
    <script>
                (function(){
                    const classname = document.querySelectorAll('.quantity');
                    // alert("hello");
                    Array.from(classname).forEach(function(element){
                        element.addEventListener('change', function(){
                            const id = element.getAttribute('data-id')
                            axios.patch(`/cart/${id}`,{
                                quantity: this.value
                            })
                            .then(function(response){
                                // console.log(response);
                                window.location.href = "{{ route('cart.index') }}"
                            })
                            .catch(function(error){
                                console.log(error);
                            });
                        })
                    })
                })();
    </script>
@endsection
