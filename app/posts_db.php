<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts_db extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
