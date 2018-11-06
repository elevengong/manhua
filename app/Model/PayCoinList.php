<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PayCoinList extends Model
{
    protected $table = 'paycoinlist';
    protected $primaryKey = 'id';

    protected $fillable = ['id','uid','manhua_id','chapter_id','created_at','updated_at'];
}
