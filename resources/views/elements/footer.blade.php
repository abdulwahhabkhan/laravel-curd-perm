<script src="{{ asset('js/jquery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/jquery/jquery-migrate-1.1.0.min.js') }}"></script>
<script src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('js/apps.js') }}"></script>

@stack('scripts')

<script>
    var basePath = "{{ url('/') }}";
    $(document).ready(function() {
        App.init();
    });
</script>