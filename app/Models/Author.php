<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    protected $table = 'authors';
    public $timestamps = true;
    protected $fillable = array('name', 'nickname');

    public function books()
    {
        return $this->hasMany(Book::class);
    }

}
