<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title }}</title>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
        <link rel="icon" href="{{ config('app.env') === 'production' ? secure_url('img/favicon.ico') : url('img/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ config('app.env') === 'production' ? secure_url('img/apple-touch-icon-180x180.png') : url('img/apple-touch-icon-180x180.png') }}">
        <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css">
        <link rel="stylesheet" href="{{ config('app.env') === 'production' ? secure_url('css/style.css') : url('css/style.css') }}">
    </head>
    <body class="{{ $bodyClass }}">
        <main>
            {{ $slot }}
        </main>
    </body>
</html>
