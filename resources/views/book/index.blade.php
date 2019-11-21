@extends ('common.layout')
@section ('content')

  <h2 class="index-header-title index-header-title-list">書籍一覧</h2>
  <h2 class="index-header-title index-header-title-result hidden">検索結果</h2>
<div class="wrap">
      <div class="content">
        <ul class="lists">
          <!-- テンプレート挿入部分 -->
          @foreach($books['Items'] as $book)
            <li class="lists__item">
              <div class="list_item_inner">
                <img  class="book" src="{{ $book['Item']['largeImageUrl'] }}" alt="本の画像">
                <div class="list_item_info">
                  <div class="book_info">
                    <p class="lists__item__title clearfix">{{ $book['Item']['title'] }}</p>
                  </div>
                    <p class="lists__item__author">{{ $book['Item']['author'] }}</p>
                  <div class="eval">
                    <p class="lists__item__evaluation">平均評価:★★★★★</p>
                    <p class="lists__item__review">レビュー件数：10</p>
                  </div>
                </div>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
      <div class="more_book">
        <button type="submit" class="more_book_btn">もっと見る</button>
      </div>
    <button type="submit" class="scrolltop_btn"><i class="far fa-arrow-alt-circle-up"></i></button>
    </div>
@endsection