<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bank;
use Illuminate\Support\Facades\DB;

class BankingSearch extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //search page with form
    public function index()
    {
        //
        $banks = bank::all();
        $banknames = bank::select('name')->distinct()->get();
        return view('search', compact( 'banknames', 'banks'));
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
    //to search and display result
    public function show()
    {

        $Bankname = strtoupper(request('bank'));
        //validation if none is submited
        if(!strtoupper(request('ifsc'))&& !strtoupper(request('branch')))
        {
            return redirect('/search');
        }
        //if ifsc is entered
        else if(strtoupper(request('ifsc'))) {
            $IFSC = strtoupper(request('ifsc'));
            $banks = DB::table('banks')->where('name','like',$Bankname)->where('ifsc', 'like', '%' . $IFSC . '%')->first();
            if (!$banks) {
                return "no such bank";
            }
        }
        //if branch is entered
        else if(strtoupper(request('branch'))){
            $BRANCH = strtoupper(request('branch'));
            $banks = DB::table('banks')->where('name','like',$Bankname)->where('branch', 'like', '%' . $BRANCH . '%')->first();
            if (!$banks) {
                return "no such bank";
            }
        }
        //if data does not exist
        if(!$banks)return "no such bank exist";

        //show searched result
        return view('showresult', compact('banks'));
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
