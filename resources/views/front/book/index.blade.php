@extends('layouts.app')

@section('content')

<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Ana sehife</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $data[0]['name'] }}</li>
            </ol>
        </div>
    </div>
</div>

<div class="single contact" style="position: relative;">
    <div class="container">
        <div class="single-main">
            <div class="col-md-12 single-main-left">
                <div class="sngl-top d-flex justify-content-center">
                    <div class="col-md-5 single-top-left">
                        <div class="flexslider" style="width: 310px; margin:auto auto;">

                            <div class="flex-viewport" style="overflow: hidden; position: relative;">
                                <ul class="slides"
                                    style="width: 1000%; transition-duration: 0.6s; transform: translate3d(-608px, 0px, 0px);">
                                    <li data-thumb="{{ asset($data[0]['image']) }}" class="clone" aria-hidden="true"
                                        style="float: left; display: block; width: 100%;">
                                        <div class="thumb-image"> <img src="{{ asset($data[0]['image']) }}" data-imagezoom="true"
                                                class="img-responsive" alt="" draggable="false"> </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 single-top-right">
                        <div class="single-para simpleCart_shelfItem">
                            <h2>{{ $data[0]['name'] }}</h2>
                            <div class="star-on">
                                <div class="review">
                                    <a href="#"> 1 customer review </a>
                                </div>
                                <div class="clearfix"> </div>
                            </div>

                            <h5 class="item_price">{{ $data[0]['amount']. ' AZN' }}</h5>
                            <p>
                                {{ $data[0]['description'] }}
                            </p>

                            <ul class="tag-men">
                                <li><span>Category:</span>
                                    <span class="text-muted">{{ $data[0]->category->name ?? 'Silinmisdir' }}</span>
                                </li>
                                <li><span>Author:</span>
                                    <span class="text-muted">{{ $data[0]->author->name ?? 'Silinmisdir' }}</span>
                                </li>
                                <li><span>Publishing:</span>
                                    <span class="text-muted">{{ $data[0]->publishing->name ?? 'Silinmisdir' }}</span>
                                </li>
                                <li><span>Quantity:</span>
                                    <span class="text-muted" id="quantity_book">{{ $data[0]['quantity'] ?? 'Silinmisdir' }}</span>
                                </li>
                            </ul>

                            <div class="d-flex justify-content-start align-items-center mt-3 p-0">
                                <h6 class="produc_quantity_header">Product quantity:</h6>
                                <input type="button" value="-" class="minus" id="minus">
                                <input type="text" name="quantity" value="1" class="input-text qty text" size="2" id="quantity">
                                <input type="button" value="+" class="plus" id="plus">
                                <h6 class="produc_quantity_header ml-4">Product price:</h6>
                                <input type="text" disabled name="price" value="{{ $data[0]['amount'] }}" class="input-text qty text" size="2" id="price">
                                <span class="ml-1" style="font-size: 20px;">AZN</span>
                            </div>
                            <a class="add-cart item_add" id="addBook" style="cursor: pointer;">Add To Basket</a>
                            <input type="hidden" value="{{ $data[0]['id'] }}" id="bookNumber">


                            <a data-="comp" class="add-cart" id="myBtnComplete" style="cursor: pointer;">Completed Shopping</a>

                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="latestproducts">
                    <div class="product-one d-flex justify-content-center">
                        <div class="col-md-4 product-left p-left">
                            <div class="product-main simpleCart_shelfItem">
                                <a href="single.html" class="mask"><img class="img-responsive zoom-img"
                                        src="" alt=""></a>
                                <div class="product-bottom">
                                    <h3>Smart Watches</h3>
                                    <p>Explore Now</p>
                                    <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ 329</span>
                                    </h4>
                                </div>
                                <div class="srch">
                                    <span>-50%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 product-left p-left">
                            <div class="product-main simpleCart_shelfItem">
                                <a href="single.html" class="mask"><img class="img-responsive zoom-img"
                                        src="" alt=""></a>
                                <div class="product-bottom">
                                    <h3>Smart Watches</h3>
                                    <p>Explore Now</p>
                                    <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ 329</span>
                                    </h4>
                                </div>
                                <div class="srch">
                                    <span>-50%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 product-left p-left">
                            <div class="product-main simpleCart_shelfItem">
                                <a href="single.html" class="mask"><img class="img-responsive zoom-img"
                                        src="" alt=""></a>
                                <div class="product-bottom">
                                    <h3>Smart Watches</h3>
                                    <p>Explore Now</p>
                                    <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">$ 329</span>
                                    </h4>
                                </div>
                                <div class="srch">
                                    <span>-50%</span>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="message" style="display: none;">
        <h3 class="text-center">Kitab səbətə əlavə edildi!!!</h3>
        <br>
        <button id="message_close" type="button" class="pl-4 pr-4 pt-1 pb-1">OK</button>
    </div>
</div>

@endsection


   @include('layouts.singleProduct')

