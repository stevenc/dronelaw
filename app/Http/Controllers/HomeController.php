<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Company;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $company = $user->company()->first();

        if (isset($company)) {
            $copyright_policy = DB::table('copyright_policies')
                                   ->where('company_id', $company->id)
                                   ->first();
            
            $privacy_policy = DB::table('privacy_policies')
                                 ->where('company_id', $company->id)
                                 ->first();

            $terms_of_use = DB::table('terms_of_use')
                                ->where('company_id', $company->id)
                                ->first();

            return view('home', compact('company', 'copyright_policy', 'privacy_policy',
                'terms_of_use'));
        } else {
            return view('home', compact('company'));
        }

        

    }
}
