<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<title>Set New Password</title>
</head>

<body>
	<div class="container">
		<form action="{{url('reset-password')}}" method="post"> @csrf
			<h5 class="text-center">Set New Password</h5>
			<div class="row">
     
				<div class="col-md-3"> </div>
				<div class="col-md-6 jumbotron">
                @if (Session::has('message'))
                         <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                          <input type="hidden" name="token" value="{{$token}}">
  
                          <div class="form-group ">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus placeholder="Email">
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                          </div>
  
                          <div class="form-group">
                                <input type="password" id="password" class="form-control" name="password" placeholder="Password" required autofocus>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              
                          </div>
  
                          <div class="form-group ">
                                  <input type="password" id="password-confirm" class="form-control" name="password_confirmation"  placeholder=" Confirm Password" required autofocus>
                                  @if ($errors->has('password_confirmation'))
                                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                  @endif
                            
                          </div>
				   <div class="col-sm-12 form-group mb-0">
						<button class="btn btn-primary float-right">Submit</button>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
		</form>
	</div>
</body>

</html>