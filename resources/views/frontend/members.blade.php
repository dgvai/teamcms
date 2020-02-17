<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
$meta = json_decode($site->meta_page_titles);
$title = ($meta->members == null) ? 'Members - '.$site->name : $meta->members.' - '.$site->name;
?>
@extends('frontend.layouts.frame')
@section('title',$title)
@section('nav')
@section('header_title',__('layout.curmem'))
@include('frontend.includes.nav-other')
@endsection

@section('container')
@include('frontend.includes.member-shower')
@endsection
