@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #f5f5f5;"><h3>UAV Specific Website Agreements - Privacy Policy - Step 1</h3></div>
                    <div class="panel-body">
                        {!! Form::open(['action' ->['PrivacyPolicyController@updateStep', 1], 'class'=> 'form-horizontal', 'role' => 'form']]) !!}
                          <p>
                            Select those options that apply.
                          </p>
                          {!! Form::hidden('company_id', $company_id) !!}
                          @foreach ($personal_info_collected as $personal_info)
                          <div class="checkbox">
                            {!! Form::label($personal_info->info, $personal_info->info) !!}       
                          </div>
                            <div class="checkbox">
                              @foreach ($policy_info_selected as $info_selected)
                                @if ($info_selected->personal_info_collected_id == $personal_info->id)
                                  {!! Form::checkbox($pesonal_info->info, $personal_info->id, true) !!} 
                                @else
                                  {!! Form::checkbox($pesonal_info->info, $personal_info->id) !!} 
                                @endif
                              @endforeach
                            </div>
                          @endforeach
                          {!! Form::textarea('personal_info_other', [class => "form-control", rows => "3"]) !!}
                          <br>
                          <button type="submit" class="btn btn-primary">Save</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
