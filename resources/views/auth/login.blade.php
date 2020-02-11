<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>
@extends('frontend.layouts.frame')
@section('title',__('auth.login').' - '.$site->name)
@section('nav')
@section('header-title',__('auth.page.login'))
@include('frontend.includes.nav-other')
@endsection

@section('container')
@include('frontend.includes.login-form')
@endsection