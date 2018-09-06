@if(Request::ajax())
    {{ 'ajax called' }}
    @yield('content')
@else
@include('elements.head')
<body>
    <div id="page-container" class="page-sidebar-fixed page-header-fixed">
        @include('elements.header')
        @include('elements.sidebars.left')
        <main id="content" class="content">
            <div class="messages" id="messages">
                @if (session('warning'))
                    <div class="alert alert-warning">
                        <strong><i class="fa fa-warning"></i></strong> {{ session('warning') }}
                        <span class="close" data-dismiss="alert">&times;</span>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        <strong><i class="fa fa-check"></i></strong> {{ session('success') }}
                        <span class="close" data-dismiss="alert">&times;</span>
                    </div>
                @endif

            </div>
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    @include('elements.footer')
</body>
</html>
@endif