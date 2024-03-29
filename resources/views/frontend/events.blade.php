<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
$meta = json_decode($site->meta_page_titles);
$title = (!isset($meta->events)) ? 'Events - '.$site->name : $meta->events.' - '.$site->name;
?>
@extends('frontend.layouts.frame')
@section('title',$title)
@section('nav')
@section('header_title',__('Events'))
@include('frontend.includes.nav-other')
@endsection

@section('container')
@include('frontend.includes.events-shower',['events' => $events])
@endsection
