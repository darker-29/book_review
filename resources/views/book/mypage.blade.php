@extends ('common.layout')
@section ('content')

<div class="wrap">
  <div class="mypage">
    <div class="mypage_top">
      <img  class="mypage_top_back" src="/image/BookReviewAvatarBack.png" alt="背景画像">
      <img  class="mypage_top_avatar" src="/image/GitHubLogo.png" alt="ユーザーアバター">
      <p class="mypage_top_avatar_name">オリヴィア<p>
    </div>
    <div class="mypage_down">
      <h2 class="mypage_down_header">レビュー履歴</h2>
      <div class="mypage_down_review">
        <!-- <div class="">ここから編集と削除ボタン作成 -->
        <div class="mypage_down_review_menu"><i class="fas fa-ellipsis-h"></i></div>
        <div class="mypage_down_book">
          <img  class="mypage_downt_img" src="/image/BookReviewLogo2.png" alt="本の画像">
        </div>
        <div class="mypage_down_content">
          <div class="mypage_down_content_top clearfix">
            <p class=mypage_down_title>あそびあそばせ</p>
            <p class=mypage_down_author>涼川りん</p>
          </div>
          <div class="mypage_down_content_bottom">
            <p class="mypage_down_evaluation">評価: ★★★★★ - 2019/11/13</p>
            <p class="mypage_down_summary_content">まず登場人物と声優さんがすごくいいの！魅力的で個性（闇）があったり、そのキャラクターの演技がまたすごい！特に華子役の人は大変だったと思います！けど、1つ声優さん関係で文句が言うのであれば時々何言ってるかわからないときがあるのでそこが少しだけ残念でした。ただ、中盤以降少し中だるみする話数もありますが声優さんの演技と勢いでつい笑ってしまいます！サブキャラも個性的で魅力的なキャラクターが多くて、最後まで飽きずに見られました。ギャグアニメなので好みが分かれる作品だと思いますが、リアクション芸とか好きな人はよりハマるんじゃないかなと思います。 ps.華子マジファッションセンスwww</p>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="scrolltop_btn"><i class="far fa-arrow-alt-circle-up"></i></button>
  </div>
</div>
@endsection