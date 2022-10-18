<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- @vite(['resources/css/materialize.css', 'resources/js/materialize.js']) -->

</head>
<body>

    <h1>{{$titulo}}</h1>
    {{$slot}}
</body>
</html>