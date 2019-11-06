<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    //

    public function all()
    {
        return [
            [
                "id"     => 1,
                "sumbol" => '$',
                "code"   => 'USD',
                "name"   => 'дол'
            ],
            [
                "id"     => 2,
                "sumbol" => 'UAH',
                "code"   => 'UAH',
                "name"   => 'грн'
            ],
            [
                "id"     => 3,
                "sumbol" => 'p',
                "code"   => 'RUR',
                "name"   => 'руб'
            ],
        ];
    }
}

