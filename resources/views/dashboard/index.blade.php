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
                        <div id="chart-rsvp" style="height: 16rem"></div>
                    </div>
                </div>
                <script>
                    require(['c3', 'jquery'], function(c3, $) {
                        $(document).ready(function(){
                            var chart = c3.generate({
                                bindto: '#chart-rsvp', // id of chart wrapper
                                data: {
                                    columns: [
                                        // each columns data
                                        ['data1', {{ implode(',', $analytics['rsvp_graph']['yes']['counts']) }}],
                                        // ['data2', 5, 15, 11, 15, 21, 25],
                                    ],
                                    type: 'line', // default type of chart
                                    colors: {
                                        'data1': tabler.colors["blue"],
                                        // 'data2': tabler.colors["orange"],
                                    },
                                    names: {
                                        // name of each serie
                                        'data1': 'Attending',
                                        'data2': 'Not-Attending'
                                    }
                                },
                                axis: {
                                    x: {
                                        type: 'category',
                                        // name of each category
                                        categories: @json($analytics['rsvp_graph']['yes']['date'])
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
                            <th>Guest</th>
                            <th>Comment</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($analytics['comments']->count() == 0)
                        <tr>
                            <td colspan="3" align="center">
                                No comments yet.
                            </td>
                        </tr>
                        @endif
                        @foreach($analytics['comments'] as $party)
                        <tr>
                            <td class="">{{ $party->name }}</td>
                            <td class="w-50">{{ $party->comment }}</td>
                            <td class="w-1 text-nowrap">{{ $party->updated_at }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
