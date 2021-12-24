<!DOCTYPE html>
<html>
<head>
<style>
a:link, a:visited {
  background-color: #3490dc;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: red;
}
</style>
</head>
<body>


<h4>Hello! {{$name}} </h4>
<p>You are receiving this email because we received a password reset request for your account.</p>
<br>
<a href="{{url('reset-password')}}/{{$token}}" target="_blank" style=" background-color: #3490dc;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;">Reset Password</a>
<br>
<br>
Thanks and Regards
</body>
</html>