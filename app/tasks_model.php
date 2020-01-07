<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class tasks_model extends Model
{

    
		/**
     * The users that belong to the user.
     */ 
    public function user_tasks()
    {
        return $this->belongsToMany('App\User','addtsks','task_id','user_id');
    }
}
