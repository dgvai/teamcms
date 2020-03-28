<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>
@extends('frontend.layouts.frame')
@section('title',__('Login').' - '.$site->name)
@section('nav')
@section('header-title',__('Login'))
@include('frontend.includes.nav-other')
@endsection

@section('container')
@include('frontend.includes.login-form')
@endsection