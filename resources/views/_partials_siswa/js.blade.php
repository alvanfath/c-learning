<script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('assets/modules/popper.js') }}"></script>
<script src="{{ asset('assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/stisla.js') }}"></script>

<script src="{{asset('assets/modules/izitoast/js/iziToast.min.js') }}"></script>
<script src="{{asset('assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/modules/datatables/DataTables-1.10.16/js/datatables_responsive.js') }}"></script>
<script src="{{asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script>
    $(document).ready(function() {
        alert();
        token();
    })

    function alert() {
        @if (Session::has('success'))
            iziToast.success({
                message: '{{ Session::get('success') }}',
                position: 'topRight'
            });
        @elseif (Session::has('error'))
            iziToast.error({
                message: '{{ Session::get('error') }}',
                position: 'topRight'
            });
        @endif
    }

    function token() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
</script>
