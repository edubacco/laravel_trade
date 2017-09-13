@extends('layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="x-panel">
                        <div class="x_title">
                            <h2>Brokers</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($brokers as $broker)
                                        <tr>
                                            <td>{{ $broker->id }}</td>
                                            <td>{{ $broker['name'] }}</td>
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