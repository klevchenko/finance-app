<?php

namespace App\Http\Controllers;

use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $transactions = new TransactionController;
        return view('home', $transactions->index());
    }
}
