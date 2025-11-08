<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <title>Larablog Filemanager</title>

    <!-- jQuery and jQuery UI (REQUIRED) -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.min.css">

    <!-- Ordem correta: jQuery primeiro, depois jQuery UI -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.min.js"></script>

    <!-- elFinder CSS (REQUIRED) -->
    <link rel="stylesheet" type="text/css" href="{{ asset($dir . '/css/elfinder.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset($dir . '/css/theme.css') }}">

    <!-- elFinder JS (REQUIRED) -->
    <script src="{{ asset($dir . '/js/elfinder.min.js') }}"></script>

    @if ($locale)
    <!-- elFinder translation (OPTIONAL) -->
    <script src="{{ asset($dir . "/js/i18n/elfinder.$locale.js") }}"></script>
    @endif

    <!-- elFinder initialization -->
    <script src="{{ asset('backend/dist/js/elfinder-init.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const elfinderElement = document.getElementById('elfinder');

            // Passa as variáveis PHP como atributos HTML, evitando erros de formatação
            elfinderElement.dataset.connectorUrl = "{{ route('elfinder.connector') }}";
            elfinderElement.dataset.soundsPath = "{{ asset($dir . '/sounds') }}";
            elfinderElement.dataset.locale = "{{ $locale ?? 'en' }}";
            elfinderElement.dataset.csrfToken = "{{ csrf_token() }}";

            // Inicializa o elFinder usando as variáveis lidas do HTML
            initElfinder(
                elfinderElement.dataset.connectorUrl,
                elfinderElement.dataset.soundsPath,
                elfinderElement.dataset.locale,
                elfinderElement.dataset.csrfToken
            );
        });
    </script>
</head>

<body>
    <!-- Elemento onde o elFinder será renderizado -->
    <div id="elfinder"></div>
</body>

</html>