<?php

namespace App\Http\Controllers\Admin\Api;

use App\Models\Guest;
use App\Models\Party;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $party = Party::create($request->all());
        $party->save();
        return $party;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function show(Party $party)
    {
        return $party->load('guests');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Party $party)
    {
        $guests = $request->get('guests');
        $party->fill($request->all());
        $party->save();
        $this->sync_guests($party, $guests);
        return $party;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Party  $party
     * @return \Illuminate\Http\Response
     */
    public function destroy(Party $party)
    {
        //
    }

    private function sync_guests(Party $party, Array $guests)
    {
        $old_guests = $party->guests;
        $new_guests = [];
        foreach ($guests as $guest)
        {
            if (empty($guest['id']) || $guest['id'] === null)
            {
                $new_guest = new Guest();
            }else {
                $new_guest = Guest::firstOrNew(['id' => $guest['id']]);
            }
            $new_guest->name = $guest['name'];
            $new_guests[] = $new_guest;
        }

        foreach($old_guests as $old_guest)
        {
            $exists = false;
            foreach($new_guests as $new_guest)
            {
                if ($old_guest['name'] === $new_guest['name'])
                {
                    $exists = true;
                    break;
                }
            }
            if (!$exists && $old_guest['id'])
            {
                Guest::destroy($old_guest['id']);
            }
        }
        $party->guests()->saveMany($new_guests);
    }
}
