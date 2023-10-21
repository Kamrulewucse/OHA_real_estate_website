@extends('layouts.frontend')
@section('title','News Details')
@section('style')
    <style>
        .entry__img {
            width: auto;
        }
    </style>
@endsection
@section('content')
    <!-- Page Title -->
    <section class="page-title bg-dark-overlay text-center" style="background-image: url({{ asset('themes/frontend/img/page-title/blog.jpg') }});">
        <div class="container">
            <div class="page-title__holder">
                <h1 class="page-title__title">News Details</h1>
                <ul class="breadcrumbs">
                    <li class="breadcrumbs__item">
                        <a href="{{ route('home') }}" class="breadcrumbs__url">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </section> <!-- end page title -->

    <!-- Blog -->
    <section class="section-wrap">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    <article class="entry">
                        <div class="entry__img-holder">
                            <a href="#">
                                <img src="{{ asset($news->big_image) }}" class="entry__img" alt="">
                            </a>
                        </div>
                        <div class="entry__body">
                            <ul class="entry__meta">
                                <li class="entry__meta-date">
                                    <span>{{ \Carbon\Carbon::parse($news->created_at)->format('m F ,Y') }}</span>
                                </li>
                            </ul>
                            <h2 class="entry__title">
                                {{ $news->title }}
                            </h2>
                            {!! $news->description !!}
                        </div>
                    </article>
                </div>

            </div> <!-- end row -->
        </div>
    </section> <!-- end blog -->
@endsection
