<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body class="d-flex justify-content-center h-100 mt-5">
            <div class="d-flex align-items-center">
                <a href="{{route('admin.login')}}" class="btn btn-success ml-4">As Admin</a>
                <a href="{{route('user.login')}}" class="btn btn-danger ml-4">As User</a>
            </div>
    </body>
</html>
