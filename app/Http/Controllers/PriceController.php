<?php

namespace App\Http\Controllers;

use App\Jobs\ReadPrice;
use App\Model\Price;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PriceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $bitcoin_q = Price::all()
            ->where('base_currency', '=', 'BTC')
//            ->orderBy("price_time")
            ->toArray();
        $bitcoin_x = array_column($bitcoin_q, 'price_time');
        $bitcoin_y = array_column($bitcoin_q, 'spot_price');
        foreach ($bitcoin_x as $k => $v) {
            $obj = [];
            $obj['x'] = strtotime($v);
            $obj['y'] = $bitcoin_y[$k];
            $bitcoin[] = $obj;
        }


        $altri = Price::all()
            ->where('base_currency', '=', 'oth')
//            ->orderBy("price_time")
            ->toArray();
        $altri = array_column($bitcoin, 'spot_price');

        return view('prices.index')
            ->with('prices', Price::all())
            ->with('bitcoin_graph', json_encode($bitcoin))
            ->with('altri_graph', json_encode($altri));
    }

}