@extends ('common.layout')
@section ('content')
  <h2 class="index-header-title index-header-title-list">書籍一覧</h2>
  <h2 class="index-header-title index-header-title-result hidden">検索結果</h2>
<div class="wrap">
      <div class="content">
        <ul class="lists">
          <!-- テンプレート挿入部分 -->
          @foreach($bookInfos['Items'] as $bookInfo)
            <li class="lists__item">
              <div class="list_item_inner">
                {!! Form::open(['route' => ['book.show', 'isbn' => $bookInfo['Item']['isbn']], 'method' => 'GET']) !!}
                {!! Form::image($bookInfo['Item']['largeImageUrl'], 'img', ['alt' => '本の画像']) !!}
                {!! Form::hidden('isbn', $bookInfo['Item']['isbn']) !!}
                {!! Form::close() !!}
                <div class="list_item_info">
                  <div class="book_info">
                    <p class="lists__item__title clearfix">{{ $bookInfo['Item']['title'] }}</p>
                  </div>
                    <p class="lists__item__author">{{ $bookInfo['Item']['author'] }}</p>
                  <div class="eval">
                    @if (!empty($bookInfo['Item']['numberOfReviews']))
                      <p class="lists__item__evaluation">平均評価：
                        @if ($bookInfo['Item']['evaluationAverage'] >= 4.5)
                          {{ '★★★★★' }}
                        @elseif ($bookInfo['Item']['evaluationAverage'] >= 3.5)
                          {{ '★★★★' }}
                        @elseif ($bookInfo['Item']['evaluationAverage'] >= 2.5)
                          {{ '★★★' }}
                        @elseif ($bookInfo['Item']['evaluationAverage'] >= 1.5)
                          {{ '★★' }}
                        @else
                          {{ '★' }}
                        @endif
                      </p>
                      <p class="lists__item__review">レビュー件数：{{ $bookInfo['Item']['numberOfReviews'] }}</p>
                    @else
                      <p class="lists__item__evaluation">平均評価：  -  </p>
                      <p class="lists__item__review">レビュー件数：0</p>
                    @endif
                  </div>
                </div>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
      {!! Form::open(['route' => 'book.select', 'method' => 'GET']) !!}
        <div class="more_book">
          {!! Form::hidden('word', $searchKey['searchWord'] ?? '') !!}
          {!! Form::hidden('num', 1) !!}
          {!! Form::submit('もっと見る', ['class' => 'more_book_btn']) !!}
        </div>
        {!! form::button('<i class="far fa-arrow-alt-circle-up"></i>', ['class' => 'scrolltop_btn', 'type' => 'submit']) !!}
      {!! Form::close() !!}
    </div>
@endsection