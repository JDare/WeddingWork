<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guest;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $rsvp_yes = DB::select("select u.rsvp_at, count(*) as count
from (select distinct date(attending_updated_at) rsvp_at from `guests` where attending = 1) u
join `guests` u2 on u.rsvp_at >= date(u2.attending_updated_at)
group by u.rsvp_at");

        $rsvp_no =  DB::select("select u.rsvp_at, count(*) as count
from (select distinct date(attending_updated_at) rsvp_at from `guests` where attending = 0) u
join `guests` u2 on u.rsvp_at >= date(u2.attending_updated_at)
group by u.rsvp_at");

        $rsvp_graph['yes']['counts'] = array_column($rsvp_yes, 'count');
        $rsvp_graph['yes']['date'] = array_column($rsvp_yes, 'rsvp_at');

        $rsvp_graph['no']['counts'] = array_column($rsvp_no, 'count');
        $rsvp_graph['no']['date'] = array_column($rsvp_no, 'rsvp_at');


//        dd($rsvp_graph);

        $analytics = [
            'parties'       => Party::count(),
            'guests'        => Guest::count(),
            'without_email' => Party::whereNull('email')->count(),
            'comments'      => Party::whereNotNull('comment')->limit(10)->orderBy('updated_at')->get(),
            'rsvp_graph'    => $rsvp_graph,
            'invites_sent'  => Party::where('rsvp_sent', 1)->count(),
            'rsvp_yes'      => Guest::where('attending', 1)->count(),
            'num_comments'  => Party::whereNotNull('comment')->count(),
        ];
        return view('dashboard.index', [
            'analytics' => $analytics,
        ]);
    }
}
