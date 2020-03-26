<?php 
use App\Models\Entities\SiteBasics;
use App\Models\Entities\SiteAbout;
$site = SiteBasics::first();
$meta = json_decode($site->meta_page_titles);
$title = (!isset($meta->about)) ? 'About Us - '.$site->tagline : $meta->about.' - '.$site->tagline;
$about = SiteAbout::first();
?>
@extends('frontend.layouts.frame')
@section('title',$title)
@section('nav')
@include('frontend.includes.nav-about')
@endsection

@section('container')
<div class="section sm-padding">
    <div class="container">
        <div class="row">
            <div class="section-header text-center">
                <h2 class="title">{{__('Our Story')}}</h2>
            </div>
        </div>
        {!!$about->about!!}
    </div>
</div>
@include('frontend.includes.contact')
@endsection
