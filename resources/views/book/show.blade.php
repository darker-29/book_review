@extends ('common.layout')
@section ('content')
<div class="wrap">
  <div class="container">
    <div class="side_left">
      <img  class="side_left_img" src="{{ $selectBook['image'] }}" alt="本の画像">
      <p class=side_left_title>{{ $selectBook['title']}}</p>
      <p class=side_left_author>{{ $selectBook['author']}}</p>
      <p class=side_left_summary>あらすじ</p>
      <p class=side_left_summary_content>{{ $selectBook['summary'] ?? '-' }}</p>
    </div>
    <div class="side_right">
      <h2 class="side_right_header">レビュー一覧</h2>
      <div class="side_right_review">
        <div class="side_right_user">
          <img  class="side_right_avatar" src="/image/GitHubLogo.png" alt="ユーザーアバター">
          <p class="side_right_avatar_name">オリヴィア<p>
        </div>
        <div class="side_right_content">
          <p class="side_right_evaluation">評価: ★★★★★ - 2019/11/13</p>
          <p class="side_right_impressions">まず登場人物と声優さんがすごくいいの！魅力的で個性（闇）があったり、そのキャラクターの演技がまたすごい！特に華子役の人は大変だったと思います！けど、1つ声優さん関係で文句が言うのであれば時々何言ってるかわからないときがあるのでそこが少しだけ残念でした。ただ、中盤以降少し中だるみする話数もありますが声優さんの演技と勢いでつい笑ってしまいます！サブキャラも個性的で魅力的なキャラクターが多くて、最後まで飽きずに見られました。ギャグアニメなので好みが分かれる作品だと思いますが、リアクション芸とか好きな人はよりハマるんじゃないかなと思います。 ps.華子マジファッションセンスwww</p>
          <button type="submit" class="good_btn"><i class="fas fa-thumbs-up"></i></button>
          <div class="good_btn_count">✖️ ５</div>
        </div>
      </div>
      <div class="more_book">
            <button type="submit" class="more_book_btn new-review js-modal-open" data-target="modal04">レビューを投稿する</button>
      </div>
    </div>
    <button type="submit" class="scrolltop_btn"><i class="far fa-arrow-alt-circle-up"></i></button>
    <!-- 編集modal表示非表示 -->
    <div id="modal04" class="modal js-modal modal-create">
        <div class="modal-edit-content">
          <form>
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
            <textarea class="modal-create-down">ここにレビューを記入してください。</textarea>
            </div>
            <div class="modal-edit-book">
              <button type="submit" class="modal-create-book-btn">投稿する</button>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>
@endsection