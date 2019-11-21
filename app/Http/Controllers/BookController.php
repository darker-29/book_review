<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewsRequest;
use App\Book;
use App\Review;
use App\Services\BooksApiService;

class BookController extends Controller
{
    protected $book;
    protected $review;
    protected $booksApi;

    public function __construct(Book $book, Review $review, BooksApiService $booksApi)
    {
        $this->book = $book;
        $this->review = $review;
        $this->booksApi = $booksApi;
    }
    /**
     * 検索一覧ページ
     */
    public function index()
    {
        return view('book.index');
    }

    /**
     * searchボタン押下時アクション
     */
    public function searchBooks(Request $request)
    {
        $pageNumber = 1;
        $keyword = 'book';
        $books = $this->booksApi->search($pageNumber, $keyword);
        dd($books);
        return view('book.index', compact('books'));
    }

    /**
     * レビュー一覧(本に対して)
     */
    public function reviewList(Request $request, $id)
    {
        $json = $request->all();
        $selectBook = $this->book->saveBook($json);
        return view('book.show', compact('json', 'selectBook'));
    }

    /**
     * mypage レビュー履歴
     */
    public function mypage()
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
    public function  reviewCreate(ReviewsRequest $request)
    {
        $BookContent = $request->all();
        $BookContent['user_id'] = Auth::id();
        $this->review->saveContent($BookContent);
        return redirect()->route('book.show', $BookContent['ISBN']);
    }

    /**
     * レビューの編集
     */
    public function reviewEdit($id)
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
