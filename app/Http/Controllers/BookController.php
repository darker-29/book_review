<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReviewsRequest;
use App\Models\Book;
use App\Http\Requests\SearchRequest;
use App\Models\Review;
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
    public function index(SearchRequest $request)
    {
        $searchKey = $request->all();
        $bookInfos = $this->booksApi->indexShow($searchKey);
        $bookInfo = $this->review->fetchEvaluations($bookInfos);
        $request->session()->flush();
        return view('book.index', compact('bookInfos', 'searchKey'));
    }

    /**
     * 検索ボタンを押下
     */
    public function firstSelectBook(SearchRequest $request)
    {
        $inputKey = $request->all();
        $data = $request->session()->all();
        $searchKey = $this->booksApi->wordComparison($inputKey, $data);
        $request->session()->put(['searchword' => $searchKey['searchWord'], 'pageNum' => $searchKey['page']]);
        $bookInfos = $this->booksApi->indexShow($searchKey);
        $request->flash();
        return view('book.index', compact('bookInfos', 'searchKey'));
    }

    /**
     * レビュー一覧(本に対して)
     */
    public function reviewList($isbn)
    {
        $selectBook = $this->booksApi->selectBookData($isbn);
        $reviews = $this->review->selectReviews($isbn);
        return view('book.show', compact('selectBook', 'reviews'));
    }

    /**
     * mypage レビュー履歴
     */
    public function mypage()
    {
        // $userId = Auth::id(); //Auth::idがとれなかったので
        //代用で１２を入れています
        $userId = 12;
        $myReviews = $this->review->selectMyRecords($userId);
        return view('book.mypage', compact('myReviews'));
    }

    /**
     * 編集するレコード取得
     */

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
        $bookContent = $request->all();
        $this->book->saveBook($bookContent['ISBN']);
        $bookContent['books_id'] = $this->book->getBookId($bookContent['ISBN']);
        // $bookContent['user_id'] = Auth::user();
        $bookContent['user_id'] = 12;
        $this->review->saveContent($bookContent);
        return redirect()->route('book.show', $bookContent['ISBN']);
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
