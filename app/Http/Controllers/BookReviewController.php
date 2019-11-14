<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookReviewController extends Controller
{
    /**
     * 検索一覧ページ
     */
    public function index()
    {
        return view('book.index');
    }

    /**
     * レビュー一覧(本に対して)
     */
    public function bookReviewList(Request $request, $isbn)
    {
        $json = $request->all();
        return view('book.show', compact('json'));
    }

    /**
     * mypage レビュー履歴
     */
    public function myBookReviewHistory()
    {
        //
    }

    /**
     * user一覧
     */
    public function userList($id)
    {
        //
    }

    /**
     * レビュー作成
     */
    public function  bookReviewCreate(Request $request)
    {
        //
    }

    /**
     * レビューの編集
     */
    public function bookReviewEdit($id)
    {
        //
    }

    /**
     * レビューの削除
     */
    public function destroy($id)
    {
        //
    }
}
