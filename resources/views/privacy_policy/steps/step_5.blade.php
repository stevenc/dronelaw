@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #f5f5f5;">
                  <h3>UAV Specific Website Agreements - Privacy Policy - Step 5</h3>
                </div>
                  <div class="panel-body">
                      {!! Form::open(['action' => ['PrivacyPolicyController@updateStep', 5], 'class'=> 'form-horizontal', 'role' => 'form']) !!}
                        <p>
                          Select those options that apply.
                        </p>
                        {!! Form::hidden('company_id', $company_id) !!}
                        @foreach ($check_boxes as $check_box)
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="{{ 'check_box_' . $check_box->id }}" id="{{ 'check_box_' . $check_box->id }}" value="{{ $check_box->id }}" {{ isset($arr_check_boxes_selected[$check_box->id]) ? 'checked' : '' }}>
                            {{ $check_box->circumstance }}
                          </label>
                        </div>
                        @endforeach
                        <br>
                        @if (isset($arr_check_boxes_selected))
                          @if (array_key_exists(10, $arr_check_boxes_selected))
                            @if (strlen($description->description))
                              <div id="description">
                              {!! Form::textarea('description', $description->description, ['class' => 'form-control', 'rows' => 4, 'cols' => 98]) !!}
                            @endif 
                          @else
                          <div id="description" style="display:none;">
                            {!! Form::textarea('description', '', ['class' => 'form-control', 'rows' => 4, 'cols' => 98]) !!}
                          @endif
                          </div>
                        @else
                        <div id="description" style="display:none;">
                            {!! Form::textarea('description', '', ['class' => 'form-control', 'rows' => 4, 'cols' => 98]) !!}
                        </div>
                        @endif
                        <br>
                        <button name="previous" type="submit" class="btn btn-primary">Previous</button>
                        <button name="next" type="submit" class="btn btn-primary">Next</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      {!! Form::close() !!}
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
      $('#check_box_10').click(function() {
        if( $(this).is(':checked')) {
            $("#description").show();
        } else {
            $("#description").hide();
        }
      }); 
    </script>
@endpush
