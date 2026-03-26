<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'author',
        'stock',

    ];

    public function category(){
        return $this->belongsTo(Categories::class);
    }
}
