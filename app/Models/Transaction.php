<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded  = ['id','contact_id','created_at','updated_at'];

    public function transaction_sell_line()
    {
        return $this->hasMany(TransactionSellLine::class);
    }

    public function transaction_payment()
    {
        return $this->hasMany(TransactionPayment::class);
    }   
}
