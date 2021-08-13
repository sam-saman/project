@include('header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ca | E-Shopper</title>
  
</head><!--/head-->
<style>
	.border
	{
		border-color:#fe980f;
	}
</style>
<body>
	
    <?php  $totalamount=0;?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('home')}}">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					@foreach($datacart as $data)
					<tbody>
						<tr>
							<td class="cart_product">
								 <img src="{{ asset('uploades/'.$data->image) }}" width="100px" height="100px" alt="">
							</td>
							<td class="cart_description">
								<h4>{{ $data->pro_name }}</h4>
							</td>
                            <td>{{ "$".$data->pro_price}}</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a href="{{ url('/cartquan/'.$data->id.'/1') }}" class="cart_quantity_up" > + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{ $data->pro_quantity }}" autocomplete="off" size="2">
									@if($data->pro_quantity>1)
									<a  href="{{ url('/cartquan/'.$data->id.'/-1') }}" class="cart_quantity_down" > - </a>
									@endif
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{ "$".$data->pro_price*$data->pro_quantity}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{ url('/cartdel/'.$data->id) }}">><i class="fa fa-times"></i></a>
							</td>

                        </tr>

					</tbody>
					<?php  $totalamount= $totalamount+($data->pro_price*$data->pro_quantity);?>
					@endforeach
				</table>

			</div>
		</div>
		
	</section> <!--/#cart_items-->
	<section id="do_action">
		<div class="container">
			<div class="heading">

			</div>
			<div class="row">
				<div class="col-sm-6">

				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{ "$".$subtotal }}</span></li>
							<li>Shipping Cost <span>Free</span></li>

                            <li>Total <span><?php echo "$".$totalamount;?></span></li>
						</ul>
                        <a class="btn btn-default check_out" href="{{ route('checkout') }}">Check Out</a>
					</div>
				</div>

			</div>
		</div>
	</section>
<!--/#do_action-->



@include('footer')


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>