<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class UserFeedback extends Model
{
    use CrudTrait;
    //
    protected $table="user_feedback";
    protected $fillable=['name','profession','image','message'];
}
