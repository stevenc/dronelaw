@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #f5f5f5;"><h3>UAV Specific Website Agreements - Privacy Policy - Step 3</h3></div>
                    <div class="panel-body">
                        {!! Form::open(['action' ->['PrivacyPolicyController@getStep', 6], 'class'=> 'form-horizontal', 'role' => 'form']]) !!}
                          <p>
                            Select those options that apply.
                          </p>
                          {!! Form::hidden('company_id', $company_id) !!}
                          @foreach ($check_boxes as $check_box)
                          <div class="checkbox">
                            {!! Form::label($check_box->method, $check_box->method) !!}       
                          </div>
                            <div class="checkbox">
                              {!! Form::checkbox($check_box->method, $check_box->id) !!} 
                            </div>
                          @endforeach
                          {!! Form::textarea('stop_method_other', ['class' => 'form-control', 'rows' => '3']) !!}
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
