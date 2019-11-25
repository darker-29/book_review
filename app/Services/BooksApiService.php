<?php
namespace App\Services;

use GuzzleHttp\Client;

class BooksApiService
{

    protected $uri;
    protected $client;
    protected $applicationId;
    protected $booksGenreId;
    protected $page;

    const  RAKUTEN_FORMAT = 'format=json';
    const RAKUTEN_PAGE = 'page=1';
    const RAKUTEN_HITS = 'hits=4';

    public function __construct()
    {
        $this->uri = config('services.rakuten.url');
        $this->client = new Client(['base_uri' => $this->uri ]);
        $this->applicationId = config('services.rakuten.applicationId');
        $this->booksGenreId = config('services.rakuten.booksGenreId');
        $this->page = config('services.rakuten.page');
    }

    /**
     * sessionの値を比較
     */
    public function wordComparison($inputKey, $data)
    {
        if (empty($inputKey['num'])) {
            // dd('gorira');
            return array(
                'searchWord' => $inputKey['word'],
                'page' => 1,
            );
        } elseif ($data['searchword'] === $inputKey['word']) {
            // dd('test');
            return array(
                'searchWord' => $inputKey['word'],
                'page' => $data['pageNum']+1,
            );
        } else {
            dd(1234);
            return array(
                'searchWord' => $inputKey['word'],
                'page' => 1,
            );
        }
    }

    /**
     * 一覧ページで最初に表示される書籍
     */
    public function indexShow($searchKey)
    {
        if (empty($searchKey )) {
            $searchKey['searchWord'] = 'HTML';
            $searchKey['page'] = 1;
        }
        $format = self::RAKUTEN_FORMAT;
        $title = 'title='.$searchKey['searchWord'];
        $hits = self::RAKUTEN_HITS;
        $applicationId = 'applicationId='.$this->applicationId;
        $page = 'page='.$searchKey['page'];
        $booksGenreId = 'booksGenreId='.$this->booksGenreId;

        $response = $this->client->request('GET', '?'.$format.'&'.$title.'&'.$hits.'&'.$applicationId.'&'.$page.'&'.$booksGenreId);
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * 検索ボタンを押下で１ページのみ取得
     */
    // public function firstSelectPage($searchWord)
    // {
    //     $format = self::RAKUTEN_FORMAT;
    //     $title = 'title='.$searchWord;
    //     $hits = self::RAKUTEN_HITS;
    //     $applicationId = 'applicationId='.$this->applicationId;
    //     $page = self::RAKUTEN_PAGE;
    //     $booksGenreId = 'booksGenreId='.$this->booksGenreId;

    //     $response = $this->client->request('GET', '?'.$format.'&'.$title.'&'.$hits.'&'.$applicationId.'&'.$page.'&'.$booksGenreId);
    //     return json_decode($response->getBody()->getContents(), true);
    // }

    /**
     * もっと見るボタンで書籍データ取得
     */
    // public function searchBooks($pageNumber, $word)
    // {
    //     $format = self::RAKUTEN_FORMAT;
    //     $keyword = 'keyword='.$word;
    //     $booksGenreId = 'booksGenreId='.$this->booksGenreId;
    //     $hits = self::RAKUTEN_HITS;
    //     $page = 'page='.$pageNumber;
    //     $applicationId = 'applicationId='.$this->applicationId;

    //     $response = $this->client->request('GET', '?'.$format.'&'.$keyword.'&'.$booksGenreId.'&'.$hits.'&'.$page.'&'.$applicationId);
    //     return json_decode($response->getBody()->getContents(), true);
    // }

    /**
     * 内部API　選択された書籍情報取得
     */
    public function selectBookData($isbn)
    {
        $format = self::RAKUTEN_FORMAT;
        $isbn = 'isbn='.$isbn;
        $applicationId = 'applicationId='.$this->applicationId;

        $res = $this->client->request('GET', '?'.$format.'&'.$isbn.'&'.$applicationId);
        $json = json_decode($res->getBody(), true);
        return array(
            "title" => $json['Items'][0]['Item']['title'],
            "author" => $json['Items'][0]['Item']['author'],
            "isbn" => $json['Items'][0]['Item']['isbn'],
            "largeImageUrl" => $json['Items'][0]['Item']['largeImageUrl'],
            "itemCaption" => $json['Items'][0]['Item']['itemCaption'],
        );
    }
}
