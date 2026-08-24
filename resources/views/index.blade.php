@extends('layouts.app')

@section('title', 'My Portfolio')

@section('content')
    @include('sections.home')
    @include('sections.about')
    @include('sections.resume')
    @include('sections.skills')
    @include('sections.contact')
@endsection
