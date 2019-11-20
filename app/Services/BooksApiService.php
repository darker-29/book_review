<?php
namespace App\Services;

use GuzzleHttp\Client;

class BooksApiService
{
    public function search()
    {
        $baseUri = 'https://app.rakuten.co.jp/services/api/BooksTotal/Search/20130522/';
        $client = new Client(['base_uri' => $baseUri]);
        $path = '?format=json&hits=4&booksGenreId=000&applicationId=1019399324990976605';
        $response = $client->request('GET', $path);
        return json_decode($response->getBody()->getContents(), true);
    }
}
