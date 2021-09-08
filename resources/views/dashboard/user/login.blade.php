<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <title>Login</title>
</head>
<body>
<div class="container">

    @if(\Illuminate\Support\Facades\Session::has('error'))
        <div class="alert alert-danger">
            {{\Illuminate\Support\Facades\Session::get('error')}}
        </div>
    @endif

    <form action="{{route('user.logged')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter email" value="{{old('email')}}" name="email">
            <span class="text-danger">@error('email'){{$message}}@enderror</span>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" value="{{old('password')}}" name="password">
            <span class="text-danger">@error('password'){{$message}}@enderror</span>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{route('user.register')}}">User Register</a>
    </form>
</div>
</body>
</html>
