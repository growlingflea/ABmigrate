@extends('layouts.topNav')

@section('title', 'Page Title')

@section('topNavBar')
    @parent

    <p>This is appended to the top nav.</p>

@endsection

@section('leftNavStart')
    @parent
@endsection

@section('footer')
    @parent
    <p>The id set is {{$id}}</p>
@endsection