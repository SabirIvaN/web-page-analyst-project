<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domains extends Model
{
    protected $table = 'domains';
    protected $fillable = [
        'name',
        'updated_at',
        'created_at',
        'content_length',
        'response_code',
        'body',
        'h1',
        'meta_keywords',
        'meta_description'
    ];
}
