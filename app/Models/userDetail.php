<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userDetail extends Model
{
    use HasFactory;

    protected $primaryKey = "user_details_id";

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}
