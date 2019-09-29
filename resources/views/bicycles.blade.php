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

<ul>
    @foreach($bikes as $bike)
        <li>{{"This bike is an $bike->name, colored $bike->color and it costs $bike->price."}}</li>
    @endforeach
</ul>

</body>

</html>
