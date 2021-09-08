<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    <div class="container">
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <div class="alert alert-success">
                {{\Illuminate\Support\Facades\Session::get('success')}}
            </div>
        @endif
            @if(\Illuminate\Support\Facades\Session::has('error'))
                <div class="alert alert-danger">
                    {{\Illuminate\Support\Facades\Session::get('error')}}
                </div>
            @endif

        <form action="{{route('admin.create')}}" method="post" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter full name" value="{{old('name')}}" name="name">
                <span class="text-danger">@error('name'){{$message}}@enderror</span>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" aria-describedby="phone" placeholder="Enter your phone" value="{{old('phone')}}" name="phone">
                <span class="text-danger">@error('phone'){{$message}}@enderror</span>
            </div>
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
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" placeholder="Confirm password" value="{{old('cpassword')}}" name="cpassword">
                <span class="text-danger">@error('cpassword'){{$message}}@enderror</span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('admin.login')}}">A have Already</a>
        </form>
    </div>
</body>
</html>
