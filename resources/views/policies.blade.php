@extends('layouts.topNav')

@section('title', 'Page Title')

@section('topNavBar')
    @parent

    <p>This is appended to the top nav.</p>

@endsection

@section('leftNavStart')
    @parent

    <h2 class="sub-header">Policy List</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>

                <th>Policy Number</th>
                <th>Coverage Type</th>
                <th>Carrier</th>
                <th>Entity ID</th>
                <th>Entity Type ID</th>
            </tr>
            </thead>



            <tbody>

        @foreach(json_decode($response, true) as $policy)
            <div id=" {{ $policy['policyNumber'] }}" name=" {{ $policy['policyNumber']  }}">
                <a href="/reports/{{ $policy['policyNumber']  }}" class="list-unstyled"  role="button" aria-haspopup="true" aria-expanded="false">
             <tr><td>{{ $policy['policyNumber']}}</td><td>{{$policy['policyCoverageType']}}</td> <td> {{$policy['carrier']}}</td ><td> {{$policy['entityID']}}</td> <td> {{$policy['entityTypeID']}}</td></tr>    </a>
            </div>
        @endforeach

            </tbody>

    </table>
    </div>
@endsection

@section('footer')
    @parent
    <p>The id set is {{$id}}</p>
@endsection