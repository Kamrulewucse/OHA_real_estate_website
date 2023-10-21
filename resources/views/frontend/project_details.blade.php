
@extends('layouts.frontend')
@section('title','Project Details')
@section('style')
<link rel="stylesheet" href="{{ asset('lightbox/css/lightbox.min.css')}}">

<style>
    .modal-content {
        background-color: transparent;
    }
    iframe{
        height: 500px;
        width: 100%;
        padding-left: 10px;
        padding-right: 10px;
    }
    ul.details-share-list {
        padding: 0;
        list-style: none;
    }

    ul.details-share-list li {
        display: inline-block;
        background: #ddd;
    }

    ul.details-share-list li a {
        background: #ddd;
        padding: 8px;
        box-shadow: 0 0 2px 0px #773e3e;
    }
</style>
@endsection
@section('meta')
    <!--<meta property="og:title" content="{{ $project->name }}">-->
    <meta property="og:type" content="website">
    <!--<meta property="og:description" content="{!! $project->description !!}">-->
    <meta property="og:image" content="{{ asset($project->feature_image) }}">
    <meta property="og:image:alt" content="{{ $project->name }}">
    <meta property="og:url" content="{{ route('project_details', ['slug' => $project->slug]) }}">
    <meta property="fb:app_id" content="290716742088995" />

    <meta name="twitter:title" content="{{ $project->name }}">
    <meta name="twitter:image" content="{{ asset($project->feature_image) }}">
    <meta name="twitter:image:alt" content="{{ $project->name }}">
    <meta name="twitter:card" content="summary_large_image">
