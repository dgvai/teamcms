<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>
@extends('frontend.layouts.frame')
@section('title',__('auth.signup').' - '.$site->name)
@section('nav')
@section('header-title',__('auth.page.signup'))
@include('frontend.includes.nav-other')
@endsection

@section('container')
@include('frontend.includes.register-form')
@endsection