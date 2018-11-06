<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Manhua extends Model
{
    protected $table = 'manhua';
    protected $primaryKey = 'manhua_id';

    protected $fillable = ['views','updated_at'];
}
