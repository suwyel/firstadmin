<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Mono - Responsive Admin & Dashboard Template</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="{{ asset('public/backend/plugins/material/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/backend/plugins/simplebar/simplebar.css') }}" rel="stylesheet" />
    <!-- public/backend/plugins CSS STYLE -->
    <link href="{{ asset('public/backend/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/backend/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('public/backend/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />

    <link href="{{ asset('public/backend/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('https://cdn.quilljs.com/1.3.6/quill.snow.css') }}" rel="stylesheet">

    <!-- Dropify -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- loader --}}
    <link href="{{ asset('public/backend/plugins/ladda/ladda.min.css') }}" rel="stylesheet" />

    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="{{ asset('public/backend/css/style.css') }}" />
    <link id="main-css-href" rel="stylesheet" href="{{ asset('public/backend/css/style.css.map') }}" />

    {{-- fontwasome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- FAVICON -->
    <link href="{{ asset('public/backend/images/favicon.png') }}" rel="shortcut icon" />

    <link id="main-css-href" rel="stylesheet" href="{{ asset('public/backend/css/custom.css') }}" />


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="{{ asset('public/backend/plugins/nprogress/nprogress.js') }}"></script>
</head>


<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>


    <div id="toaster"></div>


    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">


        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="/index.html">
                        <img src="{{ asset('public/backend/images/logo.png') }}" alt="Mono">
                        <span class="brand-name">MONO</span>
                    </a>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-left" data-simplebar style="height: 100%;">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">
                        <li class="has-sub">
                            <a class="sidenav-item-link " href="javascript:void(0)" data-toggle="collapse"
                                data-target="#email" aria-expanded="false" aria-controls="email">
                                <i class="mdi mdi-account"></i>
                                <span class="nav-text">User Name</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse" id="email" data-parent="#sidebar-menu">
                                <div class="sub-menu">
                                    <li>
                                        <a class="sidenav-item-link" href="email-inbox.html">
                                            <span class="nav-text">Profile Details</span>

                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="email-inbox.html">
                                            <span class="nav-text">Edit Profile</span>

                                        </a>
                                    </li>
                                    <li>
                                        <a class="sidenav-item-link" href="email-details.html">
                                            <span class="nav-text">Change Password</span>

                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </li>

                        <li class="{{ (request()->segment(1) == 'live_matches') ? 'active' : '' }}">
                            <a class="sidenav-item-link" href="{{ route('live_matches.index') }}">
                                <span class="icon"><i class="fas fa-file-video"></i></span>
                                <span class="nav-text">Live Control</span>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="contacts.html">
                                <span class="icon"><i class="fas fa-bell"></i></span>
                                <span class="nav-text">Predictions</span>
                            </a>
                        </li>

                        <li>
                            <a class="sidenav-item-link" href="team.html">
                                <span class="icon"><i class="mdi mdi-account-group"></i></span>
                                <span class="nav-text">App Users</span>
                            </a>
                        </li>

                        <li class="{{ (request()->segment(1) == 'apps') ? 'active' : '' }}">
                            <a class="sidenav-item-link  " href="{{ route('apps.index') }}">
                                <span class="icon"> <i class="fab fa-app-store-ios"></i></span>
                                <span class="nav-text">Apps</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="calendar.html">
                                <span class="icon"><i class="fas fa-bell"></i></span>
                                <span class="nav-text">Custom Ads</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="calendar.html">
                                <span class="icon"> <i class="fas fa-bell"></i></span>
                                <span class="nav-text">Notifications</span>
                            </a>
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="calendar.html">
                                <span class="icon"> <i class="fas fa-user"></i></span>
                                <span class="nav-text">Manage Users</span>
                            </a>
                        </li>
                        <li class="has-sub expand">
                            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                                data-target="#customization" aria-expanded="true" aria-controls="customization">
                                <span class="icon"> <i class="fas fa-cogs"></i></span>
                                <span class="nav-text">Administration</span> <b class="caret"></b>
                            </a>
                            <ul class="collapse show" id="customization" data-parent="#sidebar-menu" style="">
                                <div class="sub-menu">



                                    <li>
                                        <a class="sidenav-item-link" href="navbar-customization.html">
                                            <span class="nav-text">Navbar</span>

                                        </a>
                                    </li>






                                    <li>
                                        <a class="sidenav-item-link" href="sidebar-customization.html">
                                            <span class="nav-text">Sidebar</span>

                                        </a>
                                    </li>






                                    <li>
                                        <a class="sidenav-item-link" href="styling.html">
                                            <span class="nav-text">Styling</span>

                                        </a>
                                    </li>




                                </div>
                            </ul>
                        </li>



                    </ul>

                </div>

                <div class="sidebar-footer">
                    <div class="sidebar-footer-content">
                        <ul class="d-flex">
                            <li>
                                <a href="user-account-settings.html" data-toggle="tooltip"
                                    title="Profile settings"><i class="mdi mdi-settings"></i></a>
                            </li>
                            <li>
                                <a href="#" data-toggle="tooltip" title="No chat messages"><i
                                        class="mdi mdi-chat-processing"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>



        <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
        <div class="page-wrapper">

            <!-- Header -->
            <header class="main-header" id="header">
                <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>


                    <div class="navbar-right ">


                        <ul class="nav navbar-nav">
                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <img src="{{ asset('public/backend/images/user/user-xs-01.jpg') }}"
                                        class="user-image rounded-circle" alt="User Image" />
                                    <span class="d-none d-lg-inline-block">John Doe</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-link-item" href="user-profile.html">
                                            <i class="mdi mdi-account-outline"></i>
                                            <span class="nav-text">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-link-item" href="email-inbox.html">
                                            <i class="mdi mdi-email-outline"></i>
                                            <span class="nav-text">Message</span>
                                            <span class="badge badge-pill badge-primary">24</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-link-item" href="user-activities.html">
                                            <i class="mdi mdi-diamond-stone"></i>
                                            <span class="nav-text">Activitise</span></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-link-item" href="user-account-settings.html">
                                            <i class="mdi mdi-settings"></i>
                                            <span class="nav-text">Account Setting</span>
                                        </a>
                                    </li>

                                    <li class="dropdown-footer">
                                        <a class="dropdown-link-item" href="{{ route('logout') }}"> <i
                                                class="mdi mdi-logout"></i> Log Out </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>


            </header>

            <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
            <div class="content-wrapper">
                <div class="content">
                    <!-- Top Statistics -->

                    @yield('content')


                </div>

            </div>

            <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        &copy; <span id="copy-year">{{ date('Y') }}</span> Copyright Mono Dashboard Bootstrap
                        Template by <a class="text-primary" href="http://www.iamabdus.com/"
                            target="_blank">Abdus</a>.
                    </p>
                </div>

            </footer>

        </div>
    </div>

    <!-- Card Offcanvas -->
    <div class="card card-offcanvas" id="contact-off">
        <div class="card-header">
            <h2>Contacts</h2>
            <a href="#" class="btn btn-primary btn-pill px-4">Add New</a>
        </div>
        <div class="card-body">

            <div class="mb-4">
                <input type="text" class="form-control form-control-lg form-control-secondary rounded-0"
                    placeholder="Search contacts...">
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="images/user/user-sm-01.jpg" alt="User Image">
                        <span class="active bg-primary"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Selena Wagner</span>
                        <span class="discribe">Designer</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="images/user/user-sm-02.jpg" alt="User Image">
                        <span class="active bg-primary"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Walter Reuter</span>
                        <span>Developer</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="images/user/user-sm-03.jpg" alt="User Image">
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Larissa Gebhardt</span>
                        <span>Cyber Punk</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="images/user/user-sm-04.jpg" alt="User Image">
                    </a>

                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Albrecht Straub</span>
                        <span>Photographer</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="images/user/user-sm-05.jpg" alt="User Image">
                        <span class="active bg-danger"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Leopold Ebert</span>
                        <span>Fashion Designer</span>
                    </a>
                </div>
            </div>

            <div class="media media-sm">
                <div class="media-sm-wrapper">
                    <a href="user-profile.html">
                        <img src="images/user/user-sm-06.jpg" alt="User Image">
                        <span class="active bg-primary"></span>
                    </a>
                </div>
                <div class="media-body">
                    <a href="user-profile.html">
                        <span class="title">Selena Wagner</span>
                        <span>Photographer</span>
                    </a>
                </div>
            </div>

        </div>
    </div>




    <script src="{{ asset('public/backend/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('https://unpkg.com/hotkeys-js/dist/hotkeys.min.js') }}"></script>



    <script src="{{ asset('public/backend/plugins/apexcharts/apexcharts.js') }}"></script>
    {{-- Dropify --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('public/backend/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('public/backend/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/jvectormap/jquery-jvectormap-us-aea.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="{{ asset('public/backend/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('public/backend/js/app.js') }}"></script>




    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js"
        integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/brands.min.js"
        integrity="sha512-helwW+1jTcWdOarbAV4eDgcPQg/WEM20j9oo7HE5caJ8hZXdW0mgYGuxafhlf4j4gYAuOL8WsX1QTy6HUnpWKA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- load --}}
    <script src="{{ asset('public/backend/plugins/ladda/spin.min.js') }}"></script>
    <script src="{{ asset('public/backend/plugins/ladda/ladda.min.js') }}"></script>

    {{-- sweetalert2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="{{ asset('public/backend/js/mono.js') }}"></script>
    <script src="{{ asset('public/backend/js/chart.js') }}"></script>
    <script src="{{ asset('public/backend/js/map.js') }}"></script>
    @yield('js')
    <script src="{{ asset('public/backend/js/custom.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            $('.dropify').dropify();
            jQuery('input[name="dateRange"]').daterangepicker({
                autoUpdateInput: false,
                singleDatePicker: true,
                locale: {
                    cancelLabel: 'Clear'
                }
            });
            jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
                jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
            });
            jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
                jQuery(this).val('');
            });
        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        @if (Session::has('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                background: '#28A745',
            })
        @endif
        @if (Session::has('error'))
            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}',
                background: '#17A2B8',
            })
        @endif
        @foreach ($errors->all() as $error)
            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}',
                background: '#F8F9FA',
            })
        @endforeach
    </script>



</body>

</html>
