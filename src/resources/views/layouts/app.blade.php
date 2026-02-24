<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- 共通CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css')}}">
    <!-- ページごとのCSS -->
    @yield('css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa:wght@400;700&display=swap" rel="stylesheet">

</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/products">mogitate</a>   
        </div>
    </header>
    
    <main>
        @yield('content')
    </main>
</body>
</html>