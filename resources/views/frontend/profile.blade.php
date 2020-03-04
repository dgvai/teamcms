<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
$username = $user->full_name;
$title = $username.' - '.$site->name;
?>
@extends('frontend.layouts.frame')
@section('title',$title)
@section('nav')
@include('frontend.includes.nav-profile')
@endsection

@section('container')
@include('frontend.includes.profile-plate',['user' => $user])
@endsection
