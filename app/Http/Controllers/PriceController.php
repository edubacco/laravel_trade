<?php 

namespace App\Http\Controllers;

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
    return view('price.index', ['prices' => Price::all()]);
  }
  
}