<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'books_id',
        'evaluation',
        'content',
        'ISBN',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function books()
    {
        return $this->belongsTo('App\Book');
    }

    public function users()
    {
        $this->belongsTo('App\User');
    }

    public function saveContent($BookContent)
    {
        return $this->create($BookContent);
    }
}
