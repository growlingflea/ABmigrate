<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    @parent
    <p>This is my body content, added to content contetn.</p>
@endsection








@section('footer')
    @parent
    <p>This is my footer addition.</p>
@endsection