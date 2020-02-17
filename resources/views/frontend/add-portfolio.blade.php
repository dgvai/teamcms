<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
$username = 'DG Shinoda';
$title = 'Add Portfolio - '.$username.' - '.$site->name;
?>
@extends('frontend.layouts.frame')
@section('title',$title)
@section('nav')
@include('frontend.includes.nav-profile')
@endsection

@section('container')
@include('frontend.includes.add-portfolio-plate')
@endsection
