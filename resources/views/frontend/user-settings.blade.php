<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
$username = auth()->user()->full_name;
$title = 'Settings - '.$username.' - '.$site->name;
?>
@extends('frontend.layouts.frame')
@section('title',$title)
@section('nav')
@include('frontend.includes.nav-profile')
@endsection

@section('container')
@include('frontend.includes.settings-plate')
@endsection
