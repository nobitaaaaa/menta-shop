<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Nice extends Model
{
    public function item()
    {
        return $this->belongsTo('App\Models\item');
    }
}
