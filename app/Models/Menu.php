<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //可以被批量赋值
    protected $fillable = ['title','pid','icon','href','target','order'];


}
