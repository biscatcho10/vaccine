 <!-- BEGIN: Vendor CSS-->
 <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/vendors.min.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/charts/apexcharts.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/vendors/css/extensions/toastr.min.css') }}">
 <!-- END: Vendor CSS-->

 <!-- BEGIN: Theme CSS-->
 <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/bootstrap.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/bootstrap-extended.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/colors.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/components.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/themes/dark-layout.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/themes/bordered-layout.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/themes/semi-dark-layout.css') }}">

 <!-- BEGIN: Page CSS-->
 <link rel="stylesheet" type="text/css"
     href="{{ asset('backend/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/pages/dashboard-ecommerce.css') }}">
 <link rel="stylesheet" type="text/css" href="{{ asset('backend/app-assets/css/plugins/charts/chart-apex.css') }}">
 <link rel="stylesheet" type="text/css"
     href="{{ asset('backend/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
 <!-- END: Page CSS-->

 <!-- BEGIN: Custom CSS-->
 <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/style.css') }}">
 <!-- END: Custom CSS-->

 <!-- BEGIN: DataTables -->
 <link href="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
 <link href="{{ asset('backend/app-assets/vendors/js/datatables/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
 <!-- END: DataTables -->

<!-- BEGIN:sweet alert-->
 <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('backend/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css')}}">
<!-- END:sweet alert-->

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">



 <style>
     /* Start Parsley js Style */
     input.parsley-success,
     select.parsley-success,
     textarea.parsley-success {
         color: #468847;
         background-color: #DFF0D8;
         border: 1px solid #D6E9C6;
     }

     input.parsley-error,
     select.parsley-error,
     textarea.parsley-error {
         color: #B94A48;
         background-color: #F2DEDE;
         border: 1px solid #EED3D7;
     }

     .parsley-errors-list {
         margin: 2px 0 3px;
         padding: 0;
         list-style-type: none;
         font-size: 0.9em;
         line-height: 0.9em;
         opacity: 0;

         transition: all .3s ease-in;
         -o-transition: all .3s ease-in;
         -moz-transition: all .3s ease-in;
         -webkit-transition: all .3s ease-in;
     }

     .parsley-errors-list.filled {
         opacity: 1;
     }

     .parsley-type,
     .parsley-required,
     .parsley-equalto,
     .parsley-pattern,
     .parsley-length {
         color: #ff0000;
     }

     /* End Parsley js Style */

     .buttons-html5{
     background-color: rgb(55, 56, 139) !important
 }

 </style>

 @stack('css')
