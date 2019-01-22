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
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        DB::enableQueryLog();
        $q = trim($request->get('q'));

        $builder = Guest::with('party')
            ->leftJoin('parties', 'guests.party_id', '=', 'parties.id')
            ->select(['guests.*'])
            ->orderByRaw('parties.name ASC, guests.unknown ASC, guests.name ASC');

        if ($q)
        {
            $builder = $builder->where('guests.name', 'LIKE', '%'. $q . '%')
            ->orWhere('parties.name', 'LIKE', '%'. $q . '%');
        }
        $results = $builder->paginate(15); //$builder->get();// $builder->paginate(15);

        //dd(DB::getQueryLog());

        return $results;
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
        $party = $guest->party;
        if ($party->guests->count() <= 1)
        {
            $party->delete();
        }else{
            $guest->delete();
        }
        return response()->noContent();
    }
}
