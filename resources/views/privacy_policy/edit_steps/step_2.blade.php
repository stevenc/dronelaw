@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #f5f5f5;"><h3>UAV Specific Website Agreements - Privacy Policy - Step 2</h3></div>
                    <div class="panel-body">
                        {!! Form::open(['action' ->['PrivacyPolicyController@updateStep', 2], 'class'=> 'form-horizontal', 'role' => 'form']]) !!}
                          <p>
                            Select those options that apply.
                          </p>
                          {!! Form::hidden('company_id', $company_id) !!}
                          @foreach ($additional_info as $info)
                          <div class="checkbox">
                            {!! Form::label($info->info, $info->info) !!}       
                          </div>
                            <div class="checkbox">
                              @foreach ($policy__additional_info_selected as $additional_info_selected)
                                @if ($additional_info_selected->$additional_info_id == $info->id)
                                 {!! Form::checkbox($info->info, $info->id, true) !!} 
                                @else
                                  {!! Form::checkbox($info->info, $info->id) !!}
                                @endif
                              @endforeach
                            </div>
                          @endforeach
                          {!! Form::textarea('additional_info_other', [class => "form-control", rows => "3"]) !!}
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
