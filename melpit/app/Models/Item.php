<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * 
     * 可変項目
     */

    protected $fillable = [
        'name',
        'imgpash',
        'detail',
        'stock',
        'price'
    ];
}
