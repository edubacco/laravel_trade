<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';

    public $timestamps = false;

    protected $guarded = ['id'];
    protected $visible = ['id', 'name', 'min_size'];

    public function base_currencies() {
        return $this->hasMany('App\Model\Price', 'base_currency', 'id');
    }
    public function quote_currencies() {
        return $this->hasMany('App\Model\Price', 'quote_currency', 'id');
    }
}
