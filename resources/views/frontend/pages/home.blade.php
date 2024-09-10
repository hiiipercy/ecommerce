@extends('frontend.layouts.master')
@section('content')
      <!--================Home Banner Area =================-->
   @include('frontend.pages.home_section.banner')
   <!--================End Home Banner Area =================-->
 
   <!--================Start feature Area =================-->
   @include('frontend.pages.home_section.feature')
   <!--================End feature Area =================-->
 
   <!--================ Inspired Product Area =================-->
   @include('frontend.pages.home_section.product')
   <!--================ End Inspired Product Area =================-->
 
   <!--================ Start Blog Area =================-->
   @include('frontend.pages.home_section.blog')
   <!--================ End Blog Area =================-->
@endsection