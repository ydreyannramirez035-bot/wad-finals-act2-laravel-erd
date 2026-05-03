<!DOCTYPE html>
<html>
<head>
    <title>ERD App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="font-family: Arial; background: #f5f5f5; margin: 0;">

    @include('layouts.navigation')

    <!-- PAGE CONTENT -->
    <div style="padding: 20px;">
        @yield('content')
    </div>

</body>
</html>