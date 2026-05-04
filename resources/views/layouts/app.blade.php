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
        @if(session('success'))
        <div style="
            background: #22c55e;
            color: white;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        ">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="
            background: #ef4444;
            color: white;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        ">
            <ul style="margin: 0;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        @yield('content')
    </div>

</body>
</html>