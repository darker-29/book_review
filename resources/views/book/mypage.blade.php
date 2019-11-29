@extends ('common.layout')
@section ('content')

<div class="wrap">
  <div class="mypage">
    <div class="mypage_top">
      <img  class="mypage_top_back" src="/image/BookReviewAvatarBack.png" alt="背景画像">
      <img  class="mypage_top_avatar" src="/image/GitHubLogo.png" alt="ユーザーアバター">
      <p class="mypage_top_avatar_name">{{$myReviews->first()->user->name}}<p>
    </div>
    <div class="mypage_down">
      <h2 class="mypage_down_header">レビュー履歴</h2>
      @foreach ($myReviews as $myReview)
      <div class="mypage_down_review">
        <div class="mypage_down_review_menu"><i class="fas fa-ellipsis-h"></i></div>
        <div class="mypage_down_review_menu-content hidden">
          <button type="submit" class="mypage_down_review_menu_edit js-modal-open" data-target="modal02">編集</button>
          <button type="submit" class="mypage_down_review_menu_delete js-modal-open" data-target="modal03">削除</button>
        </div>
        <div class="mypage_down_book">
          <img  class="mypage_down_img" src="/image/BookReviewLogo2.png" alt="本の画像">
        </div>
        <div class="mypage_down_content">
          <div class="mypage_down_content_top clearfix">
            <p class=mypage_down_title>あそびあそばせ</p>
            <p class=mypage_down_author>涼川りん</p>
          </div>
          <div class="mypage_down_content_bottom">
            <p class="mypage_down_evaluation">評価:
            @if ($myReview->evaluation >= 4.5)
              {{ '★★★★★ -' }}
            @elseif ($myReview->evaluation >= 3.5)
              {{ '★★★★ -' }}
            @elseif ($myReview->evaluation >= 2.5)
              {{ '★★★ -' }}
            @elseif ($myReview->evaluation >= 1.5)
              {{ '★★ -' }}
            @else
              {{ '★ -' }}
            @endif
            {{$myReview->updated_at->format('Y/m/d')}}
            </p>
            <p class="mypage_down_summary_content">{{ $myReview->content }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <button type="submit" class="scrolltop_btn"><i class="far fa-arrow-alt-circle-up"></i></button>
    <!-- 編集modal表示非表示 -->
    <div id="modal02" class="modal js-modal modal-edit">
        <div class="modal-edit-content">
          <div class="modal-top clearfix">
                <div class="evaluation">
                  <input id="star1" type="radio" name="star" value="5" />
                  <label for="star1">★</label>
                  <input id="star2" type="radio" name="star" value="4" />
                  <label for="star2">★</label>
                  <input id="star3" type="radio" name="star" value="3" />
                  <label for="star3">★</label>
                  <input id="star4" type="radio" name="star" value="2" />
                  <label for="star4">★</label>
                  <input id="star5" type="radio" name="star" value="1" />
                  <label for="star5">★</label>
                  <p class="modal-edit-top-title">評価 : </p>
                </div>
                <button type="button" class="modal-close-create js-modal-close">×</button>
          </div>
          <div class="modal-down-create">
              <p class="modal-down-create-title">内容 :</p>
          <textarea class="modal-edit-down">まず登場人物と声優さんがすごくいいの！魅力的で個性（闇）があったり、そのキャラクターの演技がまたすごい！特に華子役の人は大変だったと思います！けど、1つ声優さん関係で文句が言うのであれば時々何言ってるかわからないときがあるのでそこが少しだけ残念でした。ただ、中盤以降少し中だるみする話数もありますが声優さんの演技と勢いでつい笑ってしまいます！サブキャラも個性的で魅力的なキャラクターが多くて、最後まで飽きずに見られました。ギャグアニメなので好みが分かれる作品だと思いますが、リアクション芸とか好きな人はよりハマるんじゃないかなと思います。 ps.華子マジファッションセンスwww</textarea>
          </div>
          <div class="modal-edit-book">
            <button type="submit" class="modal-edit-book-btn">更新する</button>
          </div>
        </div>
    </div>
    <!-- 削除modal表示非表示 -->
    <div id="modal03" class="modal js-modal modal-delete">
        <div class="modal-delete-content">
          <button type="button" class="modal-close-delete js-modal-close">×</button>
          <div class="modal-delete-main">
              <p class="modal-delete-title">レビューを削除しますか?</p>
              <div class="modal-delete-select-btn">
                <button type="submit" class="modal-delete-btn">削除する</button>
                <button type="submit" class="modal-back-btn">戻る</button>
              </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection