<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metas -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Hỗ trợ việc quản trị TNTT của các xứ đoàn">
    <meta name="keywords"
          content="tntt, thiếu nhi thánh thể, quản trị tntt, quản trị thiếu nhi thánh thể"/>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CC21DGLW9B"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-CC21DGLW9B');
    </script>

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo-tntt.png') }}">
    <title>
        Quản trị TNTT
    </title>
    <!-- Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet"/>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css') }}" rel="stylesheet"/>

    {{--jquery--}}
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>

    {{-- Combo Tree
    Documentation: https://www.jqueryscript.net/form/Drop-Down-Combo-Tree.html
    --}}
    <script src="{{ asset('js/ComboTree/comboTreePlugin.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/ComboTree/comboTreeStyle.css') }}">

    {{-- Sweet Alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @livewireStyles

    <style>
        .loading-overlay-master {
            display: none;
            background: rgba(255, 255, 255, 0.7);
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            top: 0;
            z-index: 9998;
            align-items: center;
            justify-content: center;
        }

        .loading-overlay-master.is-active {
            display: flex;
        }
    </style>

    <script>
        function loadingMasterPage() {
            $('#loading-master-page').toggleClass('is-active')
        }
    </script>

</head>
<div class="loading-overlay-master" id="loading-master-page">
    <span class="spinner-border" id="span-loading-master-page"></span>
</div>

<body class="g-sidenav-show bg-gray-100 ">
{{ $slot }}
</body>

<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    randomClassLoading();

    function randomClassLoading() {
        var spinner = document.getElementById('span-loading-master-page');
        var classColor = ['text-primary', 'text-secondary', 'text-success', 'text-danger', 'text-warning', 'text-info', 'text-success'];

        // Randomly select a class from the array
        var randomClassColor = classColor[Math.floor(Math.random() * classColor.length)];

        // Set the selected class to the spinner
        spinner.classList.add(randomClassColor);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('assets/js/soft-ui-dashboard.js') }}"></script>

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<!-- Alpine -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

@livewireScripts

</html>
