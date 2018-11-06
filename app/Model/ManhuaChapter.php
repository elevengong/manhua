<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ManhuaChapter extends Model
{
    protected $table = 'manhuachapters';
    protected $primaryKey = 'chapter_id';

    protected $fillable = ['views','updated_at'];
}
