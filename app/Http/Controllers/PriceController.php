<?php 

namespace App\Http\Controllers;

use App\Jobs\ReadPrice;
use App\Model\Price;

class PriceController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    return view('prices.index', ['prices' => Price::all()]);
  }

  public function test() {
      $check = new ReadPrice();
      $check->handle();
  }
}