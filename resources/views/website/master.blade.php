<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <title>As Sunnah Products - @yield('title')</title>
    @include('website.includes.style')
</head>

<body>
    @include('website.includes.header')
    @yield('body')
    @include('website.includes.footer')
    @include('website.includes.script')
</body>

</html>
