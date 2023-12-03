<html lang="en">
    @include('frontend.include.header')
<body>
    @yield('content')
    @include('frontend.include.source')
    @stack('script')
</body>
@include('frontend.include.footer')
</html>
