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

    public function saveBook($json)
    {
        return $this->firstOrCreate(['ISBN' => $json['ISBN']]);
    }
}