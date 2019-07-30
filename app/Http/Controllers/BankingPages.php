<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bank;
use Illuminate\Support\Facades\DB;

class BankingPages extends Controller
{
    //home page
    public function index()
    {
        return view('BankInfo');
    }
    // form page
    public function create()
    {
        return view('create');
    }
    // to store data in database
    public function store(request $request)
    {
        //validation (every field is required)
        $validatedData = $request->validate([
            'name' => 'required',
            'branch' => 'required',
            'ifsc' => 'required',
            'address' => 'required',
        ]);
        //to check the same branch exist or not
        $IFSC = strtoupper(request('ifsc'));
        $banks = DB::table('banks')->where('ifsc',$IFSC)->first();

        if($banks)
        {
            return "branch already exist";
        }
        // to store new entry
        $bank = new bank();
        $bank->name = strtoupper(request('bank'));
        $bank->branch = strtoupper(request('branch'));
        $bank->ifsc = strtoupper(request('ifsc'));
        $bank->address = strtoupper(request('address'));

        $bank->save();

        return redirect('/');
    }

}
