<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model
{
    protected $appends = ['created_at_formatted' ];

    public function getCreatedAtFormattedAttribute(){
        if(isset($this->attributes['created_at'])){
            return date('F j, Y, g:i a', strtotime($this->attributes['created_at']));
        }else{
            return null;
        }
    }
}
