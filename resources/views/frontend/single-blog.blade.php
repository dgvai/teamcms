<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
$blog_title = $blog->title;
$title = $blog_title.' - '.$site->name;
?>
@extends('frontend.layouts.frame')
@section('title',$title)
@section('nav')
@section('header_title',$blog_title)
@include('frontend.includes.nav-other')
@endsection

@section('container')
@include('frontend.includes.single-blog-shower',['blog' => $blog])
@endsection
