<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function index()
    {
        $transactions = Transaction::all();

        $all_types = [];

        return [
            'transactions' => $transactions,
        ];
    }

    public function add(Request $request)
    {
        // amount
        // type
        // currency
        // category
        // comment

        //Transaction::create($request->all());

        $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required',
            'currency' => 'required',
        ]);
                
        $transaction = new Transaction();
 
        $transaction->amount = request('amount');
        $transaction->type = request('type');
        $transaction->currency = request('currency');
        $transaction->category = request('category') ? request('category') : ' ';
        $transaction->comment = request('comment') ? request('comment') : ' ';

 
        $transaction->save();
 
        return redirect('/');
    }
    
}
