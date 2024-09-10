@extends('layouts.master')

@section('title', 'Maincomponent Weight')
@section('MasterEHSFacility', 'active-sub active')
@section('bahaya', 'active-sub active')
@section('bahayasub', 'active-sub')

@section('content')
    @include('layouts.alert')
    <p>{{ $category->ec_name }}</p>
@endsection
