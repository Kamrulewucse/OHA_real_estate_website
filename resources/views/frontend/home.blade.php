@extends('layouts.frontend')
@section('title','Home')
@section('style')
    <style>
        .testimonial__body {
            position: relative;
            margin-top: 0;
        }

        img.testimonial-image {
            position: absolute;
            left: 47%;
            top: 5px;
            border-radius: 50%;
        }

        .testimonial__body p {
            margin-top: 79px;
            font-size: 20px !important;
        }
        @media screen and (max-width:1200px){
            .feature{
                padding-right: 4% !important;
            }
            .feature_home{
                padding-left: 12%;
            }
        }
        @media screen and (min-width: 700px) {
            .feature_home{
                padding-left: 3%;
            }
            .feature{
                padding-right: 18%;
            }
        }

            .rev_slider_wrapper{
                height: 100vh !important;
            }

.service-1__info {

    margin-left: 20px;
    margin-right: 20px;

}
 .hide {
        display: none;
    }

    .read-more-btn,.read-more-btn-2 {

        color: #000;

        cursor: pointer;

    }

    .read-more-btn:hover,.read-more-btn-2:hover {
        color: #B26418;
    }
        .tp-caption.hero-text,.tp-caption.small-text {
            color: #B26418;

        }

        video.slider-video {
            height: auto;
            width: 100%;
        }
    </style>
