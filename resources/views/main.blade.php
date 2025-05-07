<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
  <title>
    Material Dashboard 3 by Creative Tim
  </title>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <!-- Nucleo Icons -->
  <link href="{{asset('template/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('template/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('template/css/material-dashboard.css')}}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
  @include('sidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    @yield('content')
  </main>
  <script src="{{asset('template/js/core/popper.min.js')}}"></script>
  <script src="{{asset('template/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('template/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('template/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{asset('template/js/plugins/chartjs.min.js')}}"></script>