@extends('layouts.app')
@section('content')
<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Ana sehife</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--start-ckeckout-->
<div class="ckeckout">
    <div class="container">
        <div class="ckeck-top heading">
            <h2>My Shopping Bag</h2>
        </div>
        <div class="ckeckout-top">
            <div class="cart-items">
                <div class="d-flex justify-content-between">
                    <h3 class="">Product count <i id="count"></i></h3>
                    <button class="btn bg-danger text-white" id="deleteAll" value="{{ Auth::user()->id ?? $baskets[0]['session_id'] }}">Delete All</button>
                </div>
                <div class="in-check">
                    <div class="unit">
                        <div><span>Image</span></div>
                        <div><span>Name</span></div>
                        <div><span>Quantity</span></div>
                        <div><span>Price</span></div>
                        <div class="clearfix"> </div>
                    </div>

                    {{-- auth --}}
                    @auth
                    @foreach ($baskets as $item)
                    <div class="cart-header d-flex align-items-center" style="background-color: rgb(241, 233, 225);">
                        <div class="ring-in k">
                            <a href="single.html"><img src="{{ asset($item->book->image) }}" class="img-responsive" style="width: 70px; height: 100px;"></a>
                        </div>
                        <div class="close1">
                            <input class="product_single" type="hidden" value="{{ $item['id'] }}">
                        </div>
                         <div class="k"><span class="name">{{ $item->book->name }}</span></div>
                          <div class="d-flex align-items-center k">
                            <form class="d-flex align-items-center" method="get">
                                @csrf
                                <input data-product-id="{{ $item['id'] }}" type="button" value="-" class="minus minusUpdate">
                                <input type="text" data-product-id="{{ $item['id'] }}" name="quantity" value="{{ $item['quantity'] }}" class="input-text qty text quantityUpdate" size="2">
                                <input type="button" data-product-id="{{ $item['id'] }}" value="+" class="plus plusUpdate">
                            </form>  
                         </div>
                         <div class="k element">
                            <input class="idHidden" type="hidden" value="{{ $item['id'] }}">
                            <span class="price" data-id="{{ $item['id'] }}">{{ $item['price'] }}</span>
                         </div>
                        <div class="clearfix"></div>
                        </div>
                    @endforeach
                    @isset($item)
                    <div class="getProduct mt-5">
                        <div class="d-flex align-items-center justify-content-around">
                            <div class="d-flex align-items-center">
                                <label class="col-form-label">FullName:</label>
                                <input type="text" value="" class="form-control ml-1">
                            </div>
                            <div class="d-flex align-items-center">
                                <label class="col-form-label">Phone:</label>
                                <input type="text" value="" class="form-control ml-1">
                            </div>
                            <div class="d-flex align-items-center">
                                <label class="col-form-label">Email:</label>
                                <input type="email" value="" class="form-control ml-1">
                            </div>
                            <div class="d-flex align-items-center"> 
                                <button class="getBook" type="button" class="form-control">Get Book</button>
                            </div>
                        </div>
                    </div> 
                    @endisset                    
                    @endauth

                    {{-- Guest --}}
                    @guest
                    <input type="hidden" name="session" value="session" id="session">
                    @foreach ($baskets as $item)
                    <ul class="cart-header">
                        <li class="ring-in">
                            <a href="single.html"><img src="{{ asset($item->book->image) }}" class="img-responsive" style="width: 70px; height: 100px;"></a>
                        </li>
                        <div class="close1">
                            <input class="product_single" type="hidden" value="{{ $item['id'] }}">
                        </div>
                        <li><span class="name">{{ $item->book->name }}</span></li>
                        
                        <li><span class="cost">{{ $item['quantity'] }}</span></li>
                         <li><span class="cost">{{ $item['price'] }}</span></li>
                        <div class="clearfix"> </div>
                    </ul> 
                    @endforeach   
                    @endguest
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection