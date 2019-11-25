@extends ('common.layout')
@section ('content')
<div class="wrap">
  <div class="container">
    <div class="side_left">
      <img  class="side_left_img" src="{{ $selectBook['largeImageUrl'] }}" alt="本の画像">
      <p class=side_left_title>{{ $selectBook['title']}}</p>
      <p class=side_left_author>{{ $selectBook['author']}}</p>
      <p class=side_left_summary>あらすじ</p>
      <p class=side_left_summary_content>{{ $selectBook['itemCaption'] ?? '-' }}</p>
    </div>
    <div class="side_right">
      <h2 class="side_right_header">レビュー一覧</h2>
      @foreach ($reviews as $review)
      <div class="side_right_review">
        <div class="side_right_user">
          <img  class="side_right_avatar" src="/image/GitHubLogo.png" alt="ユーザーアバター">
          <p class="side_right_avatar_name"><p>
        </div>
        <div class="side_right_content">
          <p class="side_right_evaluation">評価:
            @if ($review->evaluation >= 4.5)
              {{ '★★★★★ -' }}
            @elseif ($review->evaluation >= 3.5)
              {{ '★★★★ -' }}
            @elseif ($review->evaluation >= 2.5)
              {{ '★★★ -' }}
            @elseif ($review->evaluation >= 1.5)
              {{ '★★ -' }}
            @else
              {{ '★ -' }}
            @endif
            {{$review->updated_at->format('Y/m/d')}}
            </p>
          <p class="side_right_impressions">{{ $review->content }}</p>
          <button type="submit" class="good_btn"><i class="fas fa-thumbs-up"></i></button>
          <div class="good_btn_count">✖️ ５</div>
        </div>
      </div>
      @endforeach
      <div class="more_book">
            <button type="submit" class="more_book_btn new-review js-modal-open" data-target="modal04">レビューを投稿する</button>
      </div>
    </div>
    <button type="submit" class="scrolltop_btn"><i class="far fa-arrow-alt-circle-up"></i></button>
    <!-- 編集modal表示非表示 -->
    <div id="modal04" class="modal js-modal modal-create">
        <div class="modal-edit-content">
          <!-- <form> -->
            {!! Form::open(['route' => ['book.create']]) !!}
            <div class="modal-top clearfix">
              <div class="evaluation">
                <input id="star1" type="radio" name="evaluation" value="5" />
                <label for="star1">★</label>
                <input id="star2" type="radio" name="evaluation" value="4" />
                <label for="star2">★</label>
                <input id="star3" type="radio" name="evaluation" value="3" />
                <label for="star3">★</label>
                <input id="star4" type="radio" name="evaluation" value="2" />
                <label for="star4">★</label>
                <input id="star5" type="radio" name="evaluation" value="1" />
                <label for="star5">★</label>
                <p class="modal-edit-top-title">評価 : </p>
              </div>
              <button type="button" class="modal-close-create js-modal-close">×</button>
            </div>
            <div class="modal-down-create">
                <p class="modal-down-create-title">内容 :</p>
            <!-- <textarea class="modal-create-down">ここにレビューを記入してください。</textarea> -->
            {!! Form::textarea('content', null, ['class' => 'modal-create-down', 'placeholder' => 'ここにレビューを記入してください。']) !!}
            {!! Form::hidden('ISBN', $selectBook['isbn']) !!}
            </div>
            <div class="modal-edit-book">
              <button type="submit" class="modal-create-book-btn">投稿する</button>
            </div>
          <!-- </form> -->
          {!! Form::close() !!}
        </div>
    </div>
  </div>
</div>
@endsection