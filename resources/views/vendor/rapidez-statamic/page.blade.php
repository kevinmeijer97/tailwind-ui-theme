@extends('rapidez::layouts.app')

@section('title', $meta_title->value() ?: $title)
@section('description', $meta_description)
@push('head')
    @foreach(Statamic::tag('alternates')->params(compact('page')) as $lang => $url)
        <link rel="alternate" hreflang="{{ $lang }}" href="{{ $url }}" />
    @endforeach

    <script>
        window.responsiveResizeObserver = new ResizeObserver((entries) => {
            entries.forEach(entry => {
                const imgWidth = entry.target.getBoundingClientRect().width;
                const multiplier = entry.target.dataset?.sharpen ? 150 : 100;
                entry.target.parentNode.querySelectorAll('source').forEach((source) => {
                    source.sizes = Math.ceil(imgWidth / window.innerWidth * multiplier) + 'vw';
                });
            });
        });
    </script>
@endpush

@section('content')
    @includeWhen(!$is_homepage, 'rapidez-statamic::breadcrumbs')
    @include('rapidez-statamic::page_builder')
@endsection
