<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{

    protected $table = 'price';
    public $timestamps = true;
    protected $fillable = array('currency1', 'currency2', 'buy_price', 'price_time');
    protected $visible = array('currency1', 'currency2', 'buy_price', 'price_time');

    public function broker()
    {
        return $this->belongsTo('App\Model\Broker', 'price_id', 'id');
    }
}