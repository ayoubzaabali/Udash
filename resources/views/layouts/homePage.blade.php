<!DOCTYPE html>
<html lang="en-US" class="no-js scheme_default">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
</head>
<body>
    <div id="main">
        @yield('main')
    </div>
</body>    
<script src="https://unpkg.com/vue@next"></script>
<script src="{{asset('js/home.js')}}"></script>
</html>