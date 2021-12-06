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
       'l_percentage'
     ];

    public function Accounts(){
        return $this->hasOne(Accounts::class, 'id');
    }
}
