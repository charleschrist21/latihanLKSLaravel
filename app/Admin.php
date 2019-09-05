<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
   protected $table = "admin";

    protected $fillable = ['id','fullName','username','email','addBy','image','password'];
}
