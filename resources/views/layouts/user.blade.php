<!DOCTYPE html>
<html lang="en-US" class="js">

<head>
    <base href="{{ route('user.home') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">

    <!-- Page Title  -->
    <title>E-Finance</title>

    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('css/dashlite.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('css/theme.css') }}">

    @yield('styles')

</head>

<body class="nk-body npc-subscription has-aside ui-clean ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-lg wide-xl">
                        <div class="nk-header-wrap">
                            <div class="nk-header-brand">
                                <a href="{{ route('user.home') }}" class="logo-link">
                                    <img class="logo-light logo-img" src="{{ asset('img/efinance-logo.png') }}" srcset="{{ asset('img/efinance-logo.png') }} 2x" alt="logo">
                                    <img class="logo-dark logo-img" src="{{ asset('img/efinance-logo.png') }}" srcset="{{ asset('img/efinance-logo.png') }} 2x" alt="logo-dark">
                                </a>
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    @if($user->profile_image)
                                                        <img class="img-fluid no-border" src="{{ url('storage/' . $user->profile_image->id . '/' . $user->profile_image->file_name) }}"  alt="{{ $user->name }} Profile Image">
                                                    @else
                                                        <img class="img-fluid no-border" src="{{ asset('img/profile/default.jpeg') }}" alt="{{ $user->name }} Profile Image">
                                                    @endif
                                                </div>
                                                <div class="user-name dropdown-indicator d-none d-sm-block">{{ $user->name }}</div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        @if($user->profile_image)
                                                            <a href="{{ url('storage/' . $user->profile_image->id . '/' . $user->profile_image->file_name) }}" target="_blank">
                                                                <img class="img-fluid no-border" src="{{ url('storage/' . $user->profile_image->id . '/' . $user->profile_image->file_name) }}"  alt="{{ $user->name }} Profile Image">
                                                            </a>
                                                        @else
                                                            <img class="img-fluid no-border" src="{{ asset('img/profile/default.jpeg') }}" alt="{{ $user->name }} Profile Image">
                                                        @endif
                                                        {{-- <span>@php echo substr($user->name, 0,1); @endphp</span> --}}
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">{{ $user->name }}</span>
                                                        <span class="sub-text">{{ $user->email }}</span>
                                                    </div>
                                                    <div class="user-action">
                                                        <a class="btn btn-icon mr-n2" href="{{ route('user.profile') }}"><em class="icon ni ni-setting"></em></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="{{ route('user.profile') }}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                    <li class="dropdown notification-dropdown">
                                        <a href="#" class="dropdown-toggle nk-quick-nav-icon mr-lg-n1" data-toggle="dropdown">
                                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right dropdown-menu-s1">
                                            <div class="dropdown-head">
                                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                                <a href="{{ route('user.markAll') }}">Mark All as Read</a>
                                            </div>
                                            <div class="dropdown-body">
                                                <div class="nk-notification">
                                                    @foreach ($user->notifications as $notification)
                                                        
                                                        {{-- <div class="nk-notification-item dropdown-inner">
                                                            <div class="nk-notification-icon">
                                                                <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                                            </div>
                                                            <div class="nk-notification-content"> --}}
                                                                {{-- @foreach(explode(',', $notification->data) as $info) 
                                                                    <option>{{$data}}</option>
                                                                @endforeach --}}
                                                            {{-- <div class="nk-notification-text">Kindly upload your documents</div>
                                                                <div class="nk-notification-time">{{ $notification->created_at->diffForHumans() }}</div>
                                                            </div>
                                                        </div> --}}
                                                    @endforeach
                                                </div><!-- .nk-notification -->
                                            </div><!-- .nk-dropdown-body -->
                                            <div class="dropdown-foot center">
                                                <a href="#">View All</a>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                    <li class="d-lg-none">
                                        <a href="#" class="toggle nk-quick-nav-icon mr-n1" data-target="sideNav"><em class="icon ni ni-menu"></em></a>
                                    </li>
                                </ul><!-- .nk-quick-nav -->
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container wide-xl">
                        <div class="nk-content-inner">

                            @include('partials.aside')
                            

                            <div class="nk-content-body">
                                <div class="nk-content-wrap">

                                    @if(session('document_type'))
                                    {{-- @php dd(session()->get('document_type')); @endphp --}}
                                        <div class="row mb-2">
                                            <div class="col-lg-12">
                                                <div class="alert alert-pro alert-warning" role="alert">
                                                    <div class="alert-text">
                                                        <h6>Upload Documents</h6>
                                                        <p>Kindly upload the following documents <b>{{ session()->get('document_type') }}</b> to verify your account and for loan approval.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(session('profile_image'))
                                        <div class="row mb-2">
                                            <div class="col-lg-12">
                                                <div class="alert alert-pro alert-warning" role="alert">
                                                    <div class="alert-text">
                                                        <h6>Upload Profile Picture</h6>
                                                        <p><b>{{ session()->get('profile_image') }}</b></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(session('message'))
                                        <div class="row mb-2">
                                            <div class="col-lg-12">
                                                <div class="alert alert-pro alert-success" role="alert">
                                                    <div class="alert-text">
                                                        <h6>Successfully</h6>
                                                        <p>{{ session('message') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if($errors->count() > 0)
                                        <div class="row mb-2">
                                            <div class="col-lg-12">
                                                <div class="alert alert-pro alert-danger" role="alert">
                                                    <div class="alert-text">
                                                        <h6>Failed</h6>
                                                        <ul class="list-unstyled">
                                                            @foreach($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif


                                    @yield('mainContent')
                                </div>

                                <!-- footer @s -->
                                <div class="nk-footer">
                                    <div class="container wide-xl">
                                        <div class="nk-footer-wrap g-2">
                                            <div class="nk-footer-copyright"> &copy; 2020 Efinance.
                                            </div>
                                            <div class="nk-footer-links">
                                                <ul class="nav nav-sm">
                                                    <li class="nav-item"><a class="nav-link" href="https://www.efinanceng.com/terms.php">Terms</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="https://efinanceng.com/privacy.php">Privacy Policy</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- footer @e -->
                            </div>

                        </div>
                    </div>
                </div>
                <!-- content @e -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('js/bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    @yield('scripts')
</body>

</html>