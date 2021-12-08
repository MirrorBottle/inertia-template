@extends('visitors.layouts.app')

@section('content')
    <x-visitors.breadcrumb caption="{{ $page->caption }}" title="{{ $page->title }}" />

    <section class="section section-lg">
        <div class="container">
            {!! $page->content !!}
        </div>
    </section>
@endsection
