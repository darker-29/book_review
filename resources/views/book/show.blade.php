@extends ('common.layout')
@section ('content')

<div class="wrap">
  <div class="container">
    <div class="side_left">
      <img  class="side_left_img" src="/image/BookReviewLogo2.png" alt="本の画像">
      <p class=side_left_title>あそびあそばせ</p>
      <p class=side_left_author>涼川りん</p>
      <p class=side_left_summary>あらすじ</p>
      <p class=side_left_summary_content>さまざまな遊びに興じる「遊び人研究会」で活動する3人の女子中学生たちの日常を描いたギャグ漫画。作品コンセプトは「美少女×お遊戯コメディ」。可愛らしい絵柄とそこからことごとく離れた顔芸やシュールギャグが特徴で、単行本発売後、Twitterの口コミで人気が沸騰し、緊急重版が決定するなど話題を呼んでいる。あらすじなどは特になく割とぶっ飛んでいる。控えめに言って最高!!</p>
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
            <button type="submit" class="more_book_btn">レビューを投稿する</button>
      </div>
    </div>
    <button type="submit" class="scrolltop_btn"><i class="far fa-arrow-alt-circle-up"></i></button>
  </div>
</div>
@endsection