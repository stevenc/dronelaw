@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #f5f5f5;"><h3>UAV Specific Website Agreements - Privacy Policy - Step 3</h3></div>
                    <div class="panel-body">
                        {!! Form::open(['action' ->['PrivacyPolicyController@updateStep', 3], 'class'=> 'form-horizontal', 'role' => 'form']]) !!}
                          <p>
                            Select those options that apply.
                          </p>
                          {!! Form::hidden('company_id', $company_id) !!}
                          @foreach ($info_channels as $info_channel)
                          <div class="checkbox">
                            {!! Form::label($info_channel->channel, $info_channel->channel) !!}       
                          </div>
                            <div class="checkbox">
                              @foreach ($policy_info_channel_selected as $info_channel_selected)
                                @if ($info_channel_selected->info_channel_id == $info_channel->id)
                                  {!! Form::checkbox($info_channel->channel, $info_channel->id, true) !!} 
                                @else
                                  {!! Form::checkbox($info_channel->channel, $info_channel->id) !!} 
                                @endif
                              @endforeach
                            </div>
                          @endforeach
                          {!! Form::textarea('info_channel_other', [class => "form-control", rows => "3"]) !!}
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
