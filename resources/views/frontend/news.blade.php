@extends('layouts.frontend')
@section('title','News')
@section('content')
    <!-- Page Title -->
    <section class="page-title bg-dark-overlay text-center" style="background-image: url({{ asset('themes/frontend/img/page-title/blog.jpg') }});">
        <div class="container">
            <div class="page-title__holder">
                <h1 class="page-title__title">News</h1>
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
                @foreach($newses as $key=> $news)
                <div data-wow-duration="1s" data-wow-delay="{{ (1 + $key) / 2 }}s" class="wow fadeInUp col-lg-4 col-md-6">
                    <article class="entry">
                        <div class="entry__img-holder">
                            <a href="#">
                                <img src="{{ asset($news->thumbs_image) }}" class="entry__img" alt="">
                            </a>
                        </div>
                        <div class="entry__body">
                            <ul class="entry__meta">
                                <li class="entry__meta-date">
                                    <span>{{ \Carbon\Carbon::parse($news->created_at)->format('m F ,Y') }}</span>
                                </li>
                            </ul>
                            <h2 class="entry__title">
                                <a href="{{ route('news_details',['slug'=>$news->slug]) }}">{{ $news->title }}</a>
                            </h2>
                            <a href="{{ route('news_details',['slug'=>$news->slug]) }}" class="read-more">
                                <span class="read-more__text">Read More</span>
                                <i class="ui-arrow-right read-more__icon"></i>
                            </a>
                        </div>
                    </article>
                </div>
                @endforeach
            </div> <!-- end row -->
        </div>
    </section> <!-- end blog -->
@endsection
