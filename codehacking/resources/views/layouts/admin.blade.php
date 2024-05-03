<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> @yield('title') </title>

    @vite(['resources/css/app.css'])

</head>

<body id="admin-page">

        <!-- Navigation -->

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

            <div class="navbar-header">
                <a class="navbar-brand" href="/">Home</a>
            </div>

            <x-navbar.nav-top-profile />

            <div class="navbar-default sidebar" role="navigation">

                <div class="sidebar-nav navbar-collapse">

                    <ul class="nav" id="side-menu">

                        <x-navbar.nav-search />

                        <li><a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>

                        <x-navbar.nav-users />

                        <x-navbar.nav-posts />

                        <x-navbar.nav-categories />

                        <x-navbar.nav-media />

                    </ul>
                </div>
            </div>
        </nav>



    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @vite(['resources/js/app.js'])

    @yield('footer')

</body>

</html>
