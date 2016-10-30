@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #f5f5f5;"><h3>UAV Specific Website Agreements - Copyright Policy</h3></div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'copyright-policy.store', 'class'=> 'form-horizontal', 'role' => 'form']) !!}
                          <p>
                            You can either act as your own DMCA agent or retain Traverse Legal to act as 
                            the DMCA agent on your behalf.  
                            For Traverse Legal 
                            to act as your DMCA agent, the first year is $390, which includes our service 
                            as designated agent for 1 year and Copyright Office filing fees.  
                            Renewal notices will be sent at the end of one year, with 
                            yearly renewal of Traverse Legal as DMCA Agent for $250.
                          </p>
                          <div class="radio">
                            <label>
                              <input type="radio" name="options_dmca" id="options_dmca1" value="0" checked>
                              Retain Traverse Legal
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" name="options_dmca" id="options_dmca1mca2" value="1">
                              Act as your own DMCA agent
                            </label>
                          </div>
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
