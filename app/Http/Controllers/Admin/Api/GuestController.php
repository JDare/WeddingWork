<?php
/**
 * Created by PhpStorm.
 * User: Jez
 * Date: 1/15/2019
 * Time: 8:56 PM
 */

namespace App\Http\Controllers\Admin\Api;

use App\Models\Guest;
use App\Models\Party;

class GuestController
{
    public function index()
    {
        return response()->json(Guest::with('party')->paginate(15));
    }
}