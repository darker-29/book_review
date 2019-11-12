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
    <h1 class="header-title">BOOK REVIEW</h1>
    {!! Form::open(['route' => 'book.index', 'method' => 'GET']) !!}
        <div class="search-box">
            <div class="search__text">
                <input type="text" id="js-search-word" class="search__text__input" placeholder="書籍名、著者、出版社">
            </div>
            <button type="submit" class="search-icon"><i class="fab fa-searchengin"></i></button>
        </div>
    {!! Form::close() !!}
    <div class="menu-box">
        <button type="submit" class="menu-icon"><i class="fas fa-ellipsis-h"></i></button>
    </div>
</div>

@yield('content')

<div class="footer">
    <div class="footer-content">
        <p class="quote">”君の意見は、完全に間違っているという点に目を瞑れば、概ね正解だ。”　ー西尾維新</p>
        <p class="letter">20191112/giz@bookReview</p>
    </div>
</div>

<!-- Scripts API叩く処理 Jquery10そのまま入れただけ -->
<script src="../../common/js/jquery.js"></script>
<script>
     $(function() {

        $('.lists').css('text-align','center');

        // -------------検索ボタンを押した時の処理-----------
        $('.search__btn').on('click',function() {
        search();       //search__btn押した時の処理　他でsearch()関数定義する
        });

        // ------------search関数定義-------------
        var pageNum = 0;             //pageNumが初期0とする
        var prevSearchWord = ''; 　　//前回の検索ワードを空の文字列とする。

        var search = function() {
        pageNum = pageNum + 1;    //pageNumは１ページ増えるよ
        var searchWord = $('#js-search-word').val(); 　//検索テキストに入力された値(value)を取得し変数に代入

        if(searchWord !== prevSearchWord) {
            pageNum = 1 ; 　　      　　　　 //新しい検索ワードなのでページを１にする
            $('.lists').empty();      　　 //前回と検索ワード違うので前のリストをからにする
            prevSearchWord = searchWord;  //最後に前回検索ワードをサーチワードにする　次回に使用するため
        }

        console.log(searchWord); 　　//入力された検索ワードをconsoleに表示

        // -----------------ajaxリクエスト、データ取得----------------
        $.ajax({
            url: 'https://app.rakuten.co.jp/services/api/BooksTotal/Search/20130522',
            type: 'GET',
            datatype: 'json',
            data: {
            // 「区分:サービス固有パラメーター」で必要な情報をdata内に入れる。
            applicationId: '1019399324990976605',
            booksGenreId: '001', //楽天ブックスのジャンルを特定するIDのこと
            hits: '20',          //検索ヒット数指定
            keyword: searchWord, //検索ワード送る
            page: pageNum,
            },
        })

        // --------------data通信成功時の処理--------------
        .done(function(data) {
            console.log(data);
            success(data); 　　　　//data通信成功時の処理　他でsuccess関数定義　引数dataを渡す
        })

        // --------------data通信失敗時の処理--------------
        .fail(function(error) {
            failMessage(error); 　//data通信に失敗した時の処理　他でfailMwssage関数定義する
        })

        }//var search = functionの終わり


        //--------------------関数の処理の定義-----------------------------

        // ------------failMwssage関数定義----------
        var failMessage = function(error){
        
        console.log(error);
        
        switch(error.status){
            case 0:
            $('.lists').html('データ通信が失敗しました。<br>通信環境を整えて再度通信してください');
            break;
            case 400:
            $('.lists').html('検索キーワードを入力し検索して下さい。');
            break;
            case 404:
                $('.lists').html('データが取得できませんでした。<br>通信環境を整えて再度通信してください');
            break;
            case 429:
                $('.lists').html('検索が大量にリクエストされました<br>時間を開けて再度検索をしてください');
            break;
            case 500:
                $('.lists').html('システムエラーです。長時間続くようであれば<br>公式ページを参照してください');
            break;
            case 503:
                $('.lists').html('メンテナンス中の恐れがあります<br>時間をあけて再度お試しください');
            break;
            default:
            $('.lists').html('例外なエラーが発生しています');
            break;
            }
        }

        // ------------zeroMwssage関数定義----------
        var zeroMessage = function() {
        $('.lists').html('検索結果が見つかりませんでした。<br>別のキーワードで検索して下さい。');
        }

        // --------------success関数定義------------
        var success = function(data) {
        var template = '';
        
        if(data.count > 0) { //検索取得件数が0より大きい、１件でもあれば
            data.Items.forEach(function(val) { //dataの大まかなdata,Itemsの一つ一つのデータvalが繰り返し以下の処理を繰り返すよ
            console.log(val);

            template += '<li class = "lists__item">'
            + '<div class="lists__item__inner”>'
            + '<a href="' + val.Item.itemUrl + '"class="lists__item__link" target="_blank">'
            + '<img src="' + val.Item.largeImageUrl + '" class="lists__item__img" alt="' + val.Item.title + '">'
            + '<p class="lists__item__detail">作品名：　' + val.Item.title + '</p>'
            + '<p class="lists__item__detail">作者　：　' + val.Item.author + '</p>'
            + '<p class="lists__item__detail">出版社：　' + val.Item.publisherName + '</p>'
            + '</a>'
            + '</div>'
            + '</li>';
            
            })
            $('.lists').prepend(template); 　// listsの前にtemplateを追加を変数に定義
        }else if(data.count === 0) {       // data.countが0件だった時
            zeroMessage();
        }
        };


        });
</script>
</body>
</html>