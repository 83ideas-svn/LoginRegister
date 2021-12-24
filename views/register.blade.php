<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<title>Registration</title>
</head>

<body>
	<div class="container">
		<form action="{{route('register')}}" method="post"> @csrf
			<h5 class="text-center">Create New Account</h5>
			<div class="row ">
				<div class="col-md-3"> </div>
				<div class="col-md-6 jumbotron">
				@if(\Session::has('success'))
		     <div class="alert alert-success" role="alert"> {{ \Session::get('success') }} </div> @endif @if(isset($errors)) @if ($errors->any()) @foreach ($errors->all() as $error)
		   <div class="alert alert-danger" role="alert"> {{ $error }} </div> @endforeach @endif @endif
					<div class="col-sm-12 form-group">
						<label for="name-f"> Name</label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Enter your name." > 
                    </div>
					<div class="col-sm-12 form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Enter your email." > </div>
					<div class="col-sm-12 form-group">
						<label for="pass">Password</label>
						<input type="Password" name="password" class="form-control" id="pass" placeholder="Enter your password." > </div>

						
						<div class="col-sm-12 form-group">
						<label for="pass">Confirm Password</label>
						<input id="password" class="form-control"   placeholder="Enter your Confirm password." type="password" name="password_confirmation" required> </div>

					<div class="col-sm-12 form-group mb-0">
						<button class="btn btn-primary float-right">Submit</button>
					</div>
				</div>
				<div class="col-md-3"> </div>
			</div>
		</form>
	</div>
</body>

</html>