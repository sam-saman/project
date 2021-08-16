@include('header')




<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Product DetailHome | E-Shopper</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="syle.css">
  </head>





<style>
#sam img{
width: 50px;
              }
#sam{

  margin-top: 10px;
}
</style>

  <body>


	<div class="container">
		<div class="card">
		
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-5">
						
						<div class="preview-pic tab-content">
							{{-- <div class="tab-pane active" id="picc"><img src="{{ asset('uploades/'.$product->image)}}" height="400px" width="80px" /></div> --}}
							<div class="tab-pane active" id="picc"><img src="{{$product->image}}" height="400px" width="80px" /></div>
						</div>
{{-- 	
<div class="row" id="sam">
<div class="column" >

</div>
</div> --}}
                    </div>

					<div class="details col-md-7">
						<h3 class="product-title">{{ $product->p_name}} </h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
					    	</div>
						  <h3 class="name"><span></span></h3>
						  <h4 class="price">Brand: <span>{{ $product->brand}}</span></h4>
						  <h4 class="price">current price: <span>{{ $product->price }}</span></h4>
						<div class="action">
							<form method="POST" action="{{ route('Addtocart') }}">
								@csrf
								<input type="hidden" name="id" value="{{ $product->id }}">
								<input type="hidden" name="name" value="{{ $product->p_name }}">
								<input type="hidden" name="price" value="{{ $product->price }}">
								<input type="hidden" name="quantity" value="1"required>
							</br>
							</br>
								<input type="hidden" name="user_name" value="{{ Session::get('name') }}">
								<button type="submit" name="add_to_cart" class="btn btn-default add-to-cart" >   <i class="fa fa-shopping-cart"></i> BUY NOW </button>
							</form>
{{-- 							<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button> --}}
						</div>
               
					</div>
				</div>
			</div>
		</div>
	</div>
<br><br>
@include('footer')
  </body>
  <!-- <script>
     function showmulti(im){

		jQuery('#picc').html("<img src='"+im+"'/>");
	 }

  </script> -->

  </html>
