@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #f5f5f5;"><h3>UAV Specific Website Agreements - Privacy Policy - Step 3</h3></div>
                    <div class="panel-body">
                        {!! Form::open(['route' ->['privacy-policy.postStep', 5], 'class'=> 'form-horizontal', 'role' => 'form']]) !!}
                          <p>
                            Select those options that apply.
                          </p>
                          {!! Form::hidden('company_id', $company_id) !!}
                          @foreach ($share_circumstances as $share_circumstance)
                          <div class="checkbox">
                            {!! Form::label($share_circumstance->circumstance, $share_circumstance->circumstance) !!}       
                          </div>
                            <div class="checkbox">
                              {!! Form::checkbox($share_circumstance->circumstance, $share_circumstance->id) !!} 
                            </div>
                          @endforeach
                          {!! Form::textarea('share_circumstance_other', [class => "form-control", rows => "3"]) !!}
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
