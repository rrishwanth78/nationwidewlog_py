<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dashboard">
    <meta name="author" content="Nationwide Log">
    <!-- Title -->
    <title>Nationwide Log</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('assets/')}}/images/logo/favicon.png">
    <!-- Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/')}}/css/bootstrap.min.css">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('assets/')}}/icon-fontawesome/css/all.css">
    <link rel="stylesheet" href="{{asset('assets/')}}/icon-bootstrap/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('assets/')}}/icon-boxicons/css/boxicons.css">
    <link rel="stylesheet" href="{{asset('assets/')}}/icon-remixicon/fonts/remixicon.css">
    <!-- Plugin -->
    <link rel="stylesheet" href="{{asset('assets/')}}/vendor/metismenu-master/metisMenu.min.css">
    <link rel="stylesheet" href="{{ asset('assets/') }}/vendor/date-picker/daterangepicker.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/')}}/css/style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
</head>
<body>
<!-- ========= Preloader ========= -->
<div id="preloader">
<div class="loader-wrap">
    <ul class="loader">
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
</div>
<!-- ========= Sidebar ========= -->
<aside>
    <div class="logo-wrapper">
        <a href="{{route('admin.dashboard')}}">
            <img src="{{asset('assets/images/logo/logo-small.png')}}" class="img-fluid logo-small" alt="logo">

        </a>
    </div>
    <ul id="metismenu">
        <li>
            <shape1 class="shape1"></shape1>
            <shape2 class="shape2"></shape2>
            <a href="{{route('admin.dashboard')}}" class="menu-link">
                <i class="ri-home-5-line"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
            <shape1 class="shape1"></shape1>
            <shape2 class="shape2"></shape2>
            <a href="{{route('admin.patient')}}" class="menu-link">
                <i class="ri-user-line"></i>
                <span>Patient(s)</span>
            </a>
        </li>
        <li>
            <shape1 class="shape1"></shape1>
            <shape2 class="shape2"></shape2>
            <a href="{{route('admin.work.status')}}" class="menu-link">
                <i class="ri-briefcase-4-line"></i>
                <span>Work Status</span>
            </a>
        </li>
        <li>
            <shape1 class="shape1"></shape1>
            <shape2 class="shape2"></shape2>
            <a href="{{route('admin.pending.list')}}" class="menu-link">
                <i class="ri-file-list-3-line"></i>
                <span>Pending List</span>
            </a>
        </li>
        <li>
            <shape1 class="shape1"></shape1>
            <shape2 class="shape2"></shape2>
            <a href="{{route('admin.eremittance')}}" class="menu-link">
                <i class="ri-wallet-line"></i>
                <span>E-Remittance</span>
            </a>
        </li>
        <li>
            <shape1 class="shape1"></shape1>
            <shape2 class="shape2"></shape2>
            <a href="{{route('admin.medical.records')}}" class="menu-link">
                <i class="ri-file-chart-line"></i>
                <span>Medical Records</span>
            </a>
        </li>
        <li>
            <shape1 class="shape1"></shape1>
            <shape2 class="shape2"></shape2>
            <a href="#" class="has-arrow menu-link">
                <i class="ri-settings-5-line"></i>
                <span>Settings</span>
            </a>
            <ul class="submenu">
                <li>
                    <a href="{{route('admin.setting.practice')}}">
                        <i class="ri-dossier-line"></i>
                        <span>Practices</span>
                    </a>
                </li>
                <li>
                    <a href="setting-user.html">
                        <i class="ri-user-follow-line"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.denial.reason')}}">
                        <i class="ri-file-damage-line"></i>
                        <span>Denial Reasons</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.setting.pending.reason')}}">
                        <i class="ri-sort-asc"></i>
                        <span>Pending Reasons</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.setting.provider')}}">
                        <i class="ri-user-add-line"></i>
                        <span>Providers</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.setting.insurance')}}">
                        <i class="ri-shield-star-line"></i>
                        <span>Insurances</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
<!-- ========= Wrapper ========= -->
<main>
    <header>
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div class="align-self-center">
                    <img src="{{asset('assets/images/logo/logo.png')}}" class="img-fluid" alt="">
                </div>
                @yield('practice')
                <div class="align-self-center">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <button class="btn p-0 text-dark-blue" type="button"><i
                                    class='bx bx-upload'></i></button>
                        </li>
                        <li class="list-inline-item">
                            <button class="btn p-0 text-dark-blue" type="button" id="fullscreen"><i
                                    class='bx bx-fullscreen'></i></button>
                        </li>
                        <li class="list-inline-item">
                            <div class="dropstart header-user">
                                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <img src="{{asset('assets/images/user.jpg')}}"  class="img-fluid rounded-circle" alt="user">
                                    <div class="align-self-center ms-2">
                                        <h3>Admin</h3>
                                        <span>admin@admin.com</span>
                                    </div>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class='bx bx-user'></i>Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class='bx bxs-edit'></i>Edit
                                            Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item text-danger" href="sign.html"><i
                                                class='bx bx-power-off'></i>Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- ========= Main ========= -->
    @yield('admin')
    <!-- ========= Footer ========= -->
    <footer>
        <div class="container-fluid">
            <p class="m-0">
                <script>
                    document.write(new Date().getFullYear())
                </script> &copy; Nationwide Log
            </p>
        </div>
    </footer>
</main>
<!-- ========= Js Files ========= -->
<!-- Jquery Js -->
<script src="{{asset('assets/')}}/js/jquery-1.12.4.js"></script>
<!-- Popper Js -->
<script src="{{asset('assets/')}}/js/popper.min.js"></script>
<!-- Bootstrap Js -->
<script src="{{asset('assets/')}}/js/bootstrap.min.js"></script>
<!-- Sidebar & header -->

<!-- Plugin -->
<script src="{{asset('assets/')}}/vendor/metismenu-master/metisMenu.min.js"></script>
<!-- Custom Js -->
<script src="{{ asset('assets/') }}/vendor/date-picker/moment.min.js"></script>
<script src="{{ asset('assets/') }}/vendor/date-picker/daterangepicker.js"></script>
<script src="{{ asset('assets/') }}/js/report_export/libs/jsPDF/jspdf.umd.min.js"></script>
<script src="{{ asset('assets/') }}/js/report_export/libs/FileSaver/FileSaver.min.js"></script>
<script src="{{ asset('assets/') }}/js/report_export/libs/js-xlsx/xlsx.core.min.js"></script>
<script src="{{ asset('assets/') }}/js/report_export/tableExport.js"></script>
<script src="{{asset('assets/')}}/js/custom.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script> --}}


@yield('js')

</body>
</html>
