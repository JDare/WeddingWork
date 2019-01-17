<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        DB::enableQueryLog();
//
//        Guest::leftJoin('parties', 'guests.party_id', '=', 'parties.id')
//            ->select(['guests.*', 'parties.name'])
//            ->orderBy('parties.name', 'ASC')
//            ->paginate(15);
//        dd(DB::getQueryLog());


        return Guest::with('party')->leftJoin('parties', 'guests.party_id', '=', 'parties.id')
            ->select(['guests.*', 'parties.name'])
            ->orderBy('parties.name', 'ASC')
            ->paginate(15);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        //
    }
}
