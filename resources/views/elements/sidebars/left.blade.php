<!-- begin #sidebar -->
@php($current_url = Route::current()->getName())
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <a href="javascript:;"><img src="{{ asset('img/user-13.jpg') }}" alt="{{ Auth::user()->name }}" /></a>
                </div>
                <div class="info">
                    {{ $user->name }}
                    <small>{{ $user->role->name }}</small>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        {!! getMenu($menu) !!}
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->