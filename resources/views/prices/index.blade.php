@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">


            <script>
                var valute = ['Bitcoin'];
                var data_bitcoin = {!!  $bitcoin_graph !!};
                var data_altri = {!! $altri_graph !!};

                var lineChartData = {
                    labels: valute,
                    datasets: [{
                        label: 'Bitcoin',
                        backgroundColor: "rgba(220,220,220,0.5)",
                        data: data_bitcoin
                    }
/*                    , {
                        label: 'Other',
                        backgroundColor: "rgba(151,187,205,0.5)",
                        data: data_altri
                    }*/
                    ]
                };

                window.onload = function() {
                    var ctx = document.getElementById("prices_chart").getContext("2d");
                    window.myBar = new Chart(ctx, {
                        type: 'scatter',
                        data: lineChartData,
                        options: {
                            scales: {
                                xAxes: [{
                                    ticks: {
                                        callback: function(label, index, labels) {
                                            date = new Date(label*1000);
                                            dateString = date.toDateString();
                                            return dateString;
                                        }
                                    }
                                }]
                            },
                            responsive: true,
                            title: {
                                display: false
                            }
                        }
                    });

                };
            </script>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="dashboard_graph">
                            <div class="row x_title">
                                <div class="col_md_6"><h3>Prices history</h3></div>
                                <div class="col_md_6"></div>
                            </div>
                            <div class="col-xs-12">
                                <canvas id="prices_chart" height="170" width="600"></canvas>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <br/>




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