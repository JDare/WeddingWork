<?php

namespace App\Http\Controllers\Admin;

use App\Models\Guest;
use App\Models\Party;
use Illuminate\Http\Request;

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
        $analytics = [
            'parties'       => Party::count(),
            'guests'        => Guest::count(),
            'without_email' => Party::whereNotNull('email')->count(),
        ];
        return view('dashboard.index', [
            'analytics' => $analytics,
        ]);
    }
}
