<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

</head>

<body>

    <h1> Hello World!</h1>

    @foreach($tasks as $task)
        <p>{{$task}}</p>
    @endforeach

    <p>My name {{$name}}</p>

</body>

</html>
