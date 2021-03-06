@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #f5f5f5;">
                  <h3>UAV Specific Website Agreements - Privacy Policy - Step 1</h3>
                </div>
                    <div class="panel-body col-md-offset-1">
                      <p>
                        <strong>Check the following that applies to your company's privacy policy.</strong>
                      </p>
                      <p>
                        {{ $company->abbreviation . ' may collect the following personal and personally identifiable information from you:' }}
                      </p>
                        {!! Form::open(['action' => ['PrivacyPolicyController@storeStep', 1], 'class'=> 'form-horizontal']) !!}
                          {!! Form::hidden('company_id', $company->id) !!}
                          @foreach ($check_boxes as $check_box)
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="{{ 'check_box_' . $check_box->id }}" id="{{ 'check_box_' . $check_box->id }}" value="{{ $check_box->id }}">
                               {{ $check_box->info }}
                              </label>
                            </div>
                          @endforeach
                          <br>
                          <div id="description" style="display:none;">
                            {!! Form::textarea('description', '', ['class' => 'form-contorl', 'rows' => 4, 'cols' => 98]) !!}
                          </div>
                          <br>
                          <button name="next" type="submit" class="btn btn-primary">Next</button>
                          <button name="save" type="submit" class="btn btn-success">Save</button>
                        {!! Form::close() !!}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
      $('#check_box_11').click(function() {
        if( $(this).is(':checked')) {
            $("#description").show();
        } else {
            $("#description").hide();
        }
      }); 
    </script>
@endpush
