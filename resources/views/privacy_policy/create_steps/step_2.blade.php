@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #f5f5f5;"><h3>UAV Specific Website Agreements - Privacy Policy - Step 2</h3></div>
                    <div class="panel-body">
                        {!! Form::open(['route' ->['privacy-policy.postStep', 2], 'class'=> 'form-horizontal', 'role' => 'form']]) !!}
                          <p>
                            Select those options that apply.
                          </p>
                          {!! Form::hidden('company_id', $company_id) !!}
                          @foreach ($additional_info as $info)
                          <div class="checkbox">
                            {!! Form::label($info->info, $info->info) !!}       
                          </div>
                            <div class="checkbox">
                              {!! Form::checkbox($info->info, $info->id) !!} 
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
