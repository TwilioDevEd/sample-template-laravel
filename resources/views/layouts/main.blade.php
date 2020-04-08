<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="icon" type="image/png" href="img/favicon.ico">
    <link rel="stylesheet" href="/css/app.css">
    <title>Sample App - @yield('title')</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="navbar-header"><a class="navbar-brand" href="/">Sample App Name</a></div>
        <div>
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row pt-3">
        <div class="col">@yield('content')</div>
    </div>
    <hr>
    <footer>Made with <i>❤️</i> by your pals
        <a href="http://www.twilio.com">@twilio</a></footer>
    @yield('scripts')
</div>
</body>

</html>
