<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookReviewController extends Controller
{
    protected $books;

    public function __construct(Book $book)
    {
        $this->books = $book;
    }
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
    public function bookReviewList(Request $request, $id)
    {

        $json = $request->all();
        $this->books->saveBook($json);
        $selectBook = $this->books->selectBook($json['ISBN']);
        return view('book.show', compact('selectBook'));
    }

    /**
     * mypage レビュー履歴
     */
    public function myBookReviewHistory()
    {
        return view('book.mypage');
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
