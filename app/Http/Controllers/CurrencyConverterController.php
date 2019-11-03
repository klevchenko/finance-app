<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyConverterController extends Controller
{
    /*
        Наличный курс ПриватБанка (в отделениях):
        GET JSON: https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5

        Безналичный курс ПриватБанка (конвертация по картам, Приват24, пополнение вкладов):
        GET JSON: https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11
    */

    public $all_json_data;

    // TODO Cache this
    public $api_url = 'https://api.privatbank.ua/p24api/pubinfo?exchange&json&coursid=11';

    public $buy;
    public $sale;

    function __construct()
    {
        $this->formar_all();
    }

    public function get_all()
    {
        $tmp = file_get_contents($this->api_url);
        $this->all_json_data = ( !empty($tmp) and json_decode($tmp) ) ? json_decode($tmp, true) : [];

        return $this->all_json_data;
    }

    public function formar_all()
    {
        foreach($this->get_all() as $row)
        {
            $this->buy[$row['ccy']] =  $row['buy'];
            $this->sale[$row['ccy']] =  $row['sale'];
        }
    }

    public function convert(Request $request, $amount, $from, $to = 'UAH', $action = 'sale')
    {
        $convert_data = $action == 'sale' ? $this->sale : $this->buy;
        $res = 0;

        if(
            isset($amount)              and !empty($amount) and 
            isset($from)                and !empty($from) and 
            isset($convert_data)        and !empty($convert_data) and 
            isset($convert_data[$from]) and !empty($convert_data[$from]) 
        ){
            // TODO convert any to any
            // convert any currency from $from to UAH
            $res = $amount * $convert_data[$from];

            return response()->json([
                'status' => 'ok',
                'name' => 'convert',
                'from' => $from,
                'amount' => $amount,
                'to' => $to,
                'res' => $res,
                'action' => $action,
                'convert_data' => $convert_data,

            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'name' => 'convert',
            ]);
        }
    }


}
