@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #f5f5f5;"><h3>UAV Specific Website Agreements - Privacy Policy - Step 3</h3></div>
                    <div class="panel-body">
                        {!! Form::open(['route' ->['privacy-policy.postStep', 4], 'class'=> 'form-horizontal', 'role' => 'form']]) !!}
                          <p>
                            Select those options that apply.
                          </p>
                          {!! Form::hidden('company_id', $company_id) !!}
                          @foreach ($info_uses as $info_use)
                          <div class="checkbox">
                            {!! Form::label($info_use->use, $info_use->use) !!}       
                          </div>
                            <div class="checkbox">
                              {!! Form::checkbox($info_use->use, $info_use->id) !!} 
                            </div>
                          @endforeach
                          {!! Form::textarea('info_use_other', [class => "form-control", rows => "3"]) !!}
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
