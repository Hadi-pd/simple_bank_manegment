<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Deposits;
use App\Models\Loans;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acc = Accounts::all();
        $loans = Loans::all();

        $loans_sum = Loans::sum('l_amount');
        $deposits_sum = Deposits::sum('deposit_amount');
        $formatter = new \NumberFormatter('fa', \NumberFormatter::CURRENCY);
        //$loans_sum_mony = $formatter->format( $loans_sum);
         $loans_sum_mony = $formatter->formatCurrency( $loans_sum , 'IRR');
        
        $acc_count = Accounts::count();
        $loans_count =  Loans::count();

        return view('admin.index', compact('acc_count', 'loans_count','loans_sum_mony', 'deposits_sum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
