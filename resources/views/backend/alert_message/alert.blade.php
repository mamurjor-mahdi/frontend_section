@push('scripts')
    @if (session()->get('success'))
    <script>
        toastr.options = {
            "progressBar" : true,
            "closeButton": true,
        }
        toastr.success("{{ session()->get('success') }}","success!",{timeout:12000});
    </script>
    @elseif (session()->get('error'))
    <script>
        toastr.error("{{ session()->get('error') }}");
    </script>
    @elseif (session()->get('info'))
    <script>
        toastr.info("{{ session()->get('info') }}");
    </script>
    @endif
@endpush
