<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Broker extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = ['id'];

    protected $visible = ['name'];

    public function prices()
    {
        return $this->hasMany('App\Model\Price');
    }
}