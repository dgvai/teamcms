<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
$username = 'DG Shinoda';
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
