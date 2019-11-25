<?php

namespace App\Models;

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
        'deleted_at',
    ];

    public function books()
    {
        return $this->belongsTo('App\Book');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function saveContent($BookContent)
    {
        return $this->create($BookContent);
    }

    public function fetchEvaluations($books)
    {
        foreach ($books['Items'] as &$book) {
            $reviews = $this->where('ISBN', $book['Item']['isbn'])->get();
            if($reviews->count()) {
                $numberOfReviews = $reviews->count();
                $evaluationAverage = $reviews->sum('evaluation')/$numberOfReviews;
                $book['Item']['numberOfReviews'] = $numberOfReviews;
                $book['Item']['evaluationAverage'] = $evaluationAverage;
            }
        }
        unset($book);
        return $books;
    }

    public function selectReviews($isbn)
    {
        return $this->where('ISBN', $isbn)->orderBy('updated_at', 'desc')->get();
    }
}
