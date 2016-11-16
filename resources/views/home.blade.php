@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>UAV Specific Website Agreements Status Dashboard</h3></div>
                    <div class="panel-body">
                        <table class="table">
                            @if (isset($company))
                            <tr>
                                <th>Company Info</th>
                                <td><a class="btn btn-primary" href="{{ url('company/' . $company->id . '/edit') }}" role="button">Edit</a></td>
                                <td></td>
                            </tr>
                                @if ($company->completed)
                                    @if (isset($copyright_policy))
                                    <tr>
                                        <th>Copyright Policy</th>
                                        <td><a class="btn btn-primary" href="{{ url('copyright-policy/' . $copyright_policy->id . '/edit') }}" role="button">Edit</a></td>
                                        @if ($copyright_policy->completed)
                                        <td><a class="btn btn-success" href="{{ url('copyright-policy/download') }}" role="button">Download</a></td>
                                        @endif
                                    </tr>
                                    @else
                                    <tr>
                                        <th>Copyright Policy</th>
                                        <td><a class="btn btn-primary" href="{{ url('copyright-policy/create') }}" role="button">Create</a></td>
                                        <td></td>
                                    </tr>
                                    @endif
                                    @if (isset($privacy_policy))
                                    <tr>
                                        <th>Privacy Policy</th>
                                        <td><a class="btn btn-primary" href="{{ url('privacy-policy/step/' . $privacy_policy->current_step) }}" role="button">Edit</a></td>
                                        @if ($privacy_policy->completed)
                                            <td><a class="btn btn-success" href="{{ url('privacy-policy/' . $privacy_policy->id . '/download') }}" role="button">Download</a></td>
                                        @endif
                                    </tr>
                                    @else
                                    <tr>
                                        <th>Privacy Policy</th>
                                        <td><a class="btn btn-primary" href="{{ url('privacy-policy/step/1') }}" role="button">Create</a></td>
                                        <td></td>
                                    </tr>
                                    @endif
                                    @if (isset($terms_of_use))
                                    <tr>
                                        <th>Terms Of Use</th>
                                        <td><a class="btn btn-primary" href="{{ url('terms-of-use/step/' . (string)($terms_of_use->current_step)) }}" role="button">Edit</a></td>
                                        @if ($terms_of_use->completed)
                                            <td><a class="btn btn-success" href="#" role="button">Download</a></td>
                                        @endif
                                    </tr>
                                    @else
                                    <tr>
                                        <th>Terms Of Use</th>
                                        <td><a class="btn btn-primary" href="{{ url('terms-of-use/step/1/create') }}" role="button">Create</a></td>
                                        <td></td>
                                    </tr>
                                    @endif
                                @endif
                            @else
                            <tr>
                                <th>Company Info</th>
                                <td><a class="btn btn-primary" href="{{ url('company/create') }}" role="button">Create</a></td>
                                <td></td>
                            </tr>
                            @endif
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
