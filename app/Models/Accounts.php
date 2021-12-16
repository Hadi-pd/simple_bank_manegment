<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    //use HasFactory;

    protected $table='accounts';
    protected $fillable=[
        'name',
        'last_name',
        'email',
        'phone',
        'first_pay',
        'address',
        'bank_account_number',
        'other_info'
    ];

    public function loans(){
        return $this->hasMany(Loans::class, 'account_id');
    }
    public function AccountDeposit(){
        return $this->hasMany(Deposits::class, 'account_id' , 'id')->sum('deposit_amount');
    }
    public function AccountLoanCount(){
        return $this->hasMany(Loans::class, 'account_id', 'id')->count();
    }
    public function AccountLoanSum(){
        return $this->hasMany(Loans::class, 'account_id', 'id')->sum('l_amount');
    }


}
