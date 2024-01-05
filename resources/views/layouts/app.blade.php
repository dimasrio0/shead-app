<!DOCTYPE html>
<html lang="en">

<head>
    <title>SHEADS</title>
    <meta charset="utf-8">
    <meta name = "format-detection" content = "telephone=no" />
    <link rel="icon" href="images/favicon.ico">
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="
        https://cdn.jsdelivr.net/npm/rich-text-editor-vj@3.0.6/css/froala_editor.min.css
        "
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/camera.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-1.2.1.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/superfish.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ui.totop.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.equalheights.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mobilemenu.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/js/camera.js') }}"></script>
    <!--[if (gt IE 9)|!(IE)]><!-->
    <script src="{{ asset('assets/js/jquery.mobile.customized.min.js') }}"></script>

    <!--<![endif]-->
    <script>
        $(document).ready(function() {
            jQuery('#camera_wrap').camera({
                loader: false,
                pagination: true,
                minHeight: '350',
                thumbnails: false,
                height: '29.12820512820513%',
                caption: true,
                navigation: false,
                fx: 'mosaic'
            });
            $().UItoTop({
                easingType: 'easeOutQuart'
            });
        });
    </script>

</head>

<body class="page1" id="top">
    <div class="main_color">
        <header>
            <!--==============================header=================================-->
            <div class="container_12">
                <div class="grid_12">
                    <div class="header_top">

                        <div class="d-flex align-items-center flex-column mb-5">
                            <h1 class="h1 text-black">
                                <strong><span class="text-primary">SH</span><span style="color: #7ecefd">EA</span><span
                                        class="text-danger">DS</span></strong>
                            </h1>
                            <h5 class="h5">Fish Disease Diagnosis System</h5>
                            @if (Auth::user())
                                <h5 class="h5">Welcome, {{ Auth::user()->name }}</h5>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn text-primary text-underline">Logout</button>
                                </form>
                            @endif
                        </div>

                        <div class="clear"></div>
                        @if (\Request::route()->getName() !== 'login' && \Request::route()->getName() !== 'register')
                            <div class="menu_block "><span></span>
                                <nav class="horizontal-nav full-width horizontalNav-notprocessed">
                                    <ul class="sf-menu">
                                        <li class="current"><a href="/">Home</a></li>
                                        @if (Auth::user() && Auth::user()->name == 'admin')
                                            <li><a href="/penyakit">Kelola data penyakit</a></li>
                                        @endif
                                        @if (Auth::user())
                                            @if (Auth::user()->name == 'admin')
                                            <li><a href="/gejala">Kelola data gejala</a></li>
                                            @endif
                                            <li><a href="/diagnosa">Diagnosa</a></li>
                                        @endif
                                        @if (!Auth::user())
                                            <li><a href="/login">Login</a></li>
                                        @endif
                                        @if (Auth::user())
                                            <li><a href="/diagnosis-history">History Diagnosa</a></li>
                                        @endif
                                    </ul>
                                </nav>
                                <div class="clear"></div>
                            </div>
                        @endif
                    </div>
                </div>


            </div>
        </header>

        <div class="content">
            @yield('content')
        </div>
    </div>
    <footer>
        <div class="container_12">
            <div class="grid_12">
                <div class="copy">
                    <strong><span class="text-primary">SH</span>EA<span class="text-danger">DS</span></strong> &copy;
                    <span id="copyright-year"></span> |
                    <a href="index-5.html">Privacy Policy</a> <!--{%FOOTER_LINK} -->
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script script src="https://cdn.jsdelivr.net/npm/rich-text-editor-vj@3.0.6/js/froala_editor.min.js"></script>
    <script script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        new FroalaEditor('#solusi');
        let table = new DataTable('#myTable');
    </script>
</body>

</html>
