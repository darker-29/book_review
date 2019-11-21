<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'greenhorn_works') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="normalize.css"> -->

    <!-- font-awesome使用ようリンク -->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<!-- 共通のheader部分 -->
<body>
<div class="header">
    <div class="header-center">
        <h1 class="header-title">BOOK REVIEW</h1>
            {!! Form::open(['route' => 'book.search', 'class' => 'search__text', 'method' => 'POST']) !!}
                <input type="text" name="searchWord" id="js-search-word" class="search__text__input" placeholder="書籍名、著者、出版社">
                <button type="submit" class="search-icon"><i class="fab fa-searchengin"></i></button>
            {!! Form::close() !!}
        <div class="menu-box">
            <button type="submit" class="menu-icon"><i class="fas fa-ellipsis-h"></i></button>
        </div>
    </div>
    <!-- メニュー一覧表示 -->
    <div class="menu-index hidden">
        <a class="menu-btn menu-btn-user js-modal-open modal-show" href="" data-target="modal01"><i class="fas fa-users"></i>　ユーザー一覧</a>
        <a class="menu-btn menu-btn-mypage" href="{{ route('book.mypage') }}"><i class="fas fa-user"></i>　 マイページ</a>
        <a class="menu-btn menu-btn-logout" href=""><i class="fas fa-sign-out-alt"></i>　 ログアウト</a>
    </div>
    <!-- ユーザー一覧modal -->
    <div id="modal01" class="modal js-modal">
        <div class="modal-content">
            <div class="modal-top">
                <h2 class="modal-top-title">ユーザー一覧</h2>
                <button type="button" class="modal-close js-modal-close">×</button>
            </div>
            <div class="modal-down">
                <div class="modal-down-user">
                    <a class="" href="">
                        <img class="modal-down-avatar" src="/image/GitHubLogo.png" alt="ユーザーアバター">
                    </a>
                    <p class="modal-down-avatar-name">オリヴィア<p>
                </div>
                <div class="modal-down-user">
                    <a class="" href="">
                        <img class="modal-down-avatar" src="/image/DockerLogo.png" alt="ユーザーアバター">
                    </a>
                    <p class="modal-down-avatar-name">かすみ<p>
                </div>
                <div class="modal-down-user">
                    <a class="" href="">
                        <img class="modal-down-avatar" src="/image/LinuxLogo.png" alt="ユーザーアバター">
                    </a>
                    <p class="modal-down-avatar-name">華子<p>
                </div>
                <div class="modal-down-user">
                    <a class="" href="">
                        <img class="modal-down-avatar" src="/image/konanLogo.png" alt="ユーザーアバター">
                    </a>
                    <p class="modal-down-avatar-name">先生<p>
                </div>
                <div class="modal-down-user">
                    <a class="" href="">
                        <img class="modal-down-avatar" src="/image/MaedaLogo.png" alt="ユーザーアバター">
                    </a>
                    <p class="modal-down-avatar-name">前田<p>
                </div>
            </div>
        </div>
    </div>
</div>

@yield('content')

<div class="footer">
    <div class="footer-content">
        <p class="quote">”君の意見は、完全に間違っているという点に目を瞑れば、概ね正解だ。”　ー西尾維新</p>
        <p class="letter">20191112/giz@bookReview</p>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>$(function() {
        // -----------------mypageの編集削除ボタンの表示非表示--------------------------
        $('.mypage_down_review_menu').on('click',function() {
            $('.mypage_down_review_menu').addClass('hidden');
            $('.mypage_down_review_menu-content').removeClass('hidden');
        });
        // ------------------------------------------------------------------------
        // ------------------menuクリックでmenu link表示非表示------------------------
        $('.menu-icon').on('click',function() {
            $('.menu-index').removeClass('hidden');
        });
        $('.menu-btn').on('click',function() {
            $('.menu-index').addClass('hidden');
        });
        // ------------------------------------------------------------------------
        // ---------------------------複数modalの書き方--------------------------------
        $('.js-modal-open').each(function(){
            $(this).on('click',function(){
                var target = $(this).data('target');
                var modal = document.getElementById(target);
                $(modal).fadeIn();
                return false;
            });
        });
        $('.js-modal-close').on('click',function(){
            $('.js-modal').fadeOut();
            return false;
        }); 
        // ------------------------------------------------------------------------
        // -----------------------トップスクロールボタン処理---------------------------
        $('.scrolltop_btn').click(function () {
            $('body,  html').animate({
                scrollTop: 0
            }, 500);
            return false;
        });
        // ------------------------------------------------------------------------
    });

</script>

</body>
</html>
