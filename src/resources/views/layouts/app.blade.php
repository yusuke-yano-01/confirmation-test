<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FashionablyLate</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <div class="header-utilities">
        <a class="header__logo" href="/">
          FashionablyLate
        </a>
        <nav class="header-nav">
            @if (Auth::check())
              <a class="header-nav__link" href="/mypage">マイページ</a>
              <form class="form" action="/logout" method="post">
                @csrf
                <button class="header-nav__button">ログアウト</button>
              </form>
            @elseif (request()->path() === 'auth/login')
              <a class="header-nav__link" href="/contactform">お問い合わせ</a>
              <a class="header-nav__link" href="/auth/register">register</a>
            @elseif (request()->path() === 'auth/register')
              <a class="header-nav__link" href="/contactform">お問い合わせ</a>
              <a class="header-nav__link" href="/auth/login">login</a>
            @else
              <a class="header-nav__link" href="/auth/login">管理画面</a>
            @endif
        </nav>
      </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>
</body>

</html>