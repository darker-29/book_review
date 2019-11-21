<?php
namespace App\Services;

use GuzzleHttp\Client;

class BooksApiService
{
    const BASE_URL = 'https://app.rakuten.co.jp/services/api/BooksTotal/Search/20130522';

    public function indexShow($pageNumber)
    {
        $format = 'format=json';
        $hits = 'hits=4';
        $page = 'page='.$pageNumber;
        $booksGenreId = 'booksGenreId=001';
        $applicationId = 'applicationId=1019399324990976605';

        $client = new Client(['base_uri' => self::BASE_URL]);
        $response = $client->request('GET', '?'.$format.'&'.$hits.'&'.$applicationId.'&'.$page.'&'.$booksGenreId);
        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @return array
     */
    public function searchBooks($pageNumber, $word)
    {
        $format = 'format=json';
        $hits = 'hits=4';
        $page = 'page='.$pageNumber;
        $keyword = 'keyword='.$word;
        $booksGenreId = 'booksGenreId=001';
        $applicationId = 'applicationId=1019399324990976605';

        $client = new Client(['base_uri' => self::BASE_URL]);
        $response = $client->request('GET', '?'.$format.'&'.$hits.'&'.$applicationId.'&'.$page.'&'.$keyword.'&'.$booksGenreId);
        return json_decode($response->getBody()->getContents(), true);
    }
}
