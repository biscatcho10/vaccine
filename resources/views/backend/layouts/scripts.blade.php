<!-- BEGIN: Vendor JS-->
<script src="{{ asset('backend/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('backend/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
<script src="{{ asset('backend/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('backend/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('backend/app-assets/js/core/app.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('backend/app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script>
<!-- END: Page JS-->

<!-- BEGIN: Page JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
<!-- END: Page JS-->

<!-- BEGIN: SWEET ALERT-->
<script src="{{asset('backend/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<!-- END: SWEET ALERT-->

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })

    $(document).ready(function() {
        $('#form').parsley();
    });
</script>

@stack('js')
