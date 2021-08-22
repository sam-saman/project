@include('header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .color{
color:#FE980F;

    }
</style>
<body>
    <br>
    <div class="container">
    <div class="row">
    <div class="custom-product">
        <div class="col-sm-10">
           <div class="trending-wrapper">
             <center>  <h1>My Orders </h1> </center>
               @foreach($orders as $item)
               <br>
               <div class="container">
               <div class=" row searched-item cart-list-devider">
                <div class="col-sm-4">
                   <a href="detail/{{$item->id}}">
                       <img class="trending-image" src="{{  asset('/storage/images/'.$item->image) }}" height="200px" width="150px">
                     </a>
                </div>
                <div class="col-sm-8">
                       <div class="">
                         <h2 class="color">Name : {{$item->p_name}}</h2>
                         <h5>Delivery Status : {{$item->status}}</h5>
                         <h5>Address : {{$item->address}}</h5>
                         <h5>Payment Status : {{$item->payment_status}}</h5>
                         <h5>Payment Method : {{$item->payment_method}}</h5>
   
                       </div>
                </div>
               
               </div>
            </div>
               @endforeach
             </div>
   
        </div>
   </div>
</div>
</div>
<br>
@include('footer')
</body>
</html>