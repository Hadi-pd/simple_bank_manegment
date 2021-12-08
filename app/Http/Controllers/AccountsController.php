<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Accounts::all();
        return view('admin.accounts', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        return view('forms.account', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = Accounts::create([
            'name'=>                $request-> name,
            'last_name'=>           $request-> last_name,
            'email'=>               $request-> email,
            'phone'=>               $request-> phone,
            'first_pay'=>           $request-> first_pay,
            'address'=>             $request-> address,
            'bank_account_number'=> $request-> bank_account_number,
            'other_info'=>          $request-> other_info
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
    public function edit($account)
    {
        $edit = true;
        $accounts = Accounts::find($account);
        return view('forms.account',compact('edit','accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $account)
    {
        $update = Accounts::find($account);
        $update -> name = $request-> name;
        $update -> last_name = $request-> last_name;
        $update -> email = $request-> email;
        $update -> phone = $request-> phone;
        $update -> first_pay = $request-> first_pay;
        $update -> address = $request-> address;
        $update -> bank_account_number = $request-> bank_account_number;
        $update -> other_info = $request-> other_info;
        $update -> save();
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
