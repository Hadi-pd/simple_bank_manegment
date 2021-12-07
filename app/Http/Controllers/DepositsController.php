<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Deposits;
use Illuminate\Http\Request;

class DepositsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposits = Deposits::all();
        return view('admin.deposits', compact('deposits'));
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
        return view('forms.deposit', compact('edit','accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Deposits::create([
            'account_id' => $request->account_id,
            'deposit_type' => $request->deposit_type,
            'loan_id' => $request->loan_id ?? 0,
            'tracking_code' => $request->tracking_code,
            'deposit_date' => $request->deposit_dat
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
    public function edit($deposit)
    {
        $edit = true;
        $accounts = Accounts::all();
        $deposits = Deposits::find($deposit);
        return view('forms.deposit',compact('deposits','edit','accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $deposit)
    {
        $cat=Deposits::find($deposit);
        $cat->account_id = $request->account_id;
        $cat->deposit_type = $request->deposit_type;
        $cat->loan_id = $request->loan_id;
        $cat->tracking_code = $request->tracking_code;
        $cat->deposit_date = $request->deposit_dat;
        $cat->save();
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
