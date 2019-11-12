<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- Styles CSSの読み込み-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/github_login.css') }}" rel="stylesheet">
    <!-- font-awesome使用ようリンク -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <!-- Scripts まだよくわからない部分-->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body>
<div class="main-center">
  <div class="login-wrap">
    <div class="login-title">BOOK REVIEW</div>
    <div class="login-catchphrase">
      キャッチフレーズキャッチフレーズキャッチフレーズ
    </div>
    <div class="login-box">
      <button class="login-btn" type="button" onclick="location.href='slack/login'">
        <p><i class="fab fa-github"></i>Login with GitHub</p>
      </button>
    </div>
    <div class="attention-box">
      <p>GitHubのアカウントお持ちでない方は<a class="button disabled" href="https://github.co.jp/">コチラ</a></p>
    </div>
  </div>
</div>
</body>
</html>