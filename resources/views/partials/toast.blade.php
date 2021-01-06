<script>

    $(document).ready(function () {
        @if(request()->session()->has('info'))
        toastr.info("{{ request()->session()->get('info') }}");
        @endif

        @if(request()->session()->has('success'))
        toastr.success("{{ request()->session()->get('success') }}");
        @endif

        @if(request()->session()->has('warning'))
        toastr.warning("{{ request()->session()->get('warning') }}");
        @endif

        @if(request()->session()->has('error'))
        toastr.error("{{ request()->session()->get('error') }}");
        @endif
    });

</script>