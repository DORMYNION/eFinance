<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title2') }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@3.2/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,700,800&display=swap" rel="stylesheet">
    <link href="{{ asset('css/apply.css') }}" rel="stylesheet" />
    @yield('styles')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-164224358-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'UA-164224358-1');
    </script>

    <!-- development version, includes helpful console warnings -->
    {{-- <script src="https://unpkg.com/vue/dist/vue.js"></script> --}}
    {{-- <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script> --}}
</head>

<body>
    <header class="bg-white">
        <nav class="navbar navbar-light py-4 px-5" role="navigation">
            <a href="https://www.efinanceng.com" class="navbar-brand">
                <img  src="{{ asset('img/efinance-logo.png')}}" alt="Logo">
                <span class="pl-3 h3"> |&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Financial Partner</span>
            </a>

            <div class="">
                <a href="https://www.efinanceng.com" class="btn btn-success btn-lg">Back Home</a>
            </div>
        </nav>
    </header>

    <main class="container-fluid px-0 pb-5 mb-5" role="main">
        @yield("content")
    </main>
    
    <footer id="footer" class="bg-white">
        <div id="footertop" class="px-5">
                <div class="d-flex justify-content-md-start">
                    <div><img src="{{ asset('img/efinance-logo.png')}}" alt="footer logo"></div>
                </div>
        </div>
        <div id="footerbottom" class="px-5">
                <div class="d-flex justify-content-md-start">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/efinanceng/?ref=br_rs"">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://twitter.com/efinanceng">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/efinanceng/">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-end">
                    <span class="h4">Copyright © 2020 e-FINANCE Nigeria Ltd. All Rights Reserved.</span>
                </div>
        </div>
    </footer>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js" integrity="sha256-T/f7Sju1ZfNNfBh7skWn0idlCBcI3RwdLSS4/I7NQKQ=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/apply.js') }}"></script>
    @yield('scripts')
</body>
</html>