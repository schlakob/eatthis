<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipe';
    public $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['title', 'description', 'ingredients', 'created_user_id'];
}
