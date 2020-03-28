<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>
@extends('frontend.layouts.frame')
@section('title',__('Sign Up').' - '.$site->name)
@section('nav')
@section('header-title',__('Sign Up'))
@include('frontend.includes.nav-other')
@endsection

@section('container')
@include('frontend.includes.register-form')
@endsection