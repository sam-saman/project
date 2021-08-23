
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="/editstyle.css">
</head>



<body>

{{-- //....................................................... --}}
<div id="container">

<h2>Update</h2>

<form action="{{ url('update/'.$product->id) }}" method="POST" enctype="multipart/form-data" >
    @csrf
    @method('PUT')
  
  <div class="container">
    <label for="uname"><b>Product Name</b></label>
    <input type="text"  value="{{$product->p_name}}"  name="p_name" required>

    <label for="psw"><b>brand</b></label>
    <input type="text" value="{{$product->brand}}" name="brand" required>

    <label for="psw"><b>Price</b></label>
    <input type="text" value="{{$product->price}}" name="price" required>

    <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control" value="{{$product->image}}"name="image" >
        <input type="hidden"  class="form-control" name="currentimage"  value="{{ $product->image }}" >
        @if(!empty($product->image))
              @if( file_exists('storage/images/' . $product->image))
        <img  src="{{  asset('/storage/images/'.$product->image) }} " width="100px" height="100px">
        @else
        <img src="{{ $product->image}}" width="100px" height="100px" > 	  
        @endif 
        {{-- <img src="{{  asset('/storage/images/'.$product->image) }}" width="100px" height="100px" > --}}
        @endif


  
    </div>
<br>
        
    <button type="submit">update</button>
  </div>
 
  
   
  </div>
  
</form>













{{-- //....................................................... --}}

    
            

</body>
</html>