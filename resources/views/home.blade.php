@include('header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
   
</head><!--/head-->
<style>
	.border
	{
		border-color:#fe980f;
	}
</style>
<body>
		@if(Session::has('jsAlert'))
<script >
swal("congratulations!", " Your Order Has Been Placed!", "success");
</script>
{{ Session::forget('jsAlert') }}
@endif

@if(Session::has('Failslogin'))
<script >
swal("Error!", " You Are not logedin.!! login OR Create New Account", "error");
</script>
{{ Session::forget('Failslogin') }}
@endif
	
	

	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
						<div class="carousel-inner">
								<div class="col-sm-12">
									<img src="images/mob5.jpg" width="100%"  class="girl img-responsive" alt="" />		
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section><!--/slider-->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
				{{-- <div class="col-sm-12"> --}}
					<div class="features_items ">
					<!--features_items-->
					<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<h2 class="title text-center">Products</h2>
							@if(Session::get('name') or Session::get('admin'))
							@foreach ($product as $item)
								<div class="col-sm-3" >
									<div class="product-image-wrapper border">
										<div class="single-products">
											<div class="productinfo text-center">
												<div class="hd">
													<h2>{{$item->brand}}</h2>
												</div>


												@if( file_exists('storage/images/' . $item->image))
												<img  src="{{  asset('/storage/images/'.$item->image) }} " width="30px" height="300px">
												@else
												<img src="{{ $item->image}}" width="30px" height="300px" > 	  
												@endif 
												{{-- <img src="{{  asset('/storage/images/'.$item->image) }}" width="30px" height="300px"  /> --}}
												{{-- <img src="{{$item->image}}" width="30px" height="300px"  />  --}}
											<h2> {{$item->p_name}} </h2>
												<h3>price: {{$item->price}}</h3>
												<p></p>
												<form method="GET" action="{{route('product')}}">
													<input type="hidden" value="{{$item->id}}" name="id">
													@if(Session::get('name'))
													<button type="submit"   class="btn btn-default add-to-cart" >   <i class="fa fa-shopping-cart"></i> ADD TO CART </button>												  
													  @else
													  <button type="submit"   class="btn btn-default add-to-cart" disabled>   <i class="fa fa-shopping-cart"></i> ADD TO CART </button>	
																								  
													  @endif
												</form>
											</div>	
										</div>
									</div>
								</div>
								@endforeach	
								@else
								<div class="col-sm-3" >
									<div class="product-image-wrapper border">
										<div class="single-products">
											<div class="productinfo text-center">
												<div class="productinfo text-center">
													<img src="{{ asset('uploades/1628358558.png') }}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
											</div>											
										</div>
									</div>
								</div>

							@endif										
					</div><!--/category-tab-->
				</div>
			</div>
		{{-- </div> --}}
	</section>
	
 
   {{--    <............FOOTER...............>              --}}


	@include('footer')
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>