@extends('layouts.frontend')
@section('title','Project')
@section('style')
    <style>
        @media (min-width: 1200px){
            .top-project-margin{
                margin-top: 72px;
            }
        }
    </style>
@endsection
@section('content')
    <!-- Portfolio -->
    <section class="section-wrap top-project-margin pb-72 pb-lg-40">
        <div class="container">
            <div class="title-row">
                <h2 class="section-title">Projects</h2>
            </div>

            <!-- Filter -->
            <div  data-wow-duration="3s" class="masonry-filter wow fadeInLeftBig">
                <a href="#" class="filter active" data-filter="*">All</a>
                @foreach($categories as $category)
                    <a href="#" class="filter" data-filter=".{{ $category->slug }}">{{ $category->name }}</a>
                @endforeach
            </div> <!-- end filter -->

            <div class="row masonry-grid">
                @foreach($projects as $key => $project)
                    <div data-wow-duration="2.5s" data-wow-delay="{{ (1 + $key) / 2 }}s"  class="wow fadeInUp masonry-item col-lg-4 project hover-trigger {{ $project->category->slug }}">
                        <div class="project__container">
                            <div class="project__img-holder">
                                <a href="{{ route('project_details',['slug'=>$project->slug]) }}">
                                    <img src="{{ asset($project->feature_image) }}" alt="" class="project__img">
                                    <div class="hover-overlay">
                                        <div class="project__description">
                                            <h3 class="project__title">{{ $project->name }}</h3>
                                            <span class="project__date">{{ $project->category->name }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div> <!-- end project -->
                @endforeach
            </div>
        </div>
    </section> <!-- end portfolio -->
@endsection
