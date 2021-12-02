<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table    = 'books';
    public $timestamps  = true;
    protected $fillable = array('serial', 'name', 'type');

    const TYPE_SELECT = [
        'science_fiction'   => 'Science Fiction',
        'crime'             => 'Crime',
        'action'            => 'Action',
        'biography'         => 'Biography',
        'true_story'        => 'True Story',
        'human_development' => 'Human Development',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

}
