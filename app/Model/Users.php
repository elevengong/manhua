<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'uid';
    //public $timestamps = '';

    protected $fillable = ['uid','daili_id','user_name','pwd','login_ip','register_ip','last_login_time'];
}
