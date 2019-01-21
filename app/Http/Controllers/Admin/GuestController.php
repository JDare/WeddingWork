<?php
/**
 * Created by PhpStorm.
 * User: Jez
 * Date: 1/14/2019
 * Time: 11:19 PM
 */

namespace App\Http\Controllers\Admin;


class GuestController extends Controller
{
    public function index()
    {
        return view('dashboard.guests');
    }
}