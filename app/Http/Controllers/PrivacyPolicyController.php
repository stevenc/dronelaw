<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Company;

use App\PrivacyPolicy;

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
                                             ->select('id', 'info')
                                             ->orderBy('order')
                                             ->get();
                break;

            case '3':
                $check_boxes = DB::table('info_channels')
                                             ->select('id', 'channel')
                                             ->orderBy('order')
                                             ->get();
                break;
            
            case '4':
                $check_boxes = DB::table('info_uses')
                                             ->select('id', 'use')
                                             ->orderBy('order')
                                             ->get();
                break;

            case '5':
                $check_boxes = DB::table('share_circumstances')
                                             ->select('id', 'circumstance')
                                             ->orderBy('order')
                                             ->get();
                break;

            case '6':
                $check_boxes = DB::table('stop_methods')
                                             ->select('id', 'method')
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
        $company_id = $request->input('company_id');

        if ((int) $step >= 2) {
            $privacy_policy = PrivacyPolicy::where('company_id', $company_id)->first();
            $privacy_policy_id = $privacy_policy->id;
            $current_step = $privacy_policy->current_step;
        }
        
        switch ($step) {
            case '1':
                $privacy_policy_id = DB::table('privacy_policies')
                               ->insertGetId(['company_id' => $company_id,
                                'current_step' => 1]);
                $check_box_1 = $request->input('check_box_1') ?? null;
                if (isset($check_box_1)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_1]);
                }
                $check_box_2 = $request->input('check_box_2') ?? null;
                if (isset($check_box_2)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_2]);
                }
                $check_box_3 = $request->input('check_box_3') ?? null;
                if (isset($check_box_3)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_3]);
                }
                $check_box_4 = $request->input('check_box_4') ?? null;
                if (isset($check_box_4)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_4]);
                }
                $check_box_5 = $request->input('check_box_id_5') ?? null;
                if (isset($check_box_5)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_5]);
                }
                $check_box_6 = $request->input('check_box_6') ?? null;
                if (isset($check_box_6)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_6]);
                }
                $check_box_7 = $request->input('check_box_7') ?? null;
                if (isset($check_box_7)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_7]);
                }
                $check_box_8 = $request->input('check_box_8') ?? null;
                if (isset($check_box_8)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_8]);
                }
                $check_box_9 = $request->input('check_box_9') ?? null;
                if (isset($check_box_9)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_9]);
                }
                $check_box_10 = $request->input('check_box_10') ?? null;
                if (isset($check_box_10)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_10]);
                }
                $check_box_11 = $request->input('check_box_11') ?? null;
                if (isset($check_box_11)) {
                    DB::table('privacy_policies_personal_info_collected')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => $check_box_11]);
                    $description = $request->input('description');
                    if (isset($description)) {
                      DB::table('privacy_policies_personal_info_other')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                                'description' => $description]);
                    }
                }
                
                break;

            case '2':
                $check_box_1 = $request->input('check_box_1') ?? null;
                if (isset($check_box_1)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_1]);
                }
                $check_box_2 = $request->input('check_box_2') ?? null;
                if (isset($check_box_2)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_2]);
                }
                $check_box_3 = $request->input('check_box_3') ?? null;
                if (isset($check_box_3)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_3]);
                }
                $check_box_4 = $request->input('check_box_4') ?? null;
                if (isset($check_box_4)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_4]);
                }
                $check_box_5 = $request->input('check_box_5') ?? null;
                if (isset($check_box_5)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_5]);
                }
                $check_box_6 = $request->input('check_box_6') ?? null;
                if (isset($check_box_6)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_6]);
                }
                $check_box_7 = $request->input('check_box_7') ?? null;
                if (isset($check_box_7)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_7]);
                }
                $check_box_8 = $request->input('check_box_8') ?? null;
                if (isset($check_box_8)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_8]);
                }
                $check_box_9 = $request->input('check_box_9') ?? null;
                if (isset($check_box_9)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_9]);
                }
                $check_box_10 = $request->input('check_box_10') ?? null;
                if (isset($check_box_10)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_10]);
                }
                $check_box_11 = $request->input('check_box_11') ?? null;
                if (isset($check_box_11)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_id_11]);
                }
                $check_box_12 = $request->input('check_box_12') ?? null;
                if (isset($check_box_12)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_12]);
                }
                $check_box_13 = $request->input('check_box_13') ?? null;
                if (isset($check_box_13)) {
                    DB::table('privacy_policies_additional_info')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => $check_box_13]);
                    $description = $request->input('description');
                    if (isset($description)) {
                      DB::table('privacy_poilicies_additional_info_other')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                                'description' => $description]);
                    }

                }

                DB::table('privacy_policies')
                  ->where('id', $privacy_policy_id)
                  ->update(['current_step' => 2]);

                break;

            case '3':
                $check_box_1 = $request->input('check_box_1') ?? null;
                if (isset($check_box_1)) {
                    DB::table('privacy_policies_info_channels')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_channel_id' => $check_box_1]);
                }
                $check_box_2 = $request->input('check_box_2') ?? null;
                if (isset($check_box_2)) {
                    DB::table('privacy_policies_info_channels')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_channel_id' => $check_box_2]);
                }
                $check_box_3 = $request->input('check_box_3') ?? null;
                if (isset($check_box_3)) {
                    DB::table('privacy_policies_info_channels')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_channel_id' => $check_box_3]);
                }
                $check_box_4 = $request->input('check_box_4') ?? null;
                if (isset($check_box_4)) {
                    DB::table('privacy_policies_info_channels')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_channel_id' => $check_box_4]);
                }
                $check_box_5 = $request->input('check_box_5') ?? null;
                if (isset($check_box_5)) {
                    DB::table('privacy_policies_info_channels')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_channel_id' => $check_box_5]);
                }
                $check_box_6 = $request->input('check_box_6') ?? null;
                if (isset($check_box_6)) {
                    DB::table('privacy_policies_info_channels')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_channel_id' => $check_box_6]);
                    $description = $request->input('description');
                    if (isset($description)) {
                       DB::table('privacy_policies_info_channels_other')
                         ->insert(['privacy_policy_id' => $privacy_policy_id,
                                'description' => $description]);
                    }
                }

                DB::table('privacy_policies')
                  ->where('id', $privacy_policy_id)
                  ->update(['current_step' => 3]);

                break;
            
            case '4':
                $check_box_1 = $request->input('check_box_1') ?? null;
                if (isset($check_box_1)) {
                    DB::table('privacy_policies_info_uses')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => $check_box_1]);
                }
                $check_box_2 = $request->input('check_box_2') ?? null;
                if (isset($check_box_2)) {
                    DB::table('privacy_policies_info_uses')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => $check_box_2]);
                }
                $check_box_3 = $request->input('check_box_3') ?? null;
                if (isset($check_box_3)) {
                    DB::table('privacy_policies_info_uses')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => $check_box_3]);
                }
                $check_box_4 = $request->input('check_box_4') ?? null;
                if (isset($check_box_4)) {
                    DB::table('privacy_policies_info_uses')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => $check_box_4]);
                }
                $check_box_5 = $request->input('check_box_5') ?? null;
                if (isset($check_box_5)) {
                    DB::table('privacy_policies_info_uses')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => $check_box_5]);
                }
                $check_box_6 = $request->input('check_box_6') ?? null;
                if (isset($check_box_6)) {
                    DB::table('privacy_policies_info_uses')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => $check_box_6]);
                }
                $check_box_7 = $request->input('check_box_7') ?? null;
                if (isset($check_box_7)) {
                    DB::table('privacy_policies_info_uses')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => $check_box_7]);
                }
                $check_box_8 = $request->input('check_box_8') ?? null;
                if (isset($check_box_8)) {
                    DB::table('privacy_policies_info_uses')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => $check_box_8]);
                }
                $check_box_9 = $request->input('check_box_9') ?? null;
                if (isset($check_box_9)) {
                    DB::table('privacy_policies_info_uses')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => $check_box_9]);
                }
                $check_box_10 = $request->input('check_box_10') ?? null;
                if (isset($check_box_10)) {
                    DB::table('privacy_policies_info_uses')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => $check_box_10]);
                }
                $check_box_11 = $request->input('check_box_11') ?? null;
                if (isset($check_box_11)) {
                    DB::table('privacy_policies_info_uses')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => $check_box_11]);
                }
                $check_box_12 = $request->input('check_box_12') ?? null;
                if (isset($check_box_12)) {
                    DB::table('privacy_policies_info_uses')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => $check_box_12]);
                }
                $check_box_13 = $request->input('check_box_13') ?? null;
                if (isset($check_box_13)) {
                    DB::table('privacy_policies_info_uses')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => $check_box_13]);
                }
                $check_box_14 = $request->input('check_box_14') ?? null;
                if (isset($check_box_14)) {
                    DB::table('privacy_policies_info_uses')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => $check_box_14]);
                }
                $check_box_15 = $request->check_box_15 ?? null;
                if (isset($check_box_15)) {
                    DB::table('privacy_policies_info_uses')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => $check_box_15]);
                }
                $check_box_16 = $request->check_box_16 ?? null;
                if (isset($check_box_16)) {
                    DB::table('privacy_policies_info_uses')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => $check_box_16]);
                }
                $check_box_17 = $request->check_box_17 ?? null;
                if (isset($check_box_17)) {
                    DB::table('privacy_policies_info_uses')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => $check_box_17]);
                    $description = $request->input('description');
                    if (isset($description))
                    DB::table('privacy_policies_info_uses_other')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                                'description' => $description]);
                }


                DB::table('privacy_policies')
                  ->where('id', $privacy_policy_id)
                  ->update(['current_step' => 4]);


                break;

            case '5':
                $check_box_1 = $request->input('check_box_1') ?? null;
                if (isset($check_box_1)) {
                    DB::table('privacy_policies_share_circumstances')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => $check_box_1]);
                }
                $check_box_2 = $request->input('check_box_2') ?? null;
                if (isset($check_box_2)) {
                    DB::table('privacy_policies_share_circumstances')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => $check_box_2]);
                }
                $check_box_3 = $request->input('check_box_3') ?? null;
                if (isset($check_box_3)) {
                    DB::table('privacy_policies_share_circumstances')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => $check_box_3]);
                }
                $check_box_4 = $request->input('check_box_4') ?? null;
                if (isset($check_box_4)) {
                    DB::table('privacy_policies_share_circumstances')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => $check_box_4]);
                }
                $check_box_5 = $request->input('check_box_5') ?? null;
                if (isset($check_box_5)) {
                    DB::table('privacy_policies_share_circumstances')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => $check_box_5]);
                }
                $check_box_6 = $request->input('check_box_6') ?? null;
                if (isset($check_box_6)) {
                    DB::table('privacy_policies_share_circumstances')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => $check_box_6]);
                }
                $check_box_7 = $request->input('check_box_7') ?? null;
                if (isset($check_box_7)) {
                    DB::table('privacy_policies_share_circumstances')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => $check_box_7]);
                }
                $check_box_8 = $request->input('check_box_8') ?? null;
                if (isset($check_box_8)) {
                    DB::table('privacy_policies_share_circumstances')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => $check_box_8]);
                }
                $check_box_9 = $request->input('check_box_9') ?? null;
                if (isset($check_box_9)) {
                    DB::table('privacy_policies_share_circumstances')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => $check_box_9]);
                }
                $check_box_10 = $request->input('check_box_10') ?? null;
                if (isset($check_box_10)) {
                    DB::table('privacy_policies_share_circumstances')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => $check_box_10]);
                    $description = $request->input('description');
                    if (isset($description)) {
                       DB::table('privacy_policies_share_circumstances_other')
                         ->insert(['privacy_policy_id' => $privacy_policy_id,
                                'description' => $description]);
                    }
                }


                DB::table('privacy_policies')
                  ->where('id', $privacy_policy_id)
                  ->update(['current_step' => 5]);

                break;

            case '6':
                $check_box_1 = $request->input('check_box_1') ?? null;
                if (isset($check_box_1)) {
                    DB::table('privacy_policies_stop_methods')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'stop_method_id' => $check_box_id_1]);
                }
                $check_box_2 = $request->input('check_box_2') ?? null;
                if (isset($check_box_2)) {
                    DB::table('privacy_policies_stop_methods')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'stop_method_id' => $check_box_2]);
                }
                $check_box_3 = $request->input('check_box_3') ?? null;
                if (isset($check_box_3)) {
                    DB::table('privacy_policies_stop_methods')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'stop_method_id' => $check_box_3]);
                }
                $check_box_4 = $request->input('check_box_4') ?? null;
                if (isset($check_box_4)) {
                    DB::table('privacy_policies_stop_methods')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'stop_method_id' => $check_box_4]);
                }
                $check_box_5 = $request->input('check_box_5') ?? null;
                if (isset($check_box_5)) {
                    DB::table('privacy_policies_stop_methods')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'stop_method_id' => $check_box_5]);
                    $description = $request->input('description');
                    if (isset($description)) {
                      DB::table('privacy_policies_stop_methods_other')
                        ->insert(['privacy_policy_id' => $privacy_policy_id,
                                'description' => $description]);
                    }
                }

                DB::table('privacy_policies')
                  ->where('id', $privacy_policy_id)
                  ->update(['current_step' => 6,
                          'completed' => 1]);

                break;
        }

        $previous_step = (int) $step - 1;
        $next_step = (int) $step + 1;
        $previous = $request->input('previous') ?? null;
        $next = $request->input('next') ?? null;
        $save = $request->input('save') ?? null;

        if (isset($previous)) {
          return redirect()->action('PrivacyPolicyController@editStep', ['$step' => $previous_step]);
        } elseif (isset($next) && $privacy_policy->completed == 1) {
            return redirect()->action('PrivacyPolicyController@editStep', ['step' => $next_step]);
        } elseif (isset($next) && ($next_step > $current_step)) {
            return redirect()->action('PrivacyPolicyController@createStep', ['step' => $next_step]);
        } else {
          return redirect('home');
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
    public function editStep(Request $request, $step)
    {
        $user = $request->user();

        $company = $user->company()->first();

        $company_id = $company->id;

        $privacy_policy = $company->privacyPolicy()->first();

        $privacy_policy_id = $privacy_policy->id;

        switch ($step) {
            case '1':
                $check_boxes = DB::table('personal_info_collected')
                                             ->select('id', 'info')
                                             ->orderBy('order')
                                             ->get();

                $check_boxes_selected = DB::table('privacy_policies_personal_info_collected')
                                          ->select('personal_info_collected_id as id')
                                          ->where('privacy_policy_id', $privacy_policy_id)
                                          ->get();

                $description = DB::table('privacy_policies_personal_info_other')
                                ->select('description')
                                ->where('privacy_policy_id', $privacy_policy_id)
                                ->first();
                break;

            case '2':
                $check_boxes = DB::table('additional_info')
                                             ->select('id', 'info')
                                             ->orderBy('order')
                                             ->get();

                $check_boxes_selected = DB::table('privacy_policies_additional_info')
                                             ->select('additional_info_id as id')
                                             ->where('privacy_policy_id', $privacy_policy_id)
                                             ->get();

                $description = DB::table('privacy_policies_additional_info_other')
                                ->select('description')
                                ->where('privacy_policy_id', $privacy_policy_id)
                                ->first();
                break;

            case '3':
                $check_boxes = DB::table('info_channels')
                                             ->select('id', 'channel')
                                             ->orderBy('order')
                                             ->get();

                $check_boxes_selected = DB::table('privacy_policies_info_channels')
                                             ->select('info_channel_id as id')
                                             ->where('privacy_policy_id', $privacy_policy_id)
                                             ->get();

                $description = DB::table('privacy_policies_info_channels_other')
                                ->select('description')
                                ->where('privacy_policy_id', $privacy_policy_id)
                                ->first();

                break;
            
            case '4':
                $check_boxes = DB::table('info_uses')
                                             ->select('id', 'use')
                                             ->orderBy('order')
                                             ->get();

                $check_boxes_selected = DB::table('privacy_policies_info_uses')
                                             ->select('info_use_id as id')
                                             ->where('privacy_policy_id', $privacy_policy_id)
                                             ->get();
                
                $description = DB::table('privacy_policies_info_uses_other')
                                ->select('description')
                                ->where('privacy_policy_id', $privacy_policy_id)
                                ->first();

                break;

            case '5':
                $check_boxes = DB::table('share_circumstances')
                                             ->select('id', 'circumstance')
                                             ->orderBy('order')
                                             ->get();

                $check_boxes_selected = DB::table('privacy_policies_share_circumstances')
                                             ->select('share_circumstance_id as id')
                                             ->where('privacy_policy_id', $privacy_policy_id)
                                             ->get();

                $description = DB::table('privacy_policies_share_circumstances_other')
                                ->select('description')
                                ->where('privacy_policy_id', $privacy_policy_id)
                                ->first();
                break;

            case '6':
                $check_boxes = DB::table('stop_methods')
                                             ->select('id', 'method')
                                             ->orderBy('order')
                                             ->get();

                $check_boxes_selected = DB::table('privacy_policies_stop_methods')
                                             ->select('stop_method_id as id')
                                             ->where('privacy_policy_id', $privacy_policy_id)
                                             ->get();

                $description = DB::table('privacy_policies_stop_methods_other')
                                ->select('description')
                                ->where('privacy_policy_id', $privacy_policy_id)
                                ->first();

                break;
        }

        if (count($check_boxes_selected)) {
          foreach ($check_boxes_selected as $check_box_selected) {
            $arr_check_boxes_selected[$check_box_selected->id] = $check_box_selected->id;
          }
        }

        return view('privacy_policy.steps.step_' . $step, compact('company_id', 'check_boxes', 'check_boxes_selected', 'arr_check_boxes_selected', 'description'));
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
        $company_id = $request->input('company_id');

        $privacy_policy = PrivacyPolicy::where('company_id', $company_id)->first();

        $privacy_policy_id = $privacy_policy->id;

        switch ($step) {
            case '1':
                $check_box_1 = $request->input('check_box_1') ?? null;
              
                $record = DB::table('privacy_policies_personal_info_collected')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('personal_info_collected_id', 1)
                            ->get();

                if (count($record) && is_null($check_box_1)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('personal_info_collected_id', 1)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_1)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => 1]);
                }

                $check_box_2 = $request->input('check_box_2') ?? null;
                $record = DB::table('privacy_policies_personal_info_collected')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('personal_info_collected_id', 2)
                            ->get();

                if (count($record) && !isset($check_box_2)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('personal_info_collected_id', 2)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_2)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => 2]);
                }
                
                $check_box_3 = $request->input('check_box_3') ?? null;
                $record = DB::table('privacy_policies_personal_info_collected')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('personal_info_collected_id', 3)
                            ->get();

                if (count($record) && !isset($check_box_3)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('personal_info_collected_id', 3)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_3)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => 3]);
                }
                $check_box_4 = $request->input('check_box_4') ?? null;
                $record = DB::table('privacy_policies_personal_info_collected')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('personal_info_collected_id', 4)
                            ->get();

                if (count($record) && !isset($check_box_4)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('personal_info_collected_id', 4)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_4)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => 4]);
                }
                $check_box_5 = $request->input('check_box_id_5') ?? null;
                $record = DB::table('privacy_policies_personal_info_collected')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('personal_info_collected_id', 5)
                            ->get();

                if (count($record) && !isset($check_box_5)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('personal_info_collected_id', 5)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_5)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => 5]);
                }
                $check_box_6 = $request->input('check_box_6') ?? null;
                $record = DB::table('privacy_policies_personal_info_collected')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('personal_info_collected_id', 6)
                            ->get();

                if (count($record) && !isset($check_box_6)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('personal_info_collected_id', 6)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_6)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => 6]);
                }
                $check_box_7 = $request->input('check_box_7') ?? null;
                $record = DB::table('privacy_policies_personal_info_collected')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('personal_info_collected_id', 7)
                            ->get();

                if (count($record) && !isset($check_box_7)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('personal_info_collected_id', 7)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_7)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => 7]);
                }
                $check_box_8 = $request->input('check_box_8') ?? null;
                $record = DB::table('privacy_policies_personal_info_collected')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('personal_info_collected_id', 8)
                            ->get();

                if (count($record) && !isset($check_box_8)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('personal_info_collected_id', 8)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_8)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => 8]);
                }
                $check_box_9 = $request->input('check_box_9') ?? null;
                $record = DB::table('privacy_policies_personal_info_collected')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('personal_info_collected_id', 9)
                            ->get();

                if (count($record) && !isset($check_box_9)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('personal_info_collected_id', 9)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_9)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => 9]);
                }
                $check_box_10 = $request->input('check_box_10') ?? null;
                $record = DB::table('privacy_policies_personal_info_collected')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('personal_info_collected_id', 10)
                            ->get();

                if (count($record) && !isset($check_box_10)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('personal_info_collected_id', 10)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_10)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => 10]);
                }
                $check_box_11 = $request->input('check_box_11') ?? null;
                $record = DB::table('privacy_policies_personal_info_collected')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('personal_info_collected_id', 11)
                            ->get();

                if (count($record) && !isset($check_box_11)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('personal_info_collected_id', 11)
                    ->delete();

                  DB::table('privacy_policies_personal_info_other')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->delete();

                } elseif (count($record) == 0 && isset($check_box_11)) {
                  DB::table('privacy_policies_personal_info_collected')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'personal_info_collected_id' => 11]);

                  $description = $request->input('description') ?? null;
                  if (isset($description)) {
                    DB::table('privacy_policies_personal_info_other')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                                'description' => $description]);
                  }
                }
                
                break;

            case '2':
                $check_box_1 = $request->input('check_box_1') ?? null;
                $record = DB::table('privacy_policies_additional_info')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('additional_info_id', 1)
                            ->get();

                if (count($record) && !isset($check_box_1)) {
                  DB::table('privacy_policies_additional_info')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('additional_info_id', 1)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_1)) {
                  DB::table('privacy_policies_additional_info')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => 1]);
                }
                $check_box_2 = $request->input('check_box_2') ?? null;
                $record = DB::table('privacy_policies_additional_info')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('additional_info_id', 2)
                            ->get();

                if (count($record) && !isset($check_box_2)) {
                  DB::table('privacy_policies_additional_info')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('additional_info_id', 2)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_2)) {
                  DB::table('privacy_policies_additional_info')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => 2]);
                }
                $check_box_3 = $request->input('check_box_3') ?? null;
                $record = DB::table('privacy_policies_additional_info')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('additional_info_id', 3)
                            ->get();

                if (count($record) && !isset($check_box_1)) {
                  DB::table('privacy_policies_additional_info')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('additional_info_id', 3)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_3)) {
                  DB::table('privacy_policies_additional_info')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => 3]);
                }
                $check_box_4 = $request->input('check_box_4') ?? null;
                $record = DB::table('privacy_policies_additional_info')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('additional_info_id', 4)
                            ->get();

                if (count($record) && !isset($check_box_4)) {
                  DB::table('privacy_policies_additional_info')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('additional_info_id', 4)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_4)) {
                  DB::table('privacy_policies_additional_info')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => 4]);
                }
                $check_box_5 = $request->input('check_box_5') ?? null;
                $record = DB::table('privacy_policies_additional_info')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('additional_info_id', 5)
                            ->get();

                if (count($record) && !isset($check_box_5)) {
                  DB::table('privacy_policies_additional_info')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('additional_info_id', 5)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_5)) {
                  DB::table('privacy_policies_additional_info')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => 5]);
                }
                $check_box_6 = $request->input('check_box_6') ?? null;
                $record = DB::table('privacy_policies_additional_info')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('additional_info_id', 6)
                            ->get();

                if (count($record) && !isset($check_box_6)) {
                  DB::table('privacy_policies_additional_info')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('additional_info_id', 6)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_6)) {
                  DB::table('privacy_policies_additional_info')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => 6]);
                }
                $check_box_7 = $request->input('check_box_7') ?? null;
                $record = DB::table('privacy_policies_additional_info')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('additional_info_id', 7)
                            ->get();

                if (count($record) && !isset($check_box_7)) {
                  DB::table('privacy_policies_additional_info')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('additional_info_id', 7)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_7)) {
                  DB::table('privacy_policies_additional_info')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => 7]);
                }
                $check_box_8 = $request->input('check_box_8') ?? null;
                $record = DB::table('privacy_policies_additional_info')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('additional_info_id', 8)
                            ->get();

                if (count($record) && !isset($check_box_8)) {
                  DB::table('privacy_policies_additional_info')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('additional_info_id', 8)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_8)) {
                  DB::table('privacy_policies_additional_info')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => 8]);
                }
                $check_box_9 = $request->input('check_box_9') ?? null;
                $record = DB::table('privacy_policies_additional_info')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('additional_info_id', 9)
                            ->get();

                if (count($record) && !isset($check_box_9)) {
                  DB::table('privacy_policies_additional_info')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('additional_info_id', 9)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_9)) {
                  DB::table('privacy_policies_additional_info')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => 9]);
                }
                $check_box_10 = $request->input('check_box_10') ?? null;
                $record = DB::table('privacy_policies_additional_info')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('additional_info_id', 10)
                            ->get();

                if (count($record) && !isset($check_box_10)) {
                  DB::table('privacy_policies_additional_info')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('additional_info_id', 10)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_10)) {
                  DB::table('privacy_policies_additional_info')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => 10]);
                }
                $check_box_11 = $request->input('check_box_11') ?? null;
                $record = DB::table('privacy_policies_additional_info')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('additional_info_id', 11)
                            ->get();

                if (count($record) && !isset($check_box_11)) {
                  DB::table('privacy_policies_additional_info')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('additional_info_id', 11)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_11)) {
                  DB::table('privacy_policies_additional_info')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => 11]);
                }
                $check_box_12 = $request->input('check_box_12') ?? null;
                $record = DB::table('privacy_policies_additional_info')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('additional_info_id', 12)
                            ->get();

                if (count($record) && !isset($check_box_12)) {
                  DB::table('privacy_policies_additional_info')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('additional_info_id', 12)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_12)) {
                  DB::table('privacy_policies_additional_info')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => 12]);
                }
                $check_box_13 = $request->input('check_box_13') ?? null;
                $record = DB::table('privacy_policies_additional_info')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('additional_info_id', 13)
                            ->get();

                if (count($record) && !isset($check_box_13)) {
                  DB::table('privacy_policies_additional_info')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('additional_info_id', 13)
                    ->delete();

                   DB::table('privacy_policies_additional_info_other')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->delete();

                } elseif (count($record) == 0 && isset($check_box_13)) {
                  DB::table('privacy_policies_additional_info')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'additional_info_id' => 13]);

                  $description = $request->input('description') ?? null;
                  if (isset($description)) {
                    DB::table('privacy_policies_additional_info_other')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                                'description' => $description]);
                  }
                }

                DB::table('privacy_policies')
                  ->where('id', $privacy_policy_id)
                  ->update(['current_step' => 2]);

                break;

            case '3':
                $check_box_1 = $request->input('check_box_1') ?? null;
                $record = DB::table('privacy_policies_info_channels')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_channel_id', 1)
                            ->get();

                if (count($record) && !isset($check_box_1)) {
                  DB::table('privacy_policies_info_channels')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_channel_id', 1)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_1)) {
                  DB::table('privacy_policies_info_channels')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_channel_id' => 1]);
                }
                $check_box_2 = $request->input('check_box_2') ?? null;
                $record = DB::table('privacy_policies_info_channels')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_channel_id', 2)
                            ->get();

                if (count($record) && !isset($check_box_2)) {
                  DB::table('privacy_policies_info_channels')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_channel_id', 2)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_2)) {
                  DB::table('privacy_policies_info_channels')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_channel_id' => 2]);
                }
                $check_box_3 = $request->input('check_box_3') ?? null;
                $record = DB::table('privacy_policies_info_channels')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_channel_id', 3)
                            ->get();

                if (count($record) && !isset($check_box_3)) {
                  DB::table('privacy_policies_info_channels_')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_channel_id', 3)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_3)) {
                  DB::table('privacy_policies_info_channels')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_channel_id' => 3]);
                }
                $check_box_4 = $request->input('check_box_4') ?? null;
                $record = DB::table('privacy_policies_info_channels')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_channel_id', 4)
                            ->get();

                if (count($record) && !isset($check_box_4)) {
                  DB::table('privacy_policies_info_channels')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_channel_id', 4)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_4)) {
                  DB::table('privacy_policies_info_channels')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_channel_id' => 4]);
                }
                $check_box_5 = $request->input('check_box_5') ?? null;
                $record = DB::table('privacy_policies_info_channels')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_channel_id', 5)
                            ->get();

                if (count($record) && !isset($check_box_5)) {
                  DB::table('privacy_policies_info_channels')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_channel_id', 5)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_5)) {
                  DB::table('privacy_policies_info_channels')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_channel_id' => 5]);
                }
                $check_box_6 = $request->input('check_box_6') ?? null;
                $record = DB::table('privacy_policies_info_channels')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_channel_id', 6)
                            ->get();

                if (count($record) && !isset($check_box_6)) {
                  DB::table('privacy_policies_info_channels')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_channel_id', 6)
                    ->delete();

                  DB::table('privacy_policies_info_channels_other')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->delete();

                } elseif (count($record) == 0 && isset($check_box_6)) {
                  DB::table('privacy_policies_info_channels')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_channel_id' => 6]);

                  $description = $request->input('description') ?? null;
                  if (isset($description)) {
                     DB::table('privacy_policies_info_channels_other')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                                'description' => $description]);
                  }
                }


                DB::table('privacy_policies')
                  ->where('id', $privacy_policy_id)
                  ->update(['current_step' => 3]);

                break;
            
            case '4':
                $check_box_1 = $request->input('check_box_1') ?? null;
                $record = DB::table('privacy_policies_info_uses')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_use_id', 1)
                            ->get();

                if (count($record) && !isset($check_box_1)) {
                  DB::table('privacy_policies_info_uses')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_use_id', 1)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_1)) {
                  DB::table('privacy_policies_info_uses')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => 1]);
                }
                $check_box_2 = $request->input('check_box_2') ?? null;
                $record = DB::table('privacy_policies_info_uses')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_use_id', 2)
                            ->get();

                if (count($record) && !isset($check_box_2)) {
                  DB::table('privacy_policies_info_uses')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_use_id', 2)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_2)) {
                  DB::table('privacy_policies_info_uses')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => 2]);
                }
                $check_box_3 = $request->input('check_box_3') ?? null;
                $record = DB::table('privacy_policies_info_uses')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_use_id', 3)
                            ->get();

                if (count($record) && !isset($check_box_3)) {
                  DB::table('privacy_policies_info_uses')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_use_id', 3)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_3)) {
                  DB::table('privacy_policies_info_uses')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => 3]);
                }
                $check_box_4 = $request->input('check_box_4') ?? null;
                $record = DB::table('privacy_policies_info_uses')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_use_id', 4)
                            ->get();

                if (count($record) && !isset($check_box_4)) {
                  DB::table('privacy_policies_info_uses')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_use_id', 4)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_4)) {
                  DB::table('privacy_policies_info_uses')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => 4]);
                }
                $check_box_5 = $request->input('check_box_5') ?? null;
                $record = DB::table('privacy_policies_info_uses')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_use_id', 5)
                            ->get();

                if (count($record) && !isset($check_box_5)) {
                  DB::table('privacy_policies_info_uses')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_use_id', 5)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_5)) {
                  DB::table('privacy_policies_info_uses')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => 5]);
                }
                $check_box_6 = $request->input('check_box_6') ?? null;
                $record = DB::table('privacy_policies_info_uses')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_use_id', 6)
                            ->get();

                if (count($record) && !isset($check_box_6)) {
                  DB::table('privacy_policies_info_uses')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_use_id', 6)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_6)) {
                  DB::table('privacy_policies_info_uses')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => 6]);
                }
                $check_box_7 = $request->input('check_box_7') ?? null;
                $record = DB::table('privacy_policies_info_uses')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_use_id', 7)
                            ->get();

                if (count($record) && !isset($check_box_7)) {
                  DB::table('privacy_policies_info_uses')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_use_id', 7)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_7)) {
                  DB::table('privacy_policies_info_uses')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => 7]);
                }
                $check_box_8 = $request->input('check_box_8') ?? null;
                $record = DB::table('privacy_policies_info_uses')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_use_id', 8)
                            ->get();

                if (count($record) && !isset($check_box_8)) {
                  DB::table('privacy_policies_info_uses')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_use_id', 8)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_8)) {
                  DB::table('privacy_policies_info_uses')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => 8]);
                }
                $check_box_9 = $request->input('check_box_9') ?? null;
                $record = DB::table('privacy_policies_info_uses')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_use_id', 9)
                            ->get();

                if (count($record) && !isset($check_box_9)) {
                  DB::table('privacy_policies_info_uses')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_use_id', 9)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_9)) {
                  DB::table('privacy_policies_info_uses')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => 9]);
                }
                $check_box_10 = $request->input('check_box_10') ?? null;
                $record = DB::table('privacy_policies_info_uses')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_use_id', 10)
                            ->get();

                if (count($record) && !isset($check_box_10)) {
                  DB::table('privacy_policies_info_uses')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_use_id', 10)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_10)) {
                  DB::table('privacy_policies_info_uses')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => 10]);
                }
                $check_box_11 = $request->input('check_box_11') ?? null;
                $record = DB::table('privacy_policies_info_uses')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_use_id', 11)
                            ->get();

                if (count($record) && !isset($check_box_11)) {
                  DB::table('privacy_policies_info_uses')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_use_id', 11)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_11)) {
                  DB::table('privacy_policies_info_uses')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => 11]);
                }
                $check_box_12 = $request->input('check_box_12') ?? null;
                $record = DB::table('privacy_policies_info_uses')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_use_id', 12)
                            ->get();

                if (count($record) && !isset($check_box_12)) {
                  DB::table('privacy_policies_info_uses')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_use_id', 12)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_12)) {
                  DB::table('privacy_policies_info_uses')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => 12]);
                }
                $check_box_13 = $request->input('check_box_13') ?? null;
                $record = DB::table('privacy_policies_info_uses')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_use_id', 13)
                            ->get();

                if (count($record) && !isset($check_box_13)) {
                  DB::table('privacy_policies_info_uses')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_use_id', 13)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_13)) {
                  DB::table('privacy_policies_info_uses')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => 13]);
                }
                $check_box_14 = $request->input('check_box_14') ?? null;
                $record = DB::table('privacy_policies_info_uses')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_use_id', 14)
                            ->get();

                if (count($record) && !isset($check_box_14)) {
                  DB::table('privacy_policies_info_uses')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_use_id', 14)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_14)) {
                  DB::table('privacy_policies_info_uses')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => 14]);
                }
                $check_box_15 = $request->check_box_15 ?? null;
                $record = DB::table('privacy_policies_info_uses')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_use_id', 15)
                            ->get();

                if (count($record) && !isset($check_box_15)) {
                  DB::table('privacy_policies_info_uses')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_use_id', 15)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_15)) {
                  DB::table('privacy_policies_info_uses')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => 15]);
                }
                $check_box_16 = $request->check_box_16 ?? null;
                $record = DB::table('privacy_policies_info_uses')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_use_id', 16)
                            ->get();

                if (count($record) && !isset($check_box_16)) {
                  DB::table('privacy_policies_info_uses')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_use_id', 16)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_16)) {
                  DB::table('privacy_policies_info_uses')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => 16]);
                }
                $check_box_17 = $request->check_box_17 ?? null;
                $record = DB::table('privacy_policies_info_uses')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('info_use_id', 17)
                            ->get();

                if (count($record) && !isset($check_box_17)) {
                  DB::table('privacy_policies_info_uses')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('info_use_id', 17)
                    ->delete();

                  DB::table('privacy_policies_info_uses_other')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->delete();

                } elseif (count($record) == 0 && isset($check_box_17)) {
                  DB::table('privacy_policies_info_uses')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'info_use_id' => 17]);

                  $description = $request->input('description') ?? null;
                  if (isset($description)) {
                    DB::table('privacy_policies_info_uses_other')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                                'description' => $description]);
                  }
                }


                DB::table('privacy_policies')
                  ->where('id', $privacy_policy_id)
                  ->update(['current_step' => 4]);


                break;

            case '5':
                $check_box_1 = $request->input('check_box_1') ?? null;
                $record = DB::table('privacy_policies_share_circumstances')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('share_circumstance_id', 1)
                            ->get();

                if (count($record) && !isset($check_box_1)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('share_circumstance_id', 1)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_1)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => 1]);
                }
                $check_box_2 = $request->input('check_box_2') ?? null;
                $record = DB::table('privacy_policies_share_circumstances')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('share_circumstance_id', 2)
                            ->get();

                if (count($record) && !isset($check_box_2)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('share_circumstance_id', 2)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_2)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => 2]);
                }
                $check_box_3 = $request->input('check_box_3') ?? null;
                $record = DB::table('privacy_policies_share_circumstances')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('share_circumstance_id', 3)
                            ->get();

                if (count($record) && !isset($check_box_3)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('share_circumstance_id', 3)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_3)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => 3]);
                }
                $check_box_4 = $request->input('check_box_4') ?? null;
                $record = DB::table('privacy_policies_share_circumstances')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('share_circumstance_id', 4)
                            ->get();

                if (count($record) && !isset($check_box_4)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('share_circumstance_id', 4)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_4)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => 4]);
                }
                $check_box_5 = $request->input('check_box_5') ?? null;
                $record = DB::table('privacy_policies_share_circumstances')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('share_circumstance_id', 5)
                            ->get();

                if (count($record) && !isset($check_box_5)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('share_circumstance_id', 5)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_5)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => 5]);
                }
                $check_box_6 = $request->input('check_box_6') ?? null;
                $record = DB::table('privacy_policies_share_circumstances')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('share_circumstance_id', 6)
                            ->get();

                if (count($record) && !isset($check_box_6)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('share_circumstance_id', 6)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_6)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => 6]);
                }
                $check_box_7 = $request->input('check_box_7') ?? null;
                $record = DB::table('privacy_policies_share_circumstances')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('share_circumstance_id', 7)
                            ->get();

                if (count($record) && !isset($check_box_7)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('share_circumstance_id', 7)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_7)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => 7]);
                }
                $check_box_8 = $request->input('check_box_8') ?? null;
                $record = DB::table('privacy_policies_share_circumstances')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('share_circumstance_id', 8)
                            ->get();

                if (count($record) && !isset($check_box_8)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('share_circumstance_id', 8)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_8)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => 8]);
                }
                $check_box_9 = $request->input('check_box_9') ?? null;
                $record = DB::table('privacy_policies_share_circumstances')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('share_circumstance_id', 9)
                            ->get();

                if (count($record) && !isset($check_box_9)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('share_circumstance_id', 9)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_9)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => 9]);
                }
                $check_box_10 = $request->input('check_box_10') ?? null;
                $record = DB::table('privacy_policies_share_circumstances')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('share_circumstance_id', 10)
                            ->get();

                if (count($record) && !isset($check_box_10)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('share_circumstance_id', 10)
                    ->delete();

                  DB::table('privacy_policies_share_circumstances_other')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_10)) {
                  DB::table('privacy_policies_share_circumstances')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'share_circumstance_id' => 10]);

                  $description = $request->input('description') ?? null;

                  if (isset($description)) {
                    DB::table('privacy_policies_share_circumstances_other')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                                'description' => $description]);
                  }
                }


                DB::table('privacy_policies')
                  ->where('id', $privacy_policy_id)
                  ->update(['current_step' => 5]);

                break;

            case '6':
                $check_box_1 = $request->input('check_box_1') ?? null;
                $record = DB::table('privacy_policies_stop_methods')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('stop_method_id', 1)
                            ->get();

                if (count($record) && !isset($check_box_1)) {
                  DB::table('privacy_policies_stop_methods')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('stop_method_id', 1)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_1)) {
                  DB::table('privacy_policies_stop_methods')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'stop_method_id' => 1]);
                }
                $check_box_2 = $request->input('check_box_2') ?? null;
                $record = DB::table('privacy_policies_stop_methods')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('stop_method_id', 2)
                            ->get();

                if (count($record) && !isset($check_box_2)) {
                  DB::table('privacy_policies_stop_methods')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('stop_method_id', 2)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_2)) {
                  DB::table('privacy_policies_stop_methods')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'stop_method_id' => 2]);
                }
                $check_box_3 = $request->input('check_box_3') ?? null;
                $record = DB::table('privacy_policies_stop_methods')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('stop_method_id', 3)
                            ->get();

                if (count($record) && !isset($check_box_3)) {
                  DB::table('privacy_policies_stop_methods')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('stop_method_id', 3)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_3)) {
                  DB::table('privacy_policies_stop_methods')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'stop_method_id' => 3]);
                }
                $check_box_4 = $request->input('check_box_4') ?? null;
                $record = DB::table('privacy_policies_stop_methods')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('stop_method_id', 4)
                            ->get();

                if (count($record) && !isset($check_box_4)) {
                  DB::table('privacy_policies_stop_methods')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('stop_method_id', 4)
                    ->delete();
                } elseif (count($record) == 0 && isset($check_box_4)) {
                  DB::table('privacy_policies_stop_methods')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'stop_method_id' => 4]);
                }
                $check_box_5 = $request->input('check_box_5') ?? null;
                $record = DB::table('privacy_policies_stop_methods')
                            ->select('*')
                            ->where('privacy_policy_id', $privacy_policy_id)
                            ->where('stop_method_id', 5)
                            ->get();

                if (count($record) && !isset($check_box_5)) {
                  DB::table('privacy_policies_stop_methods')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->where('stop_method_id', 5)
                    ->delete();

                  DB::table('privacy_policies_stop_methods_other')
                    ->where('privacy_policy_id', $privacy_policy_id)
                    ->delete();

                } elseif (count($record) == 0 && isset($check_box_5)) {
                  DB::table('privacy_policies_stop_methods')
                    ->insert(['privacy_policy_id' => $privacy_policy_id,
                        'stop_method_id' => 5]);

                  $description = $request->input('description') ?? null;
                  if (isset($description)) {
                    DB::table('privacy_policies_stop_methods_other')
                      ->insert(['privacy_policy_id' => $privacy_policy_id,
                                'description' => $description]);
                  }
                }

                DB::table('privacy_policies')
                  ->where('id', $privacy_policy_id)
                  ->update(['current_step' => 6,
                          'completed' => 1]);

                break;
        }

        $current_step = (int) $step;
        $previous_step = (int) $step - 1;
        $next_step = (int) $step + 1;
        $previous = $request->input('previous') ?? null;
        $next = $request->input('next') ?? null;
        $save = $request->input('save') ?? null;

        if (isset($previous)) {
          return redirect()->action('PrivacyPolicyController@editStep', ['step' => $previous_step]);
        } elseif (isset($next) && $privacy_policy->completed == 1) {
            return redirect()->action('PrivacyPolicyController@editStep', ['step' => $next_step]);
        } elseif (isset($next) && ($next_step > $current_step)) {
            return redirect()->action('PrivacyPolicyController@editStep', ['step' => $next_step]);
        } else {
          return redirect('home');
        }
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
