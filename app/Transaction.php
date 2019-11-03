<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // amount
    // type
    // currency
    // category
    // comment

    protected $fillable = ['amount', 'type', 'currency', 'category', 'comment'];
}
