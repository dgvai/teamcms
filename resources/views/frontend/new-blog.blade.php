<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
$meta = json_decode($site->meta_page_titles);
$title = 'New Blog - '.$site->name;
?>
@extends('frontend.layouts.frame')
@section('title',$title)
@section('nav')
@section('header_title',__('New Blog Post'))
@include('frontend.includes.nav-other')
@endsection

@section('container')
@include('frontend.includes.blog-plate')
@endsection
