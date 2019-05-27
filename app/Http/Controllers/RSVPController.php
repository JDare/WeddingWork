<?php

namespace App\Http\Controllers;

use App\Models\Party;
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
        $party = Party::where('uuid', $uuid)->firstOrFail();
    }
}
