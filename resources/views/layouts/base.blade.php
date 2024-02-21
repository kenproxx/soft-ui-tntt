<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metas -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Hỗ trợ việc quản trị TNTT của các xứ đoàn">
    <meta name="keywords"
          content="tntt, thiếu nhi thánh thể, quản trị tntt, quản trị thiếu nhi thánh thể, quan tri tntt, thieu nhi thanh the, quan tri thieu nhi thanh the"/>

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
    <link rel="icon" type="image/png"
          href="https://cdn.jsdelivr.net/gh/kenproxx/soft-ui-tntt@master/public/assets/img/logo-tntt.png">
    <title>
        Quản trị TNTT
    </title>
    <!-- Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <!-- Nucleo Icons -->
    <link href="https://cdn.jsdelivr.net/gh/kenproxx/soft-ui-tntt@master/public/assets/css/nucleo-icons.css"
          rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/gh/kenproxx/soft-ui-tntt@master/public/assets/css/nucleo-svg.css"
          rel="stylesheet"/>
    <!-- CSS Files -->
    <link href="https://cdn.statically.io/gh/kenproxx/soft-ui-tntt/b1091567/public/assets/css/soft-ui-dashboard.css"
          rel="stylesheet"/>

    {{-- Custom CSS --}}
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"/>

    {{-- Bootstrap 5 --}}

    {{--jquery--}}
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>

    {{-- Combo Tree
    Documentation: https://www.jqueryscript.net/form/Drop-Down-Combo-Tree.html
    --}}
    <script
        src="https://cdn.jsdelivr.net/gh/kenproxx/soft-ui-tntt@master/public/js/ComboTree/comboTreePlugin.js"></script>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/gh/kenproxx/soft-ui-tntt@master/public/js/ComboTree/comboTreeStyle.css">

    {{-- Sweet Alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @livewireStyles

    <script>
        function loadingMasterPage() {
            $('#loading-master-page').toggleClass('is-active')
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Call loadingMasterPage again after the page has fully loaded after 3 seconds
            setTimeout(function () {
                loadingMasterPage();
            }, 1000);
        });
    </script>

</head>
<div class="loading-overlay-master" id="loading-master-page">
    <span class="spinner-border" id="span-loading-master-page"></span>
</div>

<body class="g-sidenav-show bg-gray-100 " onload="loadingMasterPage()">
{{ $slot }}
</body>

<!--   Core JS Files   -->
<script src="https://cdn.jsdelivr.net/gh/kenproxx/soft-ui-tntt@master/public/assets/js/core/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/kenproxx/soft-ui-tntt@master/public/assets/js/core/bootstrap.min.js"></script>
<script
    src="https://cdn.jsdelivr.net/gh/kenproxx/soft-ui-tntt@master/public/assets/js/plugins/smooth-scrollbar.min.js"></script>

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
<script src="https://cdn.jsdelivr.net/gh/kenproxx/soft-ui-tntt@master/public/assets/js/soft-ui-dashboard.js"></script>

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<!-- Alpine -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<script>
    // find all button
    const buttons = document.querySelectorAll('button');

    // find all a with type button
    const aButtons = document.querySelectorAll('a.btn');

    let arrayClassButton = ['bg-gradient-primary', 'bg-gradient-secondary', 'bg-gradient-success', 'bg-gradient-danger', 'bg-gradient-warning', 'bg-gradient-info', 'bg-gradient-dark', 'bg-gradient-light', 'bg-gradient-white',];

    // loop through each button and randomly assign a class
    buttons.forEach(button => {
        let randomClass = arrayClassButton[Math.floor(Math.random() * arrayClassButton.length)];
        button.classList.add(randomClass);
    });

    // loop through each a with type button and randomly assign a class
    aButtons.forEach(aButton => {
        let randomClass = arrayClassButton[Math.floor(Math.random() * arrayClassButton.length)];
        aButton.classList.add(randomClass);
    });
</script>

@livewireScripts

</html>
