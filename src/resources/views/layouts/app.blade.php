<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/destyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
    <title>FashionablyLate</title>
</head>
<body>
    <header class="header">
        <div class="header__content">
            <h2 class="header__title">FashionablyLate</h2>
        @yield('header')
        </div>
    </header>

    <main class="content">
        @yield('content')
    </main>
    
</body>
</html>