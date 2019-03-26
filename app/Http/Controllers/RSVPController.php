<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;

class RSVPController extends Controller
{
    public function view(Party $party)
    {
        return view('frontend.rsvp', ['party' => $party]);
    }

    public function update(Request $request, Party $party)
    {

    }
}
