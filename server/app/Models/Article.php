<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'journal_reference',
        'posted_by',
        'text',
    ];
    
}
