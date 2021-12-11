<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    //use HasFactory;

    protected $table = 'loans';
    protected $fillable=[
       'account_id',
       'l_guarantor1_id',
       'l_guarantor2_id',
       'l_amount',
       'l_percentage',
       'start_date',
       'end_date',
       'Installments',
       'Installment_amount',
       'other_info',
       'is_clear',
     ];

    public function Accounts(){
        return $this->hasOne(Accounts::class, 'id');
    }
    public function AccountName(){
        return $this->hasOne(Accounts::class, 'id', 'account_id');
    }
    public function AccountNameG1(){
        return $this->hasOne(Accounts::class, 'id', 'l_guarantor1_id');
    }
    public function AccountNameG2(){
        return $this->hasOne(Accounts::class, 'id', 'l_guarantor2_id');
    }
    public function DepositsLoan(){
       return $this->hasMany(Deposits::class, 'loan_id', 'id')->sum('deposit_amount');
    }
}
