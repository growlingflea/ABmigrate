<!-- Stored in resources/views/layouts/app.blade.php -->


<html>
<head>
    <title>App Name - @yield('title')</title>
</head>
<body>
@section('sidebar')
    This is the master sidebar.
@show

<div class="container">
    @section('content')
    This is content content
        @show
</div>

<div class="container">
    @section('footer')
    This is my master footer
    @show
</div>
</body>
</html>