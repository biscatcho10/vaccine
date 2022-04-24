<!-- Required datatable js -->
<script src="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net/js/jquery.dataTables.min.js') }}">
</script>
<script
src="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}">
</script>
<!-- Buttons examples -->
<script
src="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-buttons/js/dataTables.buttons.min.js') }}">
</script>
<script
src="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}">
</script>
<script src="{{ asset('backend/app-assets/vendors/js/datatables/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('backend/app-assets/vendors/js/datatables/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('backend/app-assets/vendors/js/datatables/pdfmake/build/vfs_fonts.js') }}"></script>
<script src="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-buttons/js/buttons.html5.min.js') }}">
</script>
<script src="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-buttons/js/buttons.print.min.js') }}">
</script>
<script src="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-buttons/js/buttons.colVis.min.js') }}">
</script>
<!-- Responsive examples -->
<script
src="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
</script>
<script
src="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
</script>

<script>
    $(document).ready(function() {
        $("#datatable").DataTable(),
        $("#datatable1").DataTable(),
            $("#datatable-buttons")
            .DataTable({
                lengthChange: !1,
                buttons: [{
                        extend: "pdfHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]

                        }
                    },
                    {
                        extend: "csvHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    {
                        extend: "excelHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    }
                ],
            })
            .buttons()
            .container()
            .appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");
    });
    $(document).ready(function() {
            $("#datatable-buttons1")
            .DataTable({
                lengthChange: !1,
                buttons: [{
                        extend: "pdfHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]

                        }
                    },
                    {
                        extend: "csvHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    },
                    {
                        extend: "excelHtml5",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5]
                        }
                    }
                ],
            })
            .buttons()
            .container()
            .appendTo("#datatable-buttons1_wrapper .col-md-6:eq(0)");
    });
</script>
