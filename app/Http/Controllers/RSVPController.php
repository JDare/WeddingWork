<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RSVPController extends Controller
{
    public function view($uuid)
    {
        $party = Party::where('uuid', $uuid)->firstOrFail();
        return view('frontend.rsvp', ['party' => $party]);
    }

    public function update(Request $request, $uuid)
    {
        $cutoff_date = Carbon::createFromTimeString(config('wedding.date'))->subDays(42);
        if (now()->greaterThan($cutoff_date))
        {
            $request->session()->flash('rsvp_message', 'cutoff');
            return redirect('/rsvp/' . $uuid);
        }
        $party = Party::with('guests')->where('uuid', $uuid)->firstOrFail();
        $request_guests = $request->get('guests');
        foreach($party->guests as $guest)
        {
            if (!empty($request_guests[$guest->id]))
            {
                $guest->attending = (isset($request_guests[$guest->id]['attending']) && $request_guests[$guest->id]['attending'] === "true") ? true : false;
                $guest->vegetarian = (isset($request_guests[$guest->id]['vegetarian'])) ? true : false;
            }else{
                $guest->attending = false;
                $guest->vegetarian = false;
            }
            $guest->attending_updated_at = now();
            $guest->save();
        }

        $party->comment = $request->get('comments');
        $party->save();

        $request->session()->flash('rsvp_message', 'success');
        return redirect('/rsvp/' . $uuid);
    }
}
