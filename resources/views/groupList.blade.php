@extends('layouts.topNav')





@section('title', 'Page Title')

@section('topNavBar')
    @parent

    <p>This is appended to the top nav.</p>

@endsection

@section('leftNavStart')
    @parent
    <ul class="nav navbar-nav">
    @foreach(json_decode($response, true) as $carrier)
        <div id=" {{ $carrier['carrierID'] }}" name=" {{ $carrier['carrierID'] }}">
            <a href="/reports/{{ $carrier['carrierID'] }}" class="list-unstyled"  role="button" aria-haspopup="true" aria-expanded="false">{{ $carrier['carrierName'] }} </a>
        </div>
    @endforeach
    </ul>
@endsection








@section('footer')
    @parent
    <p>The id set is {{$id}}</p>
@endsection











