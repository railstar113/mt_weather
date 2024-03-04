<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title }}</title>
        <meta name="description" content="{{ $description }}">
        <meta property="og:url" content="{{ config('app.env') === 'production' ? secure_url('/') : url('/') }}">
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ config('app.env') === 'production' ? secure_url('img/logo_ogp.jpg') : url('img/logo_ogp.jpg') }}">
        <meta property="og:site_name" content="{{ config('app.name') }}">
        <meta property="og:title" content="{{ $title }}">
        <meta property="og:description" content="{{ $description }}">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="{{ config('app.env') === 'production' ? secure_url('img/favicon.ico') : url('img/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ config('app.env') === 'production' ? secure_url('img/apple-touch-icon-180x180.png') : url('img/apple-touch-icon-180x180.png') }}">
        <link rel="icon" type="image/png" href="{{ config('app.env') === 'production' ? secure_url('img/android-chrome-256x256.png') : url('img/android-chrome-256x256.png') }}">
        <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css">
        <link rel="stylesheet" href="{{ config('app.env') === 'production' ? secure_url('css/style.css') : url('css/style.css') }}">
    </head>
    <body class="{{ $bodyClass }}">
        <main>
            {{ $slot }}
        </main>
    </body>
</html>
