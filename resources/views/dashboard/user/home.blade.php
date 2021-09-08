<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>
<div class="container">

<div class="container">
    <div class="row">
        <h2 class="mt-5">Dashboard</h2>
        <div class="col-md-6">
            @if(\Illuminate\Support\Facades\Session::has('success'))
                <div class="alert alert-success">
                    {{\Illuminate\Support\Facades\Session::get('success')}}
                </div>
            @endif
        </div>
        <table class="table table-responsive">
            <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
            </thead>
            <tbody>
            <td>{{\Illuminate\Support\Facades\Auth::guard('web')->user()->name}}</td>
            <td>{{\Illuminate\Support\Facades\Auth::guard('web')->user()->email}}</td>
            <td>
                <a href="{{route('user.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit()">Logout</a>
                <form action="{{route('user.logout')}}" id="logout-form" method="post">
                    @csrf
                </form>
            </td>
            </tbody>
        </table>
    </div>
</div>
</div>
</body>
</html>
