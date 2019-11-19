<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewsRequest;
use App\Review;

class BookReviewController extends Controller
{
    protected $books;
    protected $reviews;

    public function __construct(Book $book, Review $reviews)
    {
        $this->books = $book;
        $this->reviews = $reviews;
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
        $selectBook = $this->books->saveBook($json);
        return view('book.show', compact('json', 'selectBook'));
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
    public function  bookReviewCreate(ReviewsRequest $request)
    {
        $BookContent = $request->all();
        $BookContent['user_id'] = Auth::id();
        $this->reviews->saveContent($BookContent);
        return redirect()->route('book.show', $BookContent['ISBN']);
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
