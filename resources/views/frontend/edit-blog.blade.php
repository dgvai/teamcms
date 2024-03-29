<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
$meta = json_decode($site->meta_page_titles);
$title = ($meta->blogs == null) ? 'Edit Blog - '.$site->name : $meta->blogs.' - '.$site->name;
?>
@extends('frontend.layouts.frame')
@section('title',$title)
@section('nav')
@section('header_title',__('Edit Blog Post'))
@include('frontend.includes.nav-other')
@endsection

@section('container')
@include('frontend.includes.blog-plate',['blog' => $blog])
@endsection
