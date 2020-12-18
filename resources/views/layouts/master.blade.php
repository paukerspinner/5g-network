<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.8.55/css/materialdesignicons.min.css" integrity="sha512-x96qcyADhiw/CZY7QLOo7dB8i/REOEHZDhNfoDuJlyQ+yZzhdy91eAa4EkO7g3egt8obvLeJPoUKEKu5C5JYjA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/app.css')}}" />
    <title>5G Network</title>
    @yield('head')
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('layouts.topbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('layouts.sidebar')
            <!-- partial -->
            <div class="main-panel">
                @yield('content')
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

      @yield('script')

    <script src="{{ asset('js/app.js')}}"></script>
</body>
</html>