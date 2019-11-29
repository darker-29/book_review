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
            // 検索ボタン押下
            return array(
                'searchWord' => urlencode($inputKey['word']),
                'page' => 1,
            );
        } elseif ($data['searchword'] === $inputKey['word']) {
            // もっと見るボタン押下
            return array(
                'searchWord' => urlencode($inputKey['word']),
                'page' => $data['pageNum']+1,
            );
        } else {
            // 例外処理;
            return array(
                'searchWord' => urlencode($inputKey['word']),
                'page' => 1,
            );
        }
    }

    /**
     * 書籍情報取得
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
     * 選択された書籍情報のみ取得
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
