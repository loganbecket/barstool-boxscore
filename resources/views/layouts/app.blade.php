<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">

    <script src="{{ mix('js/app.js') }}" defer></script>
    
    <title>Barstool Boxscore Challenge</title>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
</body>
</html>