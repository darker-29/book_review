@extends ('common.layout')
@section ('content')

<h2 class="index-header">書籍一覧or検索結果</h2>
<div class="wrap">
      <div class="content">
        <ul class="lists">
           <!-- テンプレート挿入部分 -->
           <li class="lists__item">
              <div class="list_item_inner">
                <img  class="book" src="/image/BookReviewLogo.png" alt="本の画像">
                <div class="list_item_info">
                  <div class="book_info">
                    <p class="lists__item__title clearfix">あそびあそばせ</p>
                  </div>
                    <p class="lists__item__author">涼川りん</p>
                  <div class="eval">
                    <p class="lists__item__evaluation">平均評価:★★★★★</p>
                    <p class="lists__item__review">レビュー件数：10</p>
                  </div>
                </div>
              </div>
            </li>

      </div>
      <div class="more_book">
        <button type="submit" class="more_book_btn">もっと見る</button>
    </div>
    </div>
@endsection