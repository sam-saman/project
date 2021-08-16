@include('header')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
</head>
<body>
  <br><br><br>
  <div class="custom-product">
    <div class="container">
    <div class="col-sm-10">
       <table class="table">
        
           <tbody>
             <tr>
               <td>Amount</td>
             <td>$ {{$total}}</td>
             </tr>
             <tr>
               <td>Tax</td>
               <td>$10</td>
             </tr>
             <tr>
               <td>Delivery </td>
               <td>Free</td>
             </tr>
             <tr>
               <td>Total Amount</td>
             <td>$ {{$total+10}}</td>
             </tr>
           </tbody>
         </table>
         <div>
           <form action="/orderplace" method="POST" >
             @csrf
               <div class="form-group">
                 <textarea name="address" placeholder="enter your address" class="form-control" ></textarea>
               </div>
               <div class="form-group">
                 <label for="pwd">Payment Method</label> <br> <br>
                 <input type="radio" value="cash" name="payment"> <span>online payment</span> <br> <br>
                 <input type="radio" value="cash" name="payment"> <span>EMI payment</span> <br><br>
                 <input type="radio" value="cash" name="payment"> <span>Payment on Delivery</span> <br> <br>

               </div>
              <button type="submit" name="submit" class="btn btn-default">Order Now</button>  
              
                {{-- <a class="btn btn-default check_out" href="{{ route('checkout') }}">Order Now</a>   --}}
          
             </form>
         </div>
    </div>
</div>
<div>
</div>
  <br><br><br>
  @include('footer')
</div>  
</body>
</html>