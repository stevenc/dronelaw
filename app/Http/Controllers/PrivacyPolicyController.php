<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStep(Request $request, $step)
    {
        $user = $request->user();
        
        $company = $user->company()->first();

        switch ($step) {
            case '1':
                $check_boxes = DB::table('personal_info_collected')
                                             ->select('id', 'info')
                                             ->orderBy('order')
                                             ->get();
                break;

            case '2':
                $check_boxes = DB::table('additional_info')
                                             ->select('info')
                                             ->orderBy('order')
                                             ->get();
                break;

            case '3':
                $check_boxes = DB::table('info_channels')
                                             ->select('channel')
                                             ->orderBy('order')
                                             ->get();
                break;
            
            case '4':
                $check_boxes = DB::table('info_uses')
                                             ->select('use')
                                             ->orderBy('order')
                                             ->get();
                break;

            case '5':
                $check_boxes = DB::table('share_circumstances')
                                             ->select('circumstance')
                                             ->orderBy('order')
                                             ->get();
                break;

            case '6':
                $check_boxes = DB::table('stop_methods')
                                             ->select('method')
                                             ->orderBy('order')
                                             ->get();
                break;
        }

        return view('privacy_policy.create_steps.step_' . $step, compact('company', 'check_boxes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStep(Request $request, $step)
    {
        $company_id = $request->input()->company_id;

        if ((int) $step >= 2) {
            $privacy_policy_id = PrivacyPolicy::select('id')->where('company_id', $company_id)->first();
        }
        
        switch ($step) {
            case '1':
                $privacy_policy_id = DB::table('privacy_policies')
                               ->insertGetId(['company_id' => $company_id,
                                'current_step' => $step
                                ]);
                $check_box_1 = $request->input()->check_box_id_1 ?? null;
                if (isset($check_box_1)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_id_1]);
                }
                $check_box_2 = $request->input()->check_box_id_2 ?? null;
                if (isset($check_box_2)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_2]);
                }
                $check_box_3 = $request->input()->check_box_id_3 ?? null;
                if (isset($check_box_3)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_3]);
                }
                $check_box_4 = $request->input()->check_box_id_4 ?? null;
                if (isset($check_box_4)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_4]);
                }
                $check_box_5 = $request->input()->check_box_id_5 ?? null;
                if (isset($check_box_5)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_5]);
                }
                $check_box_6 = $request->input()->check_box_id_6 ?? null;
                if (isset($check_box_6)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_6]);
                }
                $check_box_7 = $request->input()->check_box_id_7 ?? null;
                if (isset($check_box_7)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_7]);
                }
                $check_box_8 = $request->check_box_id_8 ?? null;
                if (isset($check_box_8)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_8]);
                }
                $check_box_9 = $request->input()->check_box_id_9 ?? null;
                if (isset($check_box_9)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_9]);
                }
                $check_box_10 = $request->input()->check_box_id_10 ?? null;
                if (isset($check_box_10)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_10]);
                }
                $check_box_11 = $request->input()->check_box_id_11 ?? null;
                if (isset($check_box_11)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_id_11]);
                }

                break;

            case '2':
                $check_box_1 = $request->check_box_id_1 ?? null;
                if (isset($check_box_1)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert('privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_id_1);
                }
                $check_box_2 = $request->check_box_id_2 ?? null;
                if (isset($check_box_2)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert('privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_2);
                }
                $check_box_3 = $request->check_box_id_3 ?? null;
                if (isset($check_box_3)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert('privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_3);
                }
                $check_box_4 = $request->check_box_id_4 ?? null;
                if (isset($check_box_4)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert('privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_4);
                }
                $check_box_5 = $request->check_box_id_5 ?? null;
                if (isset($check_box_5)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert('privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_5);
                }
                $check_box_6 = $request->check_box_id_6 ?? null;
                if (isset($check_box_6)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert('privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_6);
                }
                $check_box_7 = $request->check_box_id_7 ?? null;
                if (isset($check_box_7)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert('privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_7);
                }
                $check_box_8 = $request->check_box_id_8 ?? null;
                if (isset($check_box_8)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert('privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_8);
                }
                $check_box_9 = $request->check_box_id_9 ?? null;
                if (isset($check_box_9)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert('privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_9);
                }
                $check_box_10 = $request->check_box_id_10 ?? null;
                if (isset($check_box_10)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert('privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_10);
                }
                $check_box_11 = $request->check_box_id_11 ?? null;
                if (isset($check_box_11)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert('privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_id_11);
                }
                $check_box_12 = $request->check_box_id_10 ?? null;
                if (isset($check_box_10)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert('privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_10);
                }
                $check_box_13 = $request->check_box_id_11 ?? null;
                if (isset($check_box_11)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert('privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_id_11);
                }


                break;

            case '3':
                $check_box_1 = $request->check_box_id_1 ?? null;
                if (isset($check_box_1)) {
                    DB::table('privacy_policies_info_channels')
                      ->insert('privacy_policy_id' => $privacy_policy_id,
                        'info_channel_id' => $check_box_id_1);
                }
                $check_box_2 = $request->check_box_id_2 ?? null;
                if (isset($check_box_2)) {
                    DB::table('privacy_policies_info_channels')
                      ->insert('privacy_policy_id' => $privacy_policy_id,
                        'info_channel_id' => $check_box_2);
                }
                $check_box_3 = $request->check_box_id_3 ?? null;
                if (isset($check_box_3)) {
                    DB::table('privacy_policies_info_channels')
                      ->insert('privacy_policy_id' => $privacy_policy_id,
                        'info_channel_id' => $check_box_3);
                }
                $check_box_4 = $request->check_box_id_4 ?? null;
                if (isset($check_box_4)) {
                    DB::table('privacy_policies_info_channels')
                      ->insert('privacy_policy_id' => $privacy_policy_id,
                        'info_channel_id' => $check_box_4);
                }
                $check_box_5 = $request->check_box_id_5 ?? null;
                if (isset($check_box_5)) {
                    DB::table('privacy_policies_info_channels')
                      ->insert('privacy_policy_id' => $privacy_policy_id,
                        'info_channel_id' => $check_box_5);
                }
                $check_box_6 = $request->check_box_id_6 ?? null;
                if (isset($check_box_6)) {
                    DB::table('privacy_policies_info_channels')
                      ->insert('privacy_policy_id' => $privacy_policy_id,
                        'info_channel_id' => $check_box_6);
                }
                break;
            
            case '4':
                $check_boxes = DB::table('info_uses')
                                             ->select('use')
                                             ->orderBy('order')
                                             ->get();
                break;

            case '5':
                $check_boxes = DB::table('share_circumstances')
                                             ->select('circumstance')
                                             ->orderBy('order')
                                             ->get();
                break;

            case '6':
                $check_boxes = DB::table('stop_methods')
                                             ->select('method')
                                             ->orderBy('order')
                                             ->get();
                break;    
           
        }      
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
    public function updateStep(Request $request, $step)
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
