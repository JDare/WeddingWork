@extends('layouts.dashboard')

@section('content')

<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="page-header">
        <h1 class="page-title">
            Dashboard
        </h1>
    </div>
    <div class="row row-cards">
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                        <i class="fe fe-users"></i>
                    </div>
                    <div class="h1 m-0">{{ $analytics['parties'] }}</div>
                    <div class="text-muted mb-4">Parties</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                        <i class="fe fe-user"></i>
                    </div>
                    <div class="h1 m-0">{{ $analytics['guests'] }}</div>
                    <div class="text-muted mb-4">Guests</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="text-right text-red">
                        <i class="fe fe-mail"></i>
                    </div>
                    <div class="h1 m-0">{{ $analytics['without_email'] }}</div>
                    <div class="text-muted mb-4">Parties without Emails</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                        <i class="fe fe-user-check"></i>
                    </div>
                    <div class="h1 m-0">{{ $analytics['invites_sent'] }}</div>
                    <div class="text-muted mb-4">Invites Sent</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                        <i class="fe fe-check"></i>
                    </div>
                    <div class="h1 m-0">{{ $analytics['rsvp_yes'] }}</div>
                    <div class="text-muted mb-4">RSVP Yes (total guests)</div>
                </div>
            </div>
        </div>


        <div class="col-6 col-sm-4 col-lg-2">
            <div class="card">
                <div class="card-body p-3 text-center">
                    <div class="text-right text-green">
                        <i class="fe fe-message-circle"></i>
                    </div>
                    <div class="h1 m-0">{{ $analytics['num_comments'] }}</div>
                    <div class="text-muted mb-4">Comments</div>
                </div>
            </div>
        </div>
    </div>

        <div class="row row-cards">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">RSVP Responses</h3>
                    </div>
                    <div class="card-body">
                        <div id="chart-employment" style="height: 16rem"></div>
                    </div>
                </div>
                <script>
                    require(['c3', 'jquery'], function(c3, $) {
                        $(document).ready(function(){
                            var chart = c3.generate({
                                bindto: '#chart-employment', // id of chart wrapper
                                data: {
                                    columns: [
                                        // each columns data
                                        ['data1', 2, 8, 6, 7, 14, 11],
                                        ['data2', 5, 15, 11, 15, 21, 25],
                                        ['data3', 17, 18, 21, 20, 30, 29]
                                    ],
                                    type: 'line', // default type of chart
                                    colors: {
                                        'data1': tabler.colors["orange"],
                                        'data2': tabler.colors["blue"],
                                        'data3': tabler.colors["green"]
                                    },
                                    names: {
                                        // name of each serie
                                        'data1': 'Development',
                                        'data2': 'Marketing',
                                        'data3': 'Sales'
                                    }
                                },
                                axis: {
                                    x: {
                                        type: 'category',
                                        // name of each category
                                        categories: ['2013', '2014', '2015', '2016', '2017', '2018']
                                    },
                                },
                                legend: {
                                    show: false, //hide legend
                                },
                                padding: {
                                    bottom: 0,
                                    top: 0
                                },
                            });
                        });
                    });
                </script>
            </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Latest Comments</h3>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th colspan="2">Guest</th>
                            <th>Comment</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="w-1"><span class="avatar">RB</span></td>
                            <td class="">Ronald Bradley</td>
                            <td class="w-50">Initial commit</td>
                            <td class="w-1 text-nowrap">May 6, 2018</td>
                        </tr>
                        <tr>
                            <td><span class="avatar">BM</span></td>
                            <td>Russell Gibson</td>
                            <td>Main structure</td>
                            <td class="text-nowrap">April 22, 2018</td>
                        </tr>
                        <tr>
                            <td><span class="avatar">BA</span></td>
                            <td>Beverly Armstrong</td>
                            <td>Left sidebar adjustments</td>
                            <td class="text-nowrap">April 15, 2018</td>
                        </tr>
                        <tr>
                            <td><span class="avatar">BK</span></td>
                            <td>Bobby Knight</td>
                            <td>Topbar dropdown style</td>
                            <td class="text-nowrap">April 8, 2018</td>
                        </tr>
                        <tr>
                            <td><span class="avatar">SW</span></td>
                            <td>Sharon Wells</td>
                            <td>Fixes #625</td>
                            <td class="text-nowrap">April 9, 2018</td>
                        </tr>
                        <tr>
                            <td><span class="avatar">SW</span></td>
                            <td>Sharon Wells</td>
                            <td>Fixes #625</td>
                            <td class="text-nowrap">April 9, 2018</td>
                        </tr>
                        <tr>
                            <td><span class="avatar">SW</span></td>
                            <td>Sharon Wells</td>
                            <td>Fixes #625</td>
                            <td class="text-nowrap">April 9, 2018</td>
                        </tr>
                        <tr>
                            <td><span class="avatar">SW</span></td>
                            <td>Sharon Wells</td>
                            <td>Fixes #625</td>
                            <td class="text-nowrap">April 9, 2018</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
@endsection
