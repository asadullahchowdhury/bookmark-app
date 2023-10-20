<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bookmark App</title>
    <!--Google font-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


</head>
<body>
<div id="app">
    <app></app>
</div>

<script>
    window.core = {
        @if(auth()->check())
        UserInfo: {!! auth()->user() !!},
        @else
        UserInfo: null
        @endif
    }
</script>
@vite('resources/js/front/app.js')
</body>
</html>

