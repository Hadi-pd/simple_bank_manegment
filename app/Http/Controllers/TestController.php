<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Loans;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
        
        /////////// ارتباط وام با حساب ////////
        //$acc = Loans::find(1);
        //return response()->json([ $acc, $acc->Accounts] , 200);
        ////////////////////////////////

        //////////ارتباط حساب با وام ها//////////////
        //$acc = Accounts::find(1);
        //$count = count($acc->loans);
        //return response()->json([ $acc , $acc->loans , $count] , 200);
        ////////////////////////////////////////////////////////////////

        
    }
}
