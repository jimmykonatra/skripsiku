<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>PT. Sumber Langgeng Sejahtera</title>
  <!-- Bootstrap core CSS-->
  <link href="{{asset('css/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{asset('css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
</head>
<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      
      <div class="card-header text-center"><b>LOGIN</b></div>
      <div class="text-center">
				<img style="width:100% ; height:auto"  src="{{asset('images/logo.jpg')}}" class="img-circle" alt="">
			</div>
      <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
          <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label for="exampleInputEmail1">Username</label>
            <input id="email" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>            @if ($errors->has('username'))
            <span class="help-block">
              <strong>{{ $errors->first('username') }}</strong>
            </span> @endif
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="exampleInputPassword1">Password</label>
            <input id="password" type="password" class="form-control" name="password" required> @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span> @endif
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </div>
          </div>
          <button type="submit" class="btn btn-primary">
                                    Login
          </button>
        </form>
        
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('css/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('css/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{asset('css/jquery-easing/jquery.easing.min.js')}}"></script>
</body>
</html>