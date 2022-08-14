@extends('pagebuilder::components.defaulttheme.layouts.main',[
    'title'=> $page->title,
])

@section('content')

    <h1>Sample Page</h1>

    <p>
        This is a sample page. Please consider taking a copy from it and implement your own page.
    </p>
@endsection


@push('meta')
<meta name="description" content="{{$page->description}}">
        <meta name="keywords" content="{{$page->keywords}}">
        <!-- Social Media Meta Tags -->
        <meta property="og:title" content="{{$page->title??''}}">
        <meta property="og:type" content="article" />
        <meta property="og:description" content="{{$page->description??''}}">
        <meta property="og:image" content="{{$page->featured_image??''}}">
        <meta property="og:url" content="{{url()->current()}}">
        <meta property="og:site_name" content="{{env('APP_NAME')}}">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:image:alt" content="{{$page->title??''}}">
@endpush

@push('styles')

@endpush

@push('scripts')

@endpush

