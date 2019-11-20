<?php
namespace App\Services;

use GuzzleHttp\Client;

class BooksApiService
{
    const BASE_URL = 'https://app.rakuten.co.jp/services/api/BooksTotal/Search/20130522';

    /**
     * @return array
     */
    public function search($pageNumber, $word)
    {
        $format = 'format=json';
        $hits = 'hits=4';
        $page = 'page='.$pageNumber;
        $keyword = 'keyword='.$word;
        $applicationId = 'applicationId=1019399324990976605';

        $client = new Client(['base_uri' => self::BASE_URL]);
        $response = $client->request('GET', '?'.$format.'&'.$hits.'&'.$applicationId.'&'.$page.'&'.$keyword);
        return json_decode($response->getBody()->getContents(), true);
    }
}
