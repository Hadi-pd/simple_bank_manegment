<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Loans;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loans::all();
        return view('admin.loans', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Accounts::all();
        $edit = false;
        return view('forms.Loan', compact('edit','accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $loan = Loans::create([
            'account_id' =>      $request->account_id,
            'l_guarantor1_id' => $request->l_guarantor1_id,
            'l_guarantor2_id' => $request->l_guarantor2_id,
            'l_amount' =>        $request->l_amount,
            'l_percentage' =>    $request->l_percentage
        ]);
        return redirect()->back();
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
    public function edit($loan)
    {
        $edit = true;
        $accounts = Accounts::all();
        $loans = Loans::find($loan);
        return view('forms.Loan',compact('loans','edit','accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $loan)
    {
        
        $data = Loans::find($loan);
        $data->account_id = $request->account_id;
        $data->l_guarantor1_id = $request->l_guarantor1_id;
        $data->l_guarantor2_id = $request->l_guarantor2_id;
        $data->l_amount = $request->l_amount;
        $data->l_percentage = $request->l_percentage;
        $data->save();
        return redirect()->back();
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
