<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
$meta = json_decode($site->meta_page_titles);
$title = ($meta->home == null) ? $site->name.' - '.$site->tagline : $meta->home.' - '.$site->tagline;
?>
@extends('frontend.layouts.frame')
@section('title',$title)
@section('nav')
@include('frontend.includes.nav-home')
@endsection

@section('container')
@include('frontend.components.bulletin')
@include('frontend.includes.recent-blogs',['blogs' => $blogs])
@include('frontend.includes.recent-events')
@include('frontend.includes.teams')
@include('frontend.includes.image-gallery')
@include('frontend.includes.contact')
@include('frontend.includes.counters')
@endsection
