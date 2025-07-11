<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
    use SoftDeletes;

    protected $table = 'projects';

    protected $fillable = ['title','details','photo','name','others']; 

    
}
