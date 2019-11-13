@extends ('common.layout')
@section ('content')

<h2 class="brand-header">書籍一覧or検索結果</h2>
<div class="wrap">
      <div class="container">
        <ul class="lists">
           <!-- テンプレート挿入部分 -->
           <li class="lists__item">
              <div class="list_item_inner">
                <img  class="book" src="/image/BookReviewLogo.png" alt="本の画像">
                <div class="list_item_info">
                  <p class="lists__item__title">あそびあそばせ</p>
                  <p class="lists__item__author">涼川りん</p>
                  <p class="lists__item__evaluation">平均評価</p>
                  <p class="lists__item__review">レビュー件数</p>
                </div>
              </div>
            </li>
           <li class="lists__item">
              <div class="list_item_inner">
                <img  class="book" src="/image/BookReviewLogo2.png" alt="本の画像">
                <div class="list_item_info">
                  <p class="lists__item__title">あそびあそばせ</p>
                  <p class="lists__item__author">涼川りん</p>
                  <p class="lists__item__evaluation">平均評価</p>
                  <p class="lists__item__review">レビュー件数</p>
                </div>
              </div>
            </li>
          <!-- テンプレート挿入部分 -->
        </ul>
      </div>
    </div>
@endsection