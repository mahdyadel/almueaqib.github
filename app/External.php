<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class External extends Model
{
    protected $fillable = ['receipt_number','name', 'type_of_transaction', 'amount', 'name_of_operator', 'phone', 'name_of_baptist', 'duration_of_baptism', 'status'];
}
