<!-- BEGIN: Vendor JS-->
@vite([
    'assets/vendor/libs/jquery/jquery.js' , 
    'assets/vendor/libs/popper/popper.js' , 
    'assets/vendor/js/bootstrap.js' ,
    'assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js' , 
    'assets/vendor/libs/node-waves/node-waves.js' , 
    'assets/vendor/libs/hammer/hammer.js' , 
    'assets/vendor/libs/i18n/i18n.js' , 
    'assets/vendor/libs/typeahead-js/typeahead.js' , 
    'assets/vendor/js/menu.js' , 
    'assets/js/main.js'
    ])

@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
