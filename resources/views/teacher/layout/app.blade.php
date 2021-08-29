<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Quiz app uygulaması codenteq adı altında yazılmış bir online sınav uygulamasıdır.">
    <meta name="author" content="Ahmet Arşiv">
    <meta name="generator" content="Quiz App">
    @yield('meta')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="icon" href="{{asset('images/c-icon.png')}}" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    @yield('css')
</head>
<body>

<div class="d-flex" id="wrapper">
    <!-- Sidebar-->
    <div class="border-end d-flex d-sm-flex" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom fw-bold">
            <span style="font-family: MADE Tommy Soft; font-size: 38px;">Codente</span><span
                style="font-family: MADE Tommy Soft Outline; font-size: 38px;">q</span><br>
            <span style="font-weight: normal !important;"><small>v1.0.0-Beta</small></span>
            <div style="font-size: 1rem !important; width: 200px !important;"
                 class="list-group list-group-flush sidebar-menu">
                <a class="list-group-item list-group-item-action d-none d-md-block text-center {{ request()->is('teacher/appointment') ? 'active' : '' }}"
                   href="{{route('teacher.appointment.index')}}">
                    <i class="fa fa-calendar-check fa-2x"></i><br>
                    <span style="position: relative;">Randevularım</span>
                </a>
                <a class="list-group-item list-group-item-action text-center {{ request()->is('teacher/profile') ? 'active' : '' }}"
                   href="{{route('teacher.profile.index')}}">
                    <i class="fa fa-user-edit fa-2x"></i><br>
                    Profil
                </a>
            </div>
        </div>
    </div>
    <!-- Page content wrapper-->
    <div id="page-content-wrapper">
        <!-- Top navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom d-none d-md-block">
            <div class="container-fluid">
                <button class="btn btn-light" id="sidebarToggle"><span class="navbar-toggler-icon"></span></button>
                <button class="navbar-toggler d-none d-sm-block d-lg-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-none d-sm-block" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item active"><a
                                class="nav-link">Hoşgeldiniz, {{auth()->user()->name .' '. auth()->user()->surname}}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{imagePath(auth()->user()->info->photo)}}" class="rounded-circle" height="30" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('teacher.profile.index')}}">Profil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('logout-user')}}">Çıkış Yap</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        <nav
            class="navbar fixed-bottom navbar-light bg-light bottom-navigation d-flex flex-row d-md-none d-lg-none d-xl-none d-xxl-none fs-1">
            <a class="list-unstyled link-dark text-decoration-none" id="sidebarToggleM"><i class="fa fa-bars"></i></a>
            <a class="list-unstyled link-dark text-decoration-none" href="{{route('teacher.appointment.index')}}"><i
                    class="fas fa-calendar-check"></i></a>
            <a class="list-unstyled link-dark text-decoration-none" href="{{route('teacher.profile.index')}}"><i
                    class="fas fa-user-edit"></i></a>
            <a class="list-unstyled link-dark text-decoration-none" href="{{route('logout-user')}}"><i
                    class="fa fa-sign-out-alt"></i></a>
        </nav>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@yield('js')
</html>