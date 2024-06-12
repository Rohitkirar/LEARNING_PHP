<!-- BEGIN: Theme CSS-->
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

@vite([
    'assets/vendor/fonts/fontawesome.css',
    'assets/vendor/fonts/tabler-icons.css',
    'assets/vendor/fonts/flag-icons.css',
    ])
<!-- 
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/fonts/fontawesome.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/fonts/tabler-icons.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/fonts/flag-icons.css')) }}" /> -->

@vite([])


<!-- Core CSS -->
<link rel="stylesheet" href="@vite(['assets/vendor/css' .$configData['rtlSupport'] .'/core' .($configData['style'] !== 'light' ? '-' . $configData['style'] : '') .'.css'])" class="{{ $configData['hasCustomizer'] ? 'template-customizer-core-css' : '' }}" />
<link rel="stylesheet" href="@vite(['assets/vendor/css' .$configData['rtlSupport'] .'/' .$configData['theme'] .($configData['style'] !== 'light' ? '-' . $configData['style'] : '') .'.css'])" class="{{ $configData['hasCustomizer'] ? 'template-customizer-theme-css' : '' }}" />
@vite('assets/css/demo.css')
<!-- <link rel="stylesheet" href="{{ asset(mix('assets/css/demo.css')) }}" /> -->


@vite([
    'assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css',
    'assets/vendor/libs/node-waves/node-waves.css',
    'assets/vendor/libs/typeahead-js/typeahead.css',
    ])

<!-- <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/node-waves/node-waves.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/typeahead-js/typeahead.css')) }}" /> -->

<!-- Vendor Styles -->
@yield('vendor-style')


<!-- Page Styles -->
@yield('page-style')
