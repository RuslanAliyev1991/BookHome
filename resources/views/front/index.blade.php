@extends('layouts.app')

@section('content')
    <div class="bnr" id="home">
		<div id="top" class="callbacks_container" style="background-color: lightgoldenrodyellow;">
			<ul class="rslides" id="slider4" style="width: 30%; height: 500px; margin: 0px auto;">
                @foreach (\App\Models\Slider::all() as $item)
                <li>
					<img src="{{ asset($item['image']) }}" alt=""/>
				</li>
                @endforeach

			</ul>
		</div>
		<div class="clearfix"> </div>
	</div>

	<div class="about">
		<div class="container">
			<div class="about-top grid-1 d-flex justify-content-center">
				<div class="col-md-4 about-left">
					<figure class="effect-bubba">
						<img class="img-responsive" src="{{ asset('admin_css/local/assets/images/abt-1.jpg') }}" alt=""/>
						<figcaption>
							<h2>Nulla maximus nunc</h2>
							<p>In sit amet sapien eros Integer dolore magna aliqua</p>
						</figcaption>
					</figure>
				</div>
				<div class="col-md-4 about-left">
					<figure class="effect-bubba">
						<img class="img-responsive" src="{{ asset('admin_css/local/assets/images/abt-2.jpg') }}" alt=""/>
						<figcaption>
							<h4>Mauris erat augue</h4>
							<p>In sit amet sapien eros Integer dolore magna aliqua</p>
						</figcaption>
					</figure>
				</div>
				<div class="col-md-4 about-left">
					<figure class="effect-bubba">
						<img class="img-responsive" src="{{ asset('admin_css/local/assets/images/abt-3.jpg') }}" alt=""/>
						<figcaption>
							<h4>Cras elit mauris</h4>
							<p>In sit amet sapien eros Integer dolore magna aliqua</p>
						</figcaption>
					</figure>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<div class="product">
		<div class="container">
			<div class="product-top">
                @foreach (\App\Models\Book::all()->chunk(4) as $chunk)
                    <div class="product-one">
                        @foreach ($chunk as $value)
                        <div class="col-md-3 float-left">
                            <div class="product-main simpleCart_shelfItem product-left">
								
								<div class="quantity d-flex justify-content-center align-items-center">
									<span>{{ $value['quantity']. " ədəd" }}</span>
								</div>
								@if ($value['quantity']==0)
									<div class="deaktiv img-responsive zoom-img"></div>
								@endif
                                <a href="{{ route('book.about',['selflink'=>$value['selflink']]) }}" class="mask">
									<img style="height: 240px; width: 80%;" class="img-responsive zoom-img" src="{{ asset($value['image']) }}" />
								</a>
                                <div class="product-bottom">
                                    <h3>{{ $value->category->name }}</h3>
                                    <p>{{ $value->author->name ?? 'silinmis yazici' }}</p>
                                    <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price">{{ $value['amount'].' AZN' }}</span></h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                @endforeach

			</div>
		</div>
	</div>
@endsection
