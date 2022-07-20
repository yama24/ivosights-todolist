<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
    <div class="paper container container-xs margin-bottom-large border border-1 margin-top-large">
        <h4>{{ $title }}</h4>
        <p>{{ $body }}</p>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
