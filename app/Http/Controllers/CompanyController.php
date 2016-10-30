<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Company;
use App\Address;
use DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return redirect('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = DB::table('states')
                    ->select('id', 'name')
                    ->orderBy('name', 'asc')
                    ->get();


        return view('company.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();

        $company_name = ($request->input('companyname') !== null) ? $request->input('companyname') : null;
        $company_abbrev = ($request->input('abbrev') !== null) ? $request->input('abbrev') : null;
        $domain_name = ($request->input('domainname') !== null) ? $request->input('domainname') : null;
        $desired_state = ($request->input('desiredstate') !== null) ? (int)$request->input('desiredstate') : null;
        $preferred_email = ($request->input('preferred_email') !== null) ? $request->input('preferred_email') : null;
        $address_1 = ($request->input('address1') !== null) ? $request->input('address1') : null;
        $address_2 = ($request->input('address2') !== null) ? $request->input('address2') : null;
        $city = ($request->input('city') !== null) ? $request->input('city') : null;
        $company_state = ($request->input('companystate') !== null) ? (int)$request->input('companystate') : null;
        $zip = ($request->input('zip') !== null) ? $request->input('zip') : null;

        $domain = DB::table('companies')
                    ->select('domain')
                    ->where('domain', $domain_name)
                    ->get();

        if (count($domain) == 0) {
            $company = new Company([
                'name' => $company_name,
                'domain' => $domain_name,
                'abbreviation' => $company_abbrev,
                ]);

            $user->company()->save($company);

            $company = $user->company()->first();

            $address = new Address(['address_1' => $address_1,
                                    'address_2' => $address_2,
                                    'city' => $city,
                                    'company_state' => $company_state,
                                    'desired_state' => $desired_state,
                                    'zip' => $zip,
                                    'preferred_email' => $preferred_email,
                                    ]);

            $company->address()->save($address);

            $company_address = $company->address()->first();

            if (isset($company->name) && !empty($company->name)) {
                if (isset($company->domain) && !empty($company->domain)) {
                    if (isset($company->abbreviation) && !empty($company->abbreviation)) {
                        if (isset($company_address->address_1) && !empty($company_address->address_1)) {
                            if (isset($company_address->city) && !empty($company_address->city)) {
                                if (isset($company_address->company_state) && !empty($company_address->company_state)) {
                                    if (isset($company_address->desired_state) && !empty($company_address->desired_state)) {
                                        if (isset($company_address->zip) && !empty($company_address->zip)) {
                                            if (isset($company_address->preferred_email) && !empty($company_address->preferred_email)) {
                                                DB::table('companies')
                                                   ->where('id', $company->id)
                                                   ->update(['completed' => 1]);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } else {
            "Domain company already exists!";
        }

        $company = $user->company()->first();

        return view('home', compact('company'));
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
        $company = Company::find($id);

        $company_address = $company->address()->first();

        $states = DB::table('states')
                    ->select('id', 'name')
                    ->orderBy('name', 'asc')
                    ->get();

        return view('company.edit', compact('company', 'company_address', 'states'));
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
        $company_name = ($request->input('companyname') !== null) ? $request->input('companyname') : null;
        $company_abbrev = ($request->input('abbrev') !== null) ? $request->input('abbrev') : null;
        $domain_name = ($request->input('domainname') !== null) ? $request->input('domainname') : null;
        $desired_state = ($request->input('desiredstate') !== null) ? (int)$request->input('desiredstate') : null;
        $preferred_email = ($request->input('preferred_email') !== null) ? $request->input('preferred_email') : null;
        $address_1 = ($request->input('address1') !== null) ? $request->input('address1') : null;
        $address_2 = ($request->input('address2') !== null) ? $request->input('address2') : null;
        $city = ($request->input('city') !== null) ? $request->input('city') : null;
        $company_state = ($request->input('companystate') !== null) ? (int)$request->input('companystate') : null;
        $zip = ($request->input('zip') !== null) ? $request->input('zip') : null;

        DB::table('companies')
          ->where('id', $id)
          ->update([
            'name' => $company_name,
            'abbreviation' => $company_abbrev,
            'domain' => $domain_name
            ]);

        DB::table('addresses')
          ->where('company_id', $id)
          ->update([
            'address_1' => $address_1,
            'address_2' => $address_2,
            'city' => $city,
            'company_state' => $company_state,
            'desired_state' => $desired_state,
            'zip' => $zip,
            'preferred_email' => $preferred_email
            ]);

        $company = Company::find($id);
        $company_address = $company->address()->first();

        if (isset($company->name) && !empty($company->name)) {
            if (isset($company->domain) && !empty($company->domain)) {
                if (isset($company->abbreviation) && !empty($company->abbreviation)) {
                    if (isset($company_address->address_1) && !empty($company_address->address_1)) {
                        if (isset($company_address->city) && !empty($company_address->city)) {
                            if (isset($company_address->company_state) && !empty($company_address->company_state)) {
                                if (isset($company_address->desired_state) && !empty($company_address->desired_state)) {
                                    if (isset($company_address->zip) && !empty($company_address->zip)) {
                                        if (isset($company_address->preferred_email) && !empty($company_address->preferred_email)) {
                                            DB::table('companies')
                                               ->where('id', $company->id)
                                               ->update(['completed' => 1]);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return view('home', compact('company'));
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
