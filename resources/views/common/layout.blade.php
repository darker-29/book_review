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
        <div class="search-box">
            <div class="search__text">
                <input type="text" id="js-search-word" class="search__text__input" placeholder="書籍名、著者、出版社">
            </div>
            <button type="submit" class="search-icon"><i class="fab fa-searchengin"></i></button>
        </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>$(function() {
        var pageNum = 0;//最初にpageを空にする
        var word = "";//2回目に検索する'#js-search-word'の値が同じか、新しい検索かを比較するための変数
        $('.search-icon').on('click',function() {
            // ------------------indexのtitle表示非表示-------------------------
            $('.index-header-title-list').addClass('hidden');
            $('.index-header-title-result').removeClass('hidden');
            // ---------------------------------------------------------------
            var searchword = $('#js-search-word').val();
            if(word !== searchword) {　//一回目または新しい検索ワードを検索した時はwordが空か一致しないのでこの条件式は成立する
            $('.lists').empty();//中身を空にする
            word = searchword;//wordに検索した値を代入する
            pageNum = 1;//0から1にpageを追加する
            } else {
            pageNum++;//条件式が成立しない時は前回と今回の検索ワードが一致していることになるので1ページ追加する
            }
        search_rakuten(searchword);
        });

        function search_rakuten(search) {
        $.ajax({
            url: 'https://app.rakuten.co.jp/services/api/BooksTotal/Search/20130522',
            type: 'GET',
            datatype: 'json',
                data: {
                applicationId: '1019399324990976605', // (今回はこのIDを使用してください)
                booksGenreId: '001',
                keyword:　search,
                page: pageNum,
                hits: '4'
                }
        }).done(function(data) {
                primaryDone(data);
                console.log(data);
            }).fail(function(err) {
                primaryErr(err);
                console.log(err);
            });
        }

        //doneの処理
        function primaryDone(data) {
            if(data.count === 0) {
                $('.comment-message').empty();
                $('.lists').prepend('<div class="comment-message" style="text-align:center">検索結果が見つかりません</div>');
            }
            console.log(data);//data オブジェクト
            var listsItem = "";
            $.each(data.Items, function(index, book) {　//bookは配列(data.Items)の中の各オブジェクト
                console.log(data.Items);//data.Items 配列
                console.log(book);
              listsItem += "<li class='lists__item'>" + //代入演算子　listsItemにeachでループすることに<li>を１つずつ格納していく
                            "<div class='list_item_inner'>" +
                                "<img  class='book' src='"+ book.Item.largeImageUrl + "' alt='" + book.Item.title + "'>" +
                                "<div class='list_item_info'>" +
                                "<div class='book_info'>" +
                                    "<p class='lists__item__title clearfix'>"+ book.Item.title +"</p>" +
                                "</div>" +
                                    "<p class='lists__item__author'>" + book.Item.author +"</p>" +
                                "<div class='eval'>" +
                                    "<p class='lists__item__evaluation'>平均評価:★★★★★</p>" +
                                    "<p class='lists__item__review'>レビュー件数：10</p>"
                                "</div>"
                                "</div>"
                            "</div>"
                            "</li>"
            });
            $('.lists').prepend(listsItem);
        }
        //errの処理
        function primaryErr(err) {
            if(!err.responseJSON) {
                var erro_text = 'ネットに接続されてません。'
            }else{
            if(err.responseJSON.error_description === 'keyword must be set') { //errの配列の中のresponseJSONのオブジェクトの中のerror_descriptionとerror_descriptionがどこに入っているのかを細かく書く。
                var erro_text = 'キーワードを設定してください。'
            } else if(err.responseJSON.error_description === 'keyword length must be over 2 characters') {
                var erro_text = '検索キーワードは2文字以上にする必要があります。'
            }else if(err.responseJSON.error_description === 'number of allowed requests has been exceeded for this API. please try again soon.'){
                var erro_text = '連打はやめてください。'
            }else {
                var erro_text = '検索結果が見つかりませんでした。<br>別のキーワードで検索してください。'
            }
            }
            $('.lists').html('<div claas="coment" ><p class="massage" style="text-align:center">'　+　erro_text　+　'</p></div>'); //　erro_textをulタグの中に入れて表示する
        }

        // -----------------mypageの編集削除ボタンの表示非表示--------------------------
        $('.mypage_down_review_menu').on('click',function() {
            $('.mypage_down_review_menu').addClass('hidden');
            $('.mypage_down_review_menu-content').removeClass('hidden');
          });
        // ------------------------------------------------------------------------
    });

</script>

</body>
</html>