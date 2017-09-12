<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Broker extends Model
{

    protected $table = 'broker';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function prices()
    {
        return $this->hasMany('App\Model\Price', 'price_id', 'id');
    }
}