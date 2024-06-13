<!-- BEGIN: Vendor JS-->
@vite('assets/vendor/libs/jquery/jquery.js')
@vite('assets/vendor/libs/popper/popper.js') 
@vite('assets/vendor/js/bootstrap.js')
@vite('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')
@vite('assets/vendor/libs/node-waves/node-waves.js')
@vite('assets/vendor/libs/hammer/hammer.js')
@vite('assets/vendor/libs/i18n/i18n.js')
@vite('assets/vendor/libs/typeahead-js/typeahead.js')
@vite('assets/vendor/js/menu.js')
@vite('assets/js/main.js')


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
