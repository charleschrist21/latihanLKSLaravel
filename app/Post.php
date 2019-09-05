<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table ='post';

    protected $fillable = ['id','title','category','location','photoBy','description','image'];
}
