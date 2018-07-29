<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title','cover','description','genre','country','releaseDate','runTime','download_url','baidu_netdisk','is_banner','is_valid','recommend',
    ];
}
