@if(Request::ajax())
    {{ 'ajax called' }}
    @yield('content')
@else
@include('elements.head')
<body>
    @yield('content')
</body>
</html>
@endif