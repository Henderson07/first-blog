<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <title>Larablog Filemanager</title>

    <!-- jQuery and jQuery UI (REQUIRED) -->
    <link rel="stylesheet"
        href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.min.css"
        integrity="sha384-hZWu4ng7BovWfKTxP8PqKj1vI5OIB7R5XxWObMxX4oEGC2b4nZ1H1vToz8vUv3Pj"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.min.js"
        integrity="sha384-2O2hFZmKZytEtV0Ir/4+5uVGOTmcOfmxFvCgPqskGqDG1G8xX2vG5Erd09C/xXEK"
        crossorigin="anonymous"></script>

    <!-- elFinder CSS (REQUIRED) -->
    <link rel="stylesheet" type="text/css" href="{{ asset($dir . '/css/elfinder.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset($dir . '/css/theme.css') }}">

    <!-- elFinder JS (REQUIRED) -->
    <script src="{{ asset($dir . '/js/elfinder.min.js') }}"></script>

    @if ($locale)
    <!-- elFinder translation (OPTIONAL) -->
    <script src="{{ asset($dir . "/js/i18n/elfinder.$locale.js") }}"></script>
    @endif

    <!-- elFinder initialization (REQUIRED) -->
    <script type="text/javascript" charset="utf-8">
        // Helper function to get parameters from the query string.
        function getUrlParam(paramName) {
            var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i');
            var match = window.location.search.match(reParam);

            return (match && match.length > 1) ? match[1] : '';
        }

        $().ready(function() {
            var funcNum = getUrlParam('CKEditorFuncNum');

            var elf = $('#elfinder').elfinder({
                // set your elFinder options here
                @if($locale)
                lang: '{{ $locale }}', // locale
                @endif
                customData: {
                    _token: '{{ csrf_token() }}'
                },
                url: '{{ route('
                elfinder.connector ') }}', // connector URL
                soundPath: '{{ asset($dir . ' / sounds ') }}',
                getFileCallback: function(file) {
                    window.opener.CKEDITOR.tools.callFunction(funcNum, file.url);
                    window.close();
                }
            }).elfinder('instance');
        });
    </script>
</head>

<body>

    <!-- Element where elFinder will be created (REQUIRED) -->
    <div id="elfinder"></div>

</body>

</html>