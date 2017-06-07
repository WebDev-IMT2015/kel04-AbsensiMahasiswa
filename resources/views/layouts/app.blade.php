<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials._head')
</head>
<body>
    <div id="app">

    	@include('partials._messages')

        @include('partials._nav')

        @yield('content')

        @include('partials._footer')

    </div>

    @include('partials._javascripts')

    <!-- Scripts -->
    
</body>
</html>
