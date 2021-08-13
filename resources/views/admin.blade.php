{{-- data-target="#editEmployeeModal"   data-toggle="modal"  --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin|Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('home')}}" class="nav-link">Home</a>
      </li>
     
    </ul>

   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
		<li><a href="/logout" class="active btn btn-warning"><i class="fa fa-sign-out"></i> LogOut </a></li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{session('name')}}</a>
        </div>
      </div>

     
 </div>
 </aside>


 
 
 <div class="content-wrapper">
    {{-- ...................................... --}}
	<br><br><br>	
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				@if(session('status'))
				<h6 class="alert alert-success">{{ session('status')}}</h6>
				@endif
				<div class="row">
					<div class="col-sm-12">
						<h2>Add <b>Products</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="" class="btn btn-success" data-target="#addEmployeeModal"   data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
						
					</div>
				</div>
			</div>
<br>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						
						<th>Product Name</th>
						<th>Brand</th>						
						<th>Price</th>
						<th>Image</th>
						<th>Actions</th>
					</tr>
				</thead>
					<tbody>
                   @foreach ($product as $item)
					   
	
                   <tr>
					   <td>{{$item->p_name}}</td>
					   <td>{{$item->brand}}</td>
					   <td>{{$item->price}}</td>
					   <td>
                           <img src="{{ asset('uploades/'.$item->image)}}" width="70px" height="70px" >
						</td>
						<td>
							<a href='{{ url('edit/'.$item->id)}}' ><i  class='material-icons' data-toggle='tooltip' title='Edit' style="color:blue">&#xE254;</i></a>
							<a href='{{ url('delete/'.$item->id)}}' ><i class='material-icons' data-toggle='tooltip' title='Delete' style="color:red">&#xE872;</i></a>
						</td>
				   </tr>
                    @endforeach
					</tbody>

			</table>
			
		</div>
	</div>        
</div>


 

<!-- add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">

			<form action="{{ url('insert')}}" method="post" enctype="multipart/form-data" >
				@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Add Product</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Product Name</label>
						<input type="text" class="form-control" name="p_name" required>
					</div>
					<div class="form-group">
						<label>Brand</label>
						<input type="text" class="form-control" name="brand" required>
					</div>
					<div class="form-group">
						<label>Price</label>
                        <input type="text" class="form-control" name="price" required>
					</div>
                    <div class="form-group">
						<label>Image</label>
                        <input type="file" class="form-control" name="image" required>
					</div>
					{{-- <div class="form-group">
						<label>Image</label>
                        <input type="file" class="form-control"  name="myImages[]" multiple required>
					</div> --}}
										
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<button type="submit">save</button>
				</div>


			</form>
		</div>
	</div>
</div>
   {{-- ........................................... --}}
{{-- 
<div id="editEmployeeModal" class="modal fade text-center">
    <div class="modal-dialog">
      <div class="modal-content">
      </div>
    </div>
</div>  --}}

{{-- ........................................... --}}

 <br><br>

 {{-- <div class="row">
    <div class="col">
        <div class="mx-auto w-50 p-3 bg-dark text-white text-center">

           <h1>WELCOME</h1>

        </div>
      </div>
 </div> --}}
 
 
 </body>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

</html>