@endsection
@section('content')
        <div class="rev-offset"></div>
        <!-- Revolution Slider -->
        <div class="rev_slider_wrapper">
            <div class="rev_slider" id="slider-1" data-version="5.0">
                <ul>
                    @foreach($sliders as $slider)

                    <li data-fstransition="fade"
                        data-transition="fade"
                        data-easein="default"
                        data-easeout="default"
                        data-slotamount="1"
                        data-masterspeed="1200"
                        data-delay="8000"
                        data-title="{{ $slider->title }}"
                    >
                       @if(strtolower(pathinfo($slider->image, PATHINFO_EXTENSION)) == 'mp4')
                            <video class="slider-video" autoplay loop muted>
                                <source src="{{ asset($slider->image) }}" type="video/mp4"> <!-- Replace 'your-video.mp4' with the path to your video file -->
                            </video>
                        @else
                            <img src="{{ asset($slider->image) }}"
                                 alt=""
                                 data-bgrepeat="no-repeat"
                                 data-bgfit="cover"
                                 data-bgparallax="7"
                                 class="rev-slidebg"
                            >
                            @if($slider->title != '')
                                <div class="tp-caption hero-text"
                                     data-x="30"
                                     data-y="center"
                                     data-voffset="[-140,-120,-100,-180]"
                                     data-fontsize="[72,62,52,46]"
                                     data-lineheight="[72,62,52,46]"
                                     data-width="[none, none, none, 300]"
                                     data-whitespace="[nowrap, nowrap, nowrap, normal]"
                                     data-frames='[{
									"delay":1000,
									"speed":900,
									"frame":"0",
									"from":"y:150px;opacity:0;",
									"ease":"Power3.easeOut",
									"to":"o:1;"
									},{
									"delay":"wait",
									"speed":1000,
									"frame":"999",
									"to":"opacity:0;","ease":"Power3.easeOut"
								}]'
                                     data-splitout="none">{{ $slider->title }}</span>
                                </div>
                            @endif
                            @if($slider->sub_title != '')
                                <div class="tp-caption small-text"
                                     data-x="30"
                                     data-y="center"
                                     data-voffset="[-40,-30,-20,0]"
                                     data-fontsize="[21,21,21,21]"
                                     data-lineheight="34"
                                     data-width="[none, none, none, 300]"
                                     data-whitespace="[nowrap, nowrap, nowrap, normal]"
                                     data-frames='[{
									"delay":1100,
									"speed":900,
									"frame":"0",
									"from":"y:150px;opacity:0;",
									"ease":"Power3.easeOut",
									"to":"o:1;"
									},{
									"delay":"wait",
									"speed":1000,
									"frame":"999",
									"to":"opacity:0;","ease":"Power3.easeOut"
								}]'
                                >
                                    {{ $slider->sub_title }}
                                </div>
                            @endif
                            <div class="tp-caption"
                                 data-x="30"
                                 data-y="center"
                                 data-voffset="[60,60,60,100]"
                                 data-lineheight="55"
                                 data-hoffset="0"
                                 data-frames='[{
										"delay":1200,
										"speed":900,
										"frame":"0",
										"from":"y:150px;opacity:0;",
										"ease":"Power3.easeOut",
										"to":"o:1;"
										},{
										"delay":"wait",
										"speed":1000,
										"frame":"999",
										"to":"opacity:0;","ease":"Power3.easeOut"
									}]'
                            ><a href='{{ route('projects') }}' class='btn btn--lg btn--color'>View Project</a>
                            </div>
                        @endif


                    </li>

                   @endforeach
                </ul>
            </div>
        </div>
        <!-- Intro -->
        <section class="section-wrap intro pb-40">
            <div class="container">
                <div class="row">
                    <div data-wow-duration="3s" class="wow fadeInLeftBig col-lg-7">
                        <h2 class="intro__title">About Us</h2>
                       {!! $aboutUs->description !!}
                        <div class="row feature_home">
                                <div class="feature">
                                    <a href="{{route('projects')}}">
                                    <i class="icon-Hotel-3 feature__icon"></i>
                                    <h4 class="feature__title">Architecture</h4>
                                    </a>
                                </div>

                                <div class="feature">
                                    <a href="{{route('projects')}}">
                                    <i class="icon-Ruler-Tool feature__icon"></i>
                                    <h4 class="feature__title">Interior Design</h4>
                                    </a>
                                </div>

                                <div class="feature">
                                    <a href="{{route('projects')}}">
                                    <i class="icon-Trowel-and-Brick feature__icon"></i>
                                    <h4 class="feature__title">Construction</h4>
                                    </a>
                                </div>

                        </div>
                    </div>
                    <div data-wow-duration="2.5s" class="wow fadeInRightBig col-lg-5">
                        <img src="{{ asset($aboutUs->image) }}" class="img-full-width" alt="">
                    </div>
                </div>
            </div>
        </section> <!-- end intro -->


        <!-- Portfolio -->
        <section class="section-wrap pt-72 pb-72 pb-lg-40">
            <div class="container">
                <div class="title-row">
                    <h2 class="section-title">Discover Recent Project</h2>
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
                    <div data-wow-duration="3s" data-wow-delay="{{ (1 + $key) / 2 }}s"  class="wow fadeInUp masonry-item col-lg-4 project hover-trigger {{ $project->category->slug }}">
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

        <section class="section-wrap pt-0 pb-0">
            <div class="container">
                    <div class="title-row">
                        <h2 class="section-title">Our Featured Services</h2>
                    </div>
                <div class="row">
                    @foreach($services as $key=> $service)
                    <div data-wow-duration="2s" data-wow-delay="{{ (1 + $key) / 2 }}s"  class="wow fadeInUp col-xl-4 col-lg-6">
                        <div class="service-1">
                            <a href="#" class="service-1__url hover-scale">
                                @if($service->image)
                                <img src="{{ asset($service->image)}}" class="service-1__img" alt="">
                                @endif
                            </a>
                            <div class="service-1__info">
                                <h3 class="service-1__title">{{ $service->name }}</h3>
                               @php
                                    $description = $service->description;
                                    $limit = 225;
                                    $showButton = strlen($description) > $limit;
                                    $visibleDescription = $showButton ? \Str::limit($description, $limit) : $description;
                                    $hiddenDescription = $showButton ? $description : '';
                                @endphp
                                <p id="description-{{ $key }}">
                                    {{ $visibleDescription }}
                                     @if($showButton)
                                        <span class="read-more-btn" data-key="{{ $key }}">Read More</span>
                                    @endif
                                    </p>
                                @if($showButton)
                                    <p id="more-content-{{ $key }}" class="hide">
                                        {{ $hiddenDescription }}

                                    </p>
                                @endif

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Testimonials -->
        <section class="section-wrap bg-dark-overlay" style="background-image: url({{ asset('themes/frontend/img/testimonials/bg.jpg') }});">
            <div class="container">
                <div class="title-row text-center">
                    <p class="subtitle">Testimonials</p>
                    <h2 class="section-title">What clients say about us</h2>
                    <i class="quote">“</i>
                </div>

                <div data-wow-duration="02s" class="wow fadeInUp  slick-slider slick-testimonials">
                    @foreach($testimonials as $testimonial)
                    <div class="testimonial clearfix">
                        <div class="testimonial__body">
                            <img class="testimonial-image" style="height: 70px" src="{{ asset($testimonial->image) }}" alt="">
                            <p class="testimonial__text">“{{ $testimonial->feedback }}”</p>
                        </div>
                        <div class="testimonial__info">
                            <span class="testimonial__author">{{ $testimonial->name }}</span>
                            <span class="testimonial__company">{{ $testimonial->designation }}</span>
                        </div>
                    </div>
                    @endforeach
                </div> <!-- end slider -->

            </div>
        </section>

        <!-- From Blog -->
        <section class="section-wrap blog-grid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-grid__title-col d-flex flex-column mb-lg-48">
                            <div class="title-row">
                                <h2 class="section-title">Specialized News</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="from-blog">
                            <div class="row row-60">
                                @foreach($newses as $key=> $news)
                                <div data-wow-duration="0.5s" data-wow-delay="{{ (1 + $key) / 2 }}s"  class="wow fadeInUp col-lg-4">
                                    <article class="entry">
                                        <div class="entry__img-holder">
                                            <a href="{{ route('news_details',['slug'=>$news->slug]) }}">
                                                <img src="{{ asset($news->thumbs_image) }}" class="entry__img" alt="">
                                            </a>
                                        </div>
                                        <div class="entry__body">
                                            <ul class="entry__meta">
                                                <li class="entry__meta-date">
                                                    <span>{{ \Carbon\Carbon::parse($news->created_at)->format('m F ,Y') }}</span>
                                                </li>
                                            </ul>
                                            <h4 class="entry__title">
                                                <a href="{{ route('news_details',['slug'=>$news->slug]) }}">{{ $news->title }}</a>
                                            </h4>
                                        </div>
                                    </article>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section> <!-- end from blog -->

@endsection
@section('script')
<script>

    $(document).ready(function() {

         $(".read-more-btn").click(function() {
            var key = $(this).data('key');

            $("#description-" + key).toggleClass("hide");
            $("#more-content-" + key).toggleClass("hide");
            $(this).text(function(i, text) {
                return text === "Read More" ? "Read Less" : "Read More";
            });
        });
    });
</script>
@endsection










