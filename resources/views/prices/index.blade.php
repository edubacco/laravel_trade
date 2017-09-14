@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="x-panel">
                        <div class="x_title">
                            <h2>Prices</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Buy</th>
                                    <th>Sell</th>
                                    <th>Spot</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($prices as $price)
                                    <tr>
                                        <td>{{ $price->price_time }}</td>
                                        <td>{{ $price->buy_price }}</td>
                                        <td>{{ $price->sell_price }}</td>
                                        <td>{{ $price->spot_price }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection