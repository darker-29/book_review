<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'ISBN',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function saveBook($isbn)
    {
        return $this->firstOrCreate(['ISBN' => $isbn]);
    }

    public function getBookId($isbn)
    {
        $selectBook = $this->where('ISBN', $isbn)->first();
        return $selectBook['id'];
    }
}