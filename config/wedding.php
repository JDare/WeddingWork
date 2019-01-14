<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Wedding Variables
    |--------------------------------------------------------------------------
    |
    | All variables related to the wedding can be stored here.
    |
    */

    'date' => env('WEDDING_DATE', "2019-10-26 14:00:00"),
    'bride' => [
        'name' => env('WEDDING_BRIDE_NAME', "Lilly"),
    ],
    'groom' => [
        'name' => env('WEDDING_GROOM_NAME', "Jeremy"),
    ],



];