@endsection
@section('content')
    <!-- Page Title -->
    @foreach($project->images as $index => $image)
    <section class="page-title bg-dark-overlay text-center" style="background-image: url({{ asset($image->path) }});">
        <div class="container">
            <div class="page-title__holder">
                <h1 class="page-title__title">Project Details</h1>
                <ul class="breadcrumbs">
                    <li class="breadcrumbs__item">
                        <a href="{{ route('home') }}" class="breadcrumbs__url">Home</a>
                    </li>
                    <li class="breadcrumbs__item breadcrumbs__item--current">
                        Project Details
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end page title -->
    @break;
    @endforeach

    <article class="entry">
        <div class="entry__excerpt">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <h4>{{ $project->name }}</h4>
                        <p>{!! $project->description !!}</p>
                        <br>

                        @if($project->youtube_link  != '')
                            {!! $project->youtube_link !!}
                        @endif

                        @if($project->project_location_link  != '')
                            {!! $project->project_location_link !!}
                        @endif
                        <div class="details-list-group">
                            <label class="details-list-title">Share:</label>

                            <ul class="details-share-list">
                                <li><a target="_blank" href="{{ $socialLinks['facebook'] }}"  title="Facebook">
                                        <i class="ui-facebook" style="color: #18ADFF;"></i>
{{--                                        <img width="20px" style="margin-top: -2px;" src="{{ asset('img/facebook.png') }}" alt="">--}}
                                    </a></li>
                                <li><a target="_blank" href="{{ $socialLinks['twitter'] }}"  title="Twitter">
                                        <i class="ui-twitter" style="color: #249EF0;"></i>
{{--                                        <img width="20px" style="margin-top: -2px;" src="{{ asset('img/twitter.png') }}" alt="">--}}
                                    </a></li>
                                <li><a target="_blank" href="{{ $socialLinks['linkedin'] }}"  title="Linkedin">
                                        <i class="ui-linkedin" style="color: #1469C7;"></i>
{{--                                        <img width="20px" style="margin-top: -2px;" src="{{ asset('img/linkedin.png') }}" alt="">--}}
                                    </a></li>
                                <li>
                                    <a target="_blank" href="{{ $socialLinks['whatsapp'] }}"  title="whatsapp">
                                        <i class="ui-whatsapp" style="color: #4CAF50;"></i>
{{--                                        <img width="20px" style="margin-top: -2px;" src="{{ asset('img/whatsapp.png') }}" alt="">--}}
                                    </a>
                                </li>
                                <li><a target="_blank" href="{{ $socialLinks['telegram'] }}"  title="Telegram">
                                        <svg fill="teal" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 496 512"><path d="M248,8C111.033,8,0,119.033,0,256S111.033,504,248,504,496,392.967,496,256,384.967,8,248,8ZM362.952,176.66c-3.732,39.215-19.881,134.378-28.1,178.3-3.476,18.584-10.322,24.816-16.948,25.425-14.4,1.326-25.338-9.517-39.287-18.661-21.827-14.308-34.158-23.215-55.346-37.177-24.485-16.135-8.612-25,5.342-39.5,3.652-3.793,67.107-61.51,68.335-66.746.153-.655.3-3.1-1.154-4.384s-3.59-.849-5.135-.5q-3.283.746-104.608,69.142-14.845,10.194-26.894,9.934c-8.855-.191-25.888-5.006-38.551-9.123-15.531-5.048-27.875-7.717-26.8-16.291q.84-6.7,18.45-13.7,108.446-47.248,144.628-62.3c68.872-28.647,83.183-33.623,92.511-33.789,2.052-.034,6.639.474,9.61,2.885a10.452,10.452,0,0,1,3.53,6.716A43.765,43.765,0,0,1,362.952,176.66Z"/></svg>
{{--                                        <img width="20px" style="margin-top: -2px;" src="{{ asset('img/telegram.png') }}" alt="">--}}
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <!-- @foreach($project->images as $index => $image)
                            <div class="entry__img-holder masonry-filter wow fadeInUp" data-wow-duration="3s" >
                                <a class="example-image-link" href="{{ asset($image->path) }}" data-lightbox="example-set" data-title="{{ $project->name }}" >
                                <img src="{{ asset($image->path) }}" style="width:100%" class="hover-shadow cursor">
                                </a>
                            </div>
                        @endforeach -->
                        <div class="pswp-gallery" id="my-gallery">
                           @foreach($project->images as $index => $image)
                           <div class="entry__img-holder masonry-filter wow fadeInUp" data-wow-duration="3s" >
                            @php
                               $imagedetails = getimagesize(asset($image->path));
                               $width = $imagedetails[0];
                               $height = $imagedetails[1];
                            @endphp
                            <a
                                href="{{ asset($image->path) }}"
                                data-pswp-width="{{ $width }}"
                               data-pswp-height="{{ $height }}"
                                target="_blank"
                                >
                                <img
                                    src="{{ asset($image->path) }}"
                                    alt=""
                                />
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-6 text-left ">
                @if(!empty($getIdPrevious))
                    <a href="{{route('project_details',['slug'=>$previous->slug])}}" class="previous" style="font-size: 25px;padding-left: 40px">&laquo; Previous</a>
                @endif
            </div>
            <div class="col-md-6 col-6 text-right ">
                @if(!empty($getIdNext))
                    <a href="{{route('project_details',['slug'=>$next->slug])}}" class="previous" style="font-size: 25px;padding-right: 40px">Next &raquo;</a>
                @endif
            </div>


        </div>
    </article>

@endsection

@section('script')
    <script src="{{ asset('js/share.js') }}"></script>
  <script src="{{ asset('lightbox/js/lightbox-plus-jquery.min.js')}}"></script>
  <script>
    lightbox.option({
      'resizeDuration': 200,
      'maxWidth': 800
    })
</script>

<script type="module">
  import PhotoSwipeLightbox from 'https://unpkg.com/photoswipe/dist/photoswipe-lightbox.esm.js';

  const lightbox = new PhotoSwipeLightbox({
    gallery: '#my-gallery',
    children: 'a',
    pswpModule: () => import('https://unpkg.com/photoswipe'),
  });

  lightbox.init();
</script>
@endsection




