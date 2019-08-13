<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    public $timestamps = false;
    protected $fillable = ['userID', 'planid', 'activeUntil'];

}
