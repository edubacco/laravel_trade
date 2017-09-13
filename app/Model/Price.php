<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $guarded = ['id', 'buy_price', 'sell_price', 'spot_price'];

    public function broker()
    {
        return $this->belongsTo('App\Model\Broker');
    }

    public function base_currency()
    {
        return $this->belongsTo('App\Model\Currency', 'base_currency', 'id');
    }

    public function quote_currency()
    {
        return $this->belongsTo('App\Model\Currency', 'quote_currency', 'id');
    }
}