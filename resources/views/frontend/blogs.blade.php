<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
$meta = json_decode($site->meta_page_titles);
$title = (!isset($meta->blogs)) ? 'Blogs - '.$site->name : $meta->blogs.' - '.$site->name;
?>
@extends('frontend.layouts.frame')
@section('title',$title)
@section('nav')
@section('header_title',__('Blogs'))
@include('frontend.includes.nav-other')
@endsection

@section('container')
@include('frontend.includes.blogs-shower')
@endsection
