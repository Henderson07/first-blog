<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('pageTitle')</title>
    <!-- CSS files -->
    <link rel="shortcut icon" href="{{ \App\Models\GeneralSettings::find(1)->blog_favicon }}" type="image/x-icon">
    <link href="/backend/dist/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="/backend/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="/backend/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="/backend/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link rel="stylesheet" href="/backend/dist/libs/ijaboCropTool/ijaboCropTool.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.14.0/dist/sweetalert2.min.css">

    <link rel="stylesheet"
        href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.min.css"
        integrity="sha384-hZWu4ng7BovWfKTxP8PqKj1vI5OIB7R5XxWObMxX4oEGC2b4nZ1H1vToz8vUv3Pj"
        crossorigin="anonymous">
    <link rel="stylesheet" href="/amsify/amsify.suggestags.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiMdYFZ6bFqKk2tKxGv0P3Fz7kIoy6hlPp8PjUJvQFu+g5q1ukGk0kN6aU1kZ4qf7G4fC7x4v0O0VqXG9ZyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- app css -->

    @stack('stylesheet')
    @livewireStyles
    <link href="/backend/dist/css/demo.min.css?1684106062" rel="stylesheet" />
</head>

<body>
    <div class="page">
        <!-- Navbar -->
        @include('backend.layouts.inc.header')
        <div class="page-wrapper">
            <!-- Page header -->
            @yield('pageHeader')
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    @yield('content')
                </div>
            </div>
            @include('backend.layouts.inc.footer')
        </div>
    </div>
    <!-- Libs JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.14.0/dist/sweetalert2.min.js"></script>
    <script src="/backend/dist/libs/apexcharts/dist/apexcharts.min.js?1684106062" defer></script>
    <script src="/backend/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062" defer></script>
    <script src="/backend/dist/libs/jsvectormap/dist/maps/world.js?1684106062" defer></script>
    <script src="/backend/dist/libs/jsvectormap/dist/maps/world-merc.js?1684106062" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/backend/dist/libs/ijaboCropTool/ijaboCropTool.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.min.js"
        integrity="sha384-2O2hFZmKZytEtV0Ir/4+5uVGOTmcOfmxFvCgPqskGqDG1G8xX2vG5Erd09C/xXEK"
        crossorigin="anonymous"></script>
    <script src="/amsify/jquery.amsify.suggestags.js"></script>
    <!-- Tabler Core -->
    <script src="/backend/dist/js/tabler.min.js?1684106062" defer></script>
    @stack('scripts')
    @livewireScripts

    <script>
        $('input[name="post_tags"]').amsifySuggestags();

        window.addEventListener('showToastr', function(event) {
            console.log('event', event);
            toast.remove();

            if (event.detail.type === 'info') {
                toast.info(event.detail.message);
            } else if (event.detail.message === 'success') {
                toast.success(event.detail.message);
            } else if (event.detail.message === 'error') {
                toast.error(event.detail.messaeg);
            } else if (event.detail.message === 'warning') {
                toast.warning(event.detail.message);
            } else {
                return false;
            }
        });
    </script>
    <script src="/backend/dist/js/demo.min.js?1684106062" defer></script>
</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const themeParam = urlParams.get('theme');

        const root = document.documentElement; // <-- importante: é o <html>, não o body

        if (themeParam === 'dark') {
            root.classList.remove('theme-light');
            root.classList.add('theme-dark');
            localStorage.setItem('theme', 'dark');
        } else if (themeParam === 'light') {
            root.classList.remove('theme-dark');
            root.classList.add('theme-light');
            localStorage.setItem('theme', 'light');
        } else {
            const saved = localStorage.getItem('theme');
            if (saved === 'dark') {
                root.classList.add('theme-dark');
            } else if (saved === 'light') {
                root.classList.add('theme-light');
            } else {
                if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    root.classList.add('theme-dark');
                }
            }
        }
    });
</script>