@extends('components.layouts.app')

@section('content')
    @include('partials.dashboard.hero')
    @include('partials.dashboard.recommendations')
    @include('partials.dashboard.about')
    @include('partials.dashboard.services')
    @include('partials.dashboard.seo-content')
@endsection

