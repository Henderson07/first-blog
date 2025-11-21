<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>@yield('pageTitle')</title>

  <!-- CSS -->
  <base href="/">
  <link rel="shortcut icon" href="{{ \App\Models\GeneralSettings::find(1)->blog_favicon }}" type="image/x-icon">

  <link href="/backend/dist/css/tabler.min.css" rel="stylesheet" />
  <link href="/backend/dist/css/tabler-flags.min.css" rel="stylesheet" />
  <link href="/backend/dist/css/tabler-payments.min.css" rel="stylesheet" />
  <link href="/backend/dist/css/tabler-vendors.min.css" rel="stylesheet" />
  <link href="/backend/dist/css/demo.min.css" rel="stylesheet" />

  @stack('stylesheet')
  @livewireStyles
</head>

<body class="d-flex flex-column">

  @yield('content')

  <!-- JS -->
  <script src="/backend/dist/js/tabler.min.js"></script>
  <script src="/backend/dist/js/demo.min.js"></script>

  @stack('scripts')

  <!-- OBRIGATORIAMENTE O ÚLTIMO -->
  @livewireScripts

</body>

</html>