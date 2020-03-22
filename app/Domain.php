<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    protected $table = 'domains';
    protected $fillable = [
        'name',
        'content_length',
        'response_code',
        'body',
        'h1',
        'meta_keywords',
        'meta_description'
    ];
}
