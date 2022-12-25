<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Launch</title>
    @include('layouts.inc.general.css-links')
</head>

<body class="wt-login">
<!-- Preloader Start -->
<div class="preloader-outer">
    <div class="loader"></div>
</div>
<!-- Preloader End -->
<!-- Wrapper Start -->
<div id="wt-wrapper" class="wt-wrapper wt-haslayout">
    <!-- Content Wrapper Start -->
    <div class="wt-contentwrapper">
        <!-- Header included -->
        @include('layouts.inc.user.navbar')
        <!-- Main Start -->
        <main id="wt-main" class="wt-main wt-haslayout">
            <!--Sidebar included-->
            @include('layouts.inc.user.sidebar')

            <!-- Main Content Start -->
            {{-- <div class="wt-content"> --}}
            @yield('content')
        </main>
    </div>
</div>
@include('layouts.inc.general.script-links')
</body>

</html>
