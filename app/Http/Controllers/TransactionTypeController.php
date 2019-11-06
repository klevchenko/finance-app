<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionTypeController extends Controller
{

    public function all()
    {
        return [
            [
                "id" => 1,
                "title" => 'Звичайні',
            ],
            [
                "id" => 2,
                "title" => 'Відкладені гроші',
            ],
        ];
    }

    
}
