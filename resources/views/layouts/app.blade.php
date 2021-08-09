
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link href="{{ asset('admin_css/local/assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('admin_css/local/assets/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="{{ asset('admin_css/local/assets/css/myStyle/main.css') }}">
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Luxury Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	
	<!--start-menu-->
	
	<link href="{{ asset('admin_css/local/assets/css/memenu.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('admin_css/local/assets/css/flexslider.css') }}" type="text/css" media="screen">

	<link href="{{ asset('admin_css/local/assets/css/product_quantity.css') }}" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

</head>
<body>
	<div class="top-header">
		<div class="container">
			<div class="top-header-main d-flex align-items-center mt-1 mb-1">
				<div class="col-md-6">
					@auth
					<div class="box d-flex align-items-center">
                        <a href="{{ route('login') }}">{{ Auth::user()->name }}</a>
                    </div>
					<div class="box d-flex align-items-center">
                        <a href="" onclick="event.preventDefault();document.getElementById('logout_form').submit();">Logout</a>
						<form id="logout_form" action="{{ route('logout') }}" method="POST">
							@csrf
						</form>
                    </div>
					@endauth

					@guest
					<div class="box ">
                        <a href="{{ route('login') }}">Login</a>
                    </div>
                    <div class="box1">
                        <a href="{{ route('register') }}">Register</a>
                    </div>
					@endguest
                    
				</div>
				<div class="col-md-6">
					<div class="cart box_1">
						<a href="{{ route('basket.show') }}">
							<div class="total d-flex align-items-center">
								<span class="mr-1" id="sumPrice" style="font-size: 13px;"></span>
								<span style="font-size: 20px;color: orangered"><i class="fas fa-cart-plus"></i></span>	
							</div>
							{{-- <img src="{{ asset('admin_css/local/assets/images/cart-3.png') }}" alt="" /> --}}
							
							
						</a>					
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--top-header-->
	<!--start-logo-->
	<div class="logo">
		<a href="index.html">
			<h1>Book Home</h1>
		</a>
	</div>
    
	<!--start-logo-->
	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container">
			<div class="header d-flex align-items-center">
				<div class="col-md-9 header-left">
					<div class="top-nav">
						<ul class="memenu skyblue">
                            @foreach(App\Models\Category::all() as $key => $value)
                                <li class="active"><a href="index.html">{{ $value['name'] }}</a></li>
                            @endforeach							
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-3 header-right">
					<div class="search-bar">
						<input type="text" value="Search" onfocus="this.value = '';"
							onblur="if (this.value == '') {this.value = 'Search';}">
						<input type="submit" value="">
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div> 

    @yield('content')


    <div class="information">
		<div class="container">
			<div class="infor-top d-flex justify-content-center">
				<div class="col-md-3 infor-left">
					<h3>Follow Us</h3>
					<ul>
						<li><a href="#"><span class="fb"></span>
								<h6>Facebook</h6>
							</a></li>
						<li><a href="#"><span class="twit"></span>
								<h6>Twitter</h6>
							</a></li>
						<li><a href="#"><span class="google"></span>
								<h6>Google+</h6>
							</a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Information</h3>
					<ul>
						<li><a href="#">
								<p>Specials</p>
							</a></li>
						<li><a href="#">
								<p>New Products</p>
							</a></li>
						<li><a href="#">
								<p>Our Stores</p>
							</a></li>
						<li><a href="contact.html">
								<p>Contact Us</p>
							</a></li>
						<li><a href="#">
								<p>Top Sellers</p>
							</a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>My Account</h3>
					<ul>
						<li><a href="account.html">
								<p>My Account</p>
							</a></li>
						<li><a href="#">
								<p>My Credit slips</p>
							</a></li>
						<li><a href="#">
								<p>My Merchandise returns</p>
							</a></li>
						<li><a href="#">
								<p>My Personal info</p>
							</a></li>
						<li><a href="#">
								<p>My Addresses</p>
							</a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Store Information</h3>
					<h4>The company name,
						<span>Lorem ipsum dolor,</span>
						Glasglow Dr 40 Fe 72.
					</h4>
					<h5>+955 123 4567</h5>
					<p><a href="mailto:example@email.com">contact@example.com</a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--information-end-->
	<!--footer-starts-->
	<div class="footer">
		<div class="container">
			<div class="footer-top">
				<div class="col-md-6 footer-left">
					<form>
						<input type="text" value="Enter Your Email" onfocus="this.value = '';"
							onblur="if (this.value == '') {this.value = 'Enter Your Email';}">
						<input type="submit" value="Subscribe">
					</form>
				</div>
				<div class="col-md-6 footer-right">
					<p>© 2015 Luxury Watches. All Rights Reserved | Design by <a href="http://w3layouts.com/"
							target="_blank">W3layouts</a> </p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<script src="{{ asset('admin_css/local/assets/js/jquery-1.11.0.min.js') }}"></script>
	<!--product_qunatity_change-->
	<script src="{{ asset('admin_css/local/assets/js/myScript/product_quantity_change.js') }}"></script>
	<script src="{{ asset('admin_css/local/assets/js/myScript/getSingleBook.js') }}"></script>

    
    {{-- <script src="{{ asset('admin_css/local/assets/js/simpleCart.min.js') }}"> </script> --}}
    <script type="text/javascript" src="{{ asset('admin_css/local/assets/js/memenu.js') }}">
    </script>
    <script src="{{ asset('admin_css/local/assets/js/jquery.easydropdown.js') }}"></script>
    <script src="{{ asset('admin_css/local/assets/js/responsiveslides.min.js') }}"></script>
    <script>
    // You can also use "$(window).load(function() {"
        $(function() {
        // Slideshow 4
            $("#slider4").responsiveSlides({
                auto: true,
                pager: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                	$('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                	$('.events').append("<li>after event fired.</li>");
                }
            });
        });
    </script>
    <script src="{{ asset('admin_css/local/assets/js/imagezoom.js') }}"></script>
    <script defer="" src="{{ asset('admin_css/local/assets/js/jquery.flexslider.js') }}"></script>
                        

    <script>
        // Can also be used with $(document).ready()
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
			// $('.getSingleProduct').css('display','none');
        });
    </script>

    <script
		type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
    </script>
    <script>$(document).ready(function () { $(".memenu").memenu(); });</script>
	<script>
		$(document).ready(function () {
			var count=$('.cart-header').length;
			var product_id=null;
			var user_id=null;
			var session=null;
			var book_number=null;
			var remove=null;
			$('#count').text('('+count+')');
			// Delete single product 
				$('.close1').click(function () {
					remove=$(this).parent();
					product_id=$(this).children().val();
					session=$('#session').val();
					$.ajax({
						type:'get',
						headers:{
							"X-CSRF-TOKEN":'{{ csrf_token() }}'
						},
						data:{
							id:product_id,
							session:session
						},
						url:'{{ route('basket.delete') }}',
						success:function(param){
							if(param){
								remove.fadeOut('slow', function(){
									$(this).remove();
									count-=1;
									$('#count').text('('+count+')');
									$('.getSingleProduct').attr('style','display:none');
								});
								$('#sumPrice').text(param+' $');
								//console.log('success');
							}else{
								//console.log('no success');
							}					
						}
					});			
			});

			// Delete all product
			$('#deleteAll').click(function(){
				user_id=this.value;
				session=$('#session').val();
				$.ajax({
					type:'get',
					headers:{
						"X-CSRF-TOKEN":'{{ csrf_token() }}'
					},
					data:{
						user_id:user_id,
						session:session
					},
					url:'{{ route('basket.delete') }}',
					success:function(param){
						if(param){
							$('.cart-header').fadeOut('slow', function () {
								$(this).remove();
								count=0;
								$('#count').text('('+count+')');
							});
							$('#sumPrice').text(param+' $');
							//console.log(param);
						}else{
							//console.log('no success');
						}					
					}
				});			
				
			});

			// Add to basket 
			$('#addBook,#myBtnComplete').click(function(){
				book_number=$('#bookNumber').val();
				var quan=$('#quantity').val();
				var price=$('#price').val();
				var d=$(this).attr('data-');
				$.ajax({
					type:'post',
					headers:{
						"X-CSRF-TOKEN":'{{ csrf_token() }}'
					},
					data:{
						id:book_number,
						quantity:quan,
						d:d
					},
					url:'{{ route('basket.add') }}',
					success:function(param){
						if(param){
							if(typeof(param) == "string" && param!=0){
								$('.message').removeAttr("style");
							}
							//console.log(typeof param)
							if(param['price']==null){
								$('#sumPrice').text(param+' $');
							}else{
								$('#sumPrice').text(param['price']+' $');
							}
							console.log(param);
							$('.name').text(param['name']);
							$('.singleImage').attr('src',param['image']);
							$('.quantityUpdate').val(param['quantity']);
							$('#priceCart').text(param['price']);
							$('.minusUpdate, .plusUpdate').attr('data-product-id',param['id']);
							$('.product_single').val(param['id']);
						}else{
							alert('mehsuldan cemi '+ param +' eded var');
							$('#quantity').val(param);
							$('#price').val(param*price);
							//console.log(param);
						}				
					},
					error:function(param){
						console.log(param);
					}
				});	
			});

			// Update basket
			
			var q=null;
			var number=null;
			$('.minusUpdate').click(function(){
				number=$(this).attr("data-product-id");
				q=$(this).next().val();
				$.ajax({
					type:'get',
					headers:{
						"X-CSRF-TOKEN":'{{ csrf_token() }}'
					},
					data:{
						id:number,
						quantity:q
					},
					url:'{{ route('basket.update') }}',
					success:function(param){
						$('#sumPrice').text(param['sumprice']+' $');
						var elements = document.querySelectorAll('[data-id]');
						for (let index = 0; index < elements.length; index++) {
							if(elements[index].getAttribute('data-id')==number){
								elements[index].innerHTML=param['price'];
							}						
						}
						$('#priceCart').text(param['price']);	
					},
					error:function(param){
						console.log(param);
					}
				});	
			});
			$('.plusUpdate').click(function(){
				number=$(this).attr("data-product-id");
				q=$(this).prev().val();
				$.ajax({
					type:'get',
					headers:{
						"X-CSRF-TOKEN":'{{ csrf_token() }}'
					},
					data:{
						id:number,
						quantity:q
					},
					url:'{{ route('basket.update') }}',
					success:function(param){
						$('#sumPrice').text(param['sumprice']+' $');
						var elements = document.querySelectorAll('[data-id]');
						if(param['quantity']!=0){
							for (let index = 0; index < elements.length; index++) {
								if(elements[index].getAttribute('data-id')==number){
								elements[index].innerHTML=param['price'];
								}						
							}
							$('#priceCart').text(param['price']);
						}else{
							alert('mehsul bitdi');
							// var notification = alertify.notify('sample', 'success', 5, function(){  console.log('dismissed'); });
							$(this).prev().val(param['basketQuan']);
							console.log(param['basketQuan']);
						}
										
					},
					error:function(param){
						console.log(param);
					}
				});	
			});

			$('.quantityUpdate').keyup(function() {
				number=$(this).prev().attr("data-product-id");
				q=$(this).val();
				$.ajax({
					type:'get',
					headers:{
						"X-CSRF-TOKEN":'{{ csrf_token() }}'
					},
					data:{
						id:number,
						quantity:q
					},
					url:'{{ route('basket.update') }}',
					success:function(param){
						$('#sumPrice').text(param['sumprice']+' $');
						var elements = document.querySelectorAll('[data-id]');
						for (let index = 0; index < elements.length; index++) {
							if(elements[index].getAttribute('data-id')==number){
								elements[index].innerHTML=param['price'];
							}						
						}
						$('#priceCart').text(param['price']);			
					},
					error:function(param){
						console.log(param);
					}
				});	
   			});
		});
	</script>

	<script>
		$(window).load(function () {	
			$.ajax({
				type:'get',
				headers:{
					"X-CSRF-TOKEN":'{{ csrf_token() }}'
				},
				url:'{{ route('basket.select') }}',
				success:function(param){
					if(param){
						$('#sumPrice').text(param+' $');
					}					
				}
			});			
		});
	</script>
</body>
</html>
