<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'ISBN',
        'title',
        'image',
        'author',
        'summary',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
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