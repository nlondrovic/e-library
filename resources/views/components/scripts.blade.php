<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
{{--<script src="{{ asset('assets/js/jquery.min.js') }}"></script>--}}
<script src="{{ asset('assets/js/main.js') }}" defer></script>
<script src="{{ asset('assets/js/app.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('.search-select').select2({
            width: 'resolve',
            height: 'resolve',
            placeholder: "Select...",
            allowClear: true
        });
    });
</script>
