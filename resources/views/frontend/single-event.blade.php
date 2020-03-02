<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
$event_title = $event->title;
$title = $event_title.' - '.$site->name;
?>
@extends('frontend.layouts.frame')
@section('title',$title)
@section('nav')
@section('header_title',$event_title)
@include('frontend.includes.nav-other')
@endsection

@section('container')
@include('frontend.includes.single-event-shower',['event' => $event])
@endsection
