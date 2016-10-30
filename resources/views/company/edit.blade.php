@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #f5f5f5;"><h3>UAV Specific Website Agreements - Company Info</h3></div>
                    <div class="panel-body">
                       {!! Form::open(['route' => ['company.update', $company->id], 'method' => 'put', 'class'=> 'form-horizontal', 'role' => 'form']) !!}
                          <div class="form-group">
                            {!! Form::label('companyname', 'Company Name', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                              {!! Form::text('companyname', old('companyname', $company->name), ['class' => 'form-control', 'placeholder' => 'Company Name']) !!}
                            </div>
                          </div>
                          <div class="form-group">
                            {!! Form::label('abbrev', 'Company Abbreviation', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                              {!! Form::text('abbrev', old('abbrev', $company->abbreviation), ['class' => 'form-control', 'placeholder' => 'Company Abbreviation']) !!}
                            </div>
                          </div>
                          <div class="form-group">
                            {!! Form::label('domainname', 'Domain Name', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                              {!! Form::text('domainname', old('domainname', $company->domain), ['class' => 'form-control', 'placeholder' => 'Domain Name']) !!}
                            </div>
                          </div>
                          <div class="form-group">
                            {!! Form::label('desiredstate', 'Desired State', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                <select id="desiredstate" name="desiredstate" class="form-control">
                                    <option value="0">----</option>
                                    @foreach($states as $state)
                                      @if ($company_address->desired_state == $state->id)
                                        <option value="{{ $state->id }}" selected="selected">{{ $state->name }}</option>
                                      @else
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                      @endif
                                    @endforeach
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                            {!! Form::label('preferred_email', 'Preferred Email Address', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                              {!! Form::email('preferred_email', old('preferred_email', $company_address->preferred_email), ['class' => 'form-control', 'placeholder' => 'Prefered Email']) !!}
                            </div>
                          </div>
                          <div class="form-group">
                            {!! Form::label('address1', 'Company Address 1', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                              {!! Form::text('address1', old('address1', $company_address->address_1), ['class' => 'form-control', 'placeholder' => 'Address 1']) !!}
                            </div>
                          </div>
                          <div class="form-group">
                           {!! Form::label('address2', 'Company Address 2', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                              @if (isset($company_address->address_2))
                                {!! Form::text('address2', old('address2', $company_address->$address_2), ['class' => 'form-control', 'placeholder' => 'Address 2']) !!}
                              @else
                                {!! Form::text('address2', old('address2', ''), ['class' => 'form-control', 'placeholder' => 'Address 2']) !!}
                              @endif
                            </div>
                          </div>
                          <div class="form-group">
                            {!! Form::label('city', 'City', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                              {!! Form::text('city', old('city', $company_address->city), ['class' => 'form-control', 'placeholder' => 'City']) !!}
                            </div>
                          </div>
                          <div class="form-group">
                            {!! Form::label('companystate', 'Company State', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                                <select id="companystate" name="companystate" class="form-control">
                                    <option value="0">----</option>
                                    @foreach($states as $state)
                                      @if ($company_address->company_state == $state->id)
                                        <option value="{{ $state->id }}" selected="selected">{{ $state->name }}</option>
                                      @else
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                      @endif
                                    @endforeach
                                </select>
                            </div>
                          </div>
                          <div class="form-group">
                            {!! Form::label('zip', 'Zip', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="col-sm-10">
                              {!! Form::text('zip', old('zip'), ['class' => 'form-control', 'placeholder' => 'Zip Code']) !!}
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                          </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
