<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<title>Registration</title>
</head>

<body>
@php
$data = session()->all();
@endphp
	<div class="container"> @if(\Session::has('success'))
		<div class="alert alert-success" role="alert"> {{ \Session::get('success') }} </div> @endif @if(isset($errors)) @if ($errors->any()) @foreach ($errors->all() as $error)
		<div class="alert alert-danger" role="alert"> {{ $error }} </div> @endforeach @endif @endif
		 
			<div class="row   jumbotron">
				<div class="col-md-6">
                      <H4>Welcome {{ucwords($data['user_data']['name'])}}</H4>
                    </div> 
                 <div class="col-md-6 text-right"> 
                    
                      <a href="{{url('logout')}}">  <button>logout</button></a>
                    
                    </div> 
			</div>
		 
	</div>
</body>

</html>