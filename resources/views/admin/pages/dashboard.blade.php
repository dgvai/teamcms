<?php 
use App\Models\Entities\SiteBasics;
$site = SiteBasics::first();
?>

@extends('adminlte::page')
@section('title','Dashboard - '.$site->name)

@section('content_header')
    <h1> @lang('Dashboard') </h1>
@endsection

@section('content')

@endsection


@section('js')
    
@endsection
