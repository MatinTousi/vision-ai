<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>داشبورد</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.rtl.min.css"
    integrity="sha384-CfCrinSRH2IR6a4e6fy2q6ioOX7O6Mtm1L9vRvFZ1trBncWmMePhzvafv7oIcWiW" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/image/favicon.png') }}">
    @include('sweetalert::alert')
</head>

<body>
    <header class="navbar  sticky-top  flex-md-nowrap p-0 shadow-sm">
        <!-- <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-5 text-white" href="{{ route('dashboard') }}">داشبورد</a> -->
         <a class="navbar-brand text-white ms-5" href="{{ route('dashboard') }}">
      <img src="{{asset('assets/image/blackicon.png')}}" alt="icon" width="140" height="60">
      
    </a>
       

        <button class="ms-2 nav-link px-3 text-white d-md-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#sidebarMenu">
            <i class="bi bi-justify-left fs-2"></i>
        </button>
    </header>

    <!-- بخش نمایش نام کاربر در سمت چپ هدر -->
<div class="user-profile-badge d-flex align-items-center gap-2">
    <i class="bi bi-person-circle text-info fs-5"></i>
    <span class="user-name">{{ auth()->user()->name }}</span>
</div>