<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\TransactionTypeController;

class TransactionController extends Controller
{

    public function index()
    {
        $transactions = Transaction::all();

        $Currencys = new CurrencyController;
        $all_currencys = $Currencys->all();

        $TransactionTypes = new TransactionTypeController;
        $transaction_types = $TransactionTypes->all();

        print_r($transaction_types);

        return [
            'all_currencys'     => $all_currencys,
            'transactions'      => $transactions,
            'transaction_types' => $transaction_types,
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
            'currency' => 'required',
        ]);
        
        $is_remove   = !empty(request('amount_remove')) ? request('amount_remove') : false;
        $is_to_funds = !empty(request('amount_to_funds')) ? request('amount_to_funds') : false;

        if($is_remove)
        {
            
        }

        

        $transaction = new Transaction();
 
        $transaction->amount = request('amount');
        $transaction->currency = request('currency');
        
        $transaction->type = !empty(request('type')) ? request('type') : 1;
        $transaction->category = request('category') ? request('category') : '';
        $transaction->comment = request('comment') ? request('comment') : '';

 
        $transaction->save();

        print_r($request->all());
        print_r(request('remove_amount'));
        print_r(request('to_funds_amount'));
       


        //to_funds_amount

        //return redirect('/');
    }

    
}
