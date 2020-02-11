<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>
@extends('frontend.layouts.frame')
@section('title',$site->name.' - '.$site->tagline)
@section('nav')
@include('frontend.includes.nav-home')
@endsection

@section('container')
@include('frontend.includes.recent-blogs')
@include('frontend.includes.recent-events')
@include('frontend.includes.teams')
@endsection
