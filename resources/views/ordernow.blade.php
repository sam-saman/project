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
                 <textarea name="address" placeholder="enter your address" class="form-control"  required></textarea>
               </div>
               <div class="form-group">
                 <label for="pwd">Payment Method</label> <br> <br>
                 <input type="radio" id="dbt" value="cash" name="payment"> <span>online payment</span> <br> <br>
                 <input type="radio" id="cheque" value="cash" name="payment"> <span>EMI payment</span> <br><br>
                 <input type="radio" id="paypal" value="cash" name="payment"> <span>Payment on Delivery</span> <br> <br>

               </div>
              {{-- <button type="submit" name="submit" class="btn btn-default"  onclick="return selectmode();">Order Now</button>   --}}
              <button type="submit" class="btn btn-primary" style="margin-left: 60%" onclick="return selectmode();">Confrom Order</button>
             </form>
         </div>
    </div>
</div>
<div>
</div>
  <br><br><br>
  @include('footer')
</div>
<script>
  function selectmode()
  {
      if($('#dbt').is(':checked') || $('#cheque').is(':checked') || $('#paypal').is(':checked'))
      {
  
      }
      else
      {
          alert('Please select any Payment Method');
          return false;
      }
  }
    </script>  
</body>

</html>