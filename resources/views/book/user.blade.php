@extends ('common.layout')
@section ('content')

<div class="wrap">
  <div class="user">
    <div class="user_top">
      <img  class="user_top_back" src="/image/BookReviewAvatarBack2.png" alt="背景画像">
      <img  class="user_top_avatar" src="/image/LinuxLogo.png" alt="ユーザーアバター">
      <p class="user_top_avatar_name">Hanako<p>
    </div>

    <div class="user_down">
      <h2 class="user_down_header">レビュー一覧</h2>
      <div class="user_down_review">
        <div class="user_down_book">
          <img  class="user_down_img" src="/image/BookReviewLogo2.png" alt="本の画像">
        </div>
        <div class="user_down_content">
          <div class="user_down_content_top clearfix">
            <p class="user_down_title">あそびあそばせ</p>
            <p class="user_down_author">涼川りん</p>
          </div>
          <div class="user_down_content_bottom">
            <p class="user_down_evaluation">評価: ★★★★★ - 2019/11/15</p>
            <p class="user_down_summary_content">華子が３人ぐらいでできる人狼ゲームがないかなと、オリヴィアがあそ研で聞いたことがきっかけとなり、あそ研で心理ゲームを作り始めます。オリヴィアは「お兄ちゃんをつくろうゲーム」を作り始め...あとは察して...</p>
          </div>
        </div>
      </div>
    </div>
    <div class="more_book">
        <button type="submit" class="more_book_btn">もっと見る</button>
    </div>
    <button type="submit" class="scrolltop_btn"><i class="far fa-arrow-alt-circle-up"></i></button>
  </div>
</div>
@endsection