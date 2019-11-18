<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = 'ISBN';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'ISBN',
        'title',
        'image',
        'author',
        'summary',
    ];

    public function saveBook($json)
    {
        $getRecord = $this->where('ISBN', $json['ISBN'])->first();
        if ($getRecord === null) {
            return $this->create($json);
        }
    }

    public function selectBook($isbn)
    {
        return $this->where('ISBN', $isbn)->first();
    }
}