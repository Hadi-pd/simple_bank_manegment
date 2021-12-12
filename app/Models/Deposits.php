<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposits extends Model
{
    protected $table = 'deposits';
    protected $fillable=[
       'account_id',
       'deposit_type',
       'loan_id',
       'tracking_code',
       'deposit_date',
       'deposit_amount',
       'other_info',
       'is_deposit',
       'is_accepted'
    ];

    public function AccountName(){
        return $this->hasOne(Accounts::class, 'id', 'account_id');
    }
}
