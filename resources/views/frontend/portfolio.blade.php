@extends('layouts.frontend')
@section('title','Portfolio')
@section('style')
    <style>
        #map2{
            height: 100vh;
        }
    </style>
@endsection
@section('content')
    <div id="map2"></div>
    <!-- Portfolio -->
    <section class="section-wrap">
        <div class="container-fluid container-semi-fluid">
            @foreach($categories as $category)

                @if(count($category->portfolios) > 0)
                    <div class="row">
                <div class="col-12">
                    <h3>{{ $category->name }}</h3>
                    <hr>
                </div>
                        @foreach($category->portfolios as $key=> $portfolio)
                            <div data-wow-duration="2s" data-wow-delay="{{ (1 + $key) / 2 }}s"  class="wow fadeInUp masonry2-item col-lg-4 project hover-trigger">
                                <div class="project__container">
                                    <div class="project__img-holder">
                                        <p><span class="project-1__title" style="color: black; font-size: 22px;">{{ $portfolio->name }}</span> <br>
                                            <span class="project-1__text">{{ $portfolio->address }}</span>
                                        </p>

                                        <a href="{{ route('project_details',['slug'=>$portfolio->project->slug]) }}">See More..</a>
                                    </div>
                                </div>
                            </div> <!-- end project -->
                        @endforeach
            </div>
                @endif
            @endforeach
        </div>
    </section> <!-- end portfolio -->
@endsection
@section('script')
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBh_Bn8YG0THYJJ7yWO8uIe7ITwS3_gHhc&callback=initMap">
    </script>
    <script>

            var locations = JSON.parse('<?php echo $locations; ?>');
            console.log(locations)
            function initMap() {
                var customMarker = {
                    url: '{{ asset('img/map.png') }}',
                    size: new google.maps.Size(32, 32),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(16, 32)
                };
                var map = new google.maps.Map(document.getElementById('map2'), {
                    zoom: 7.3,
                    center: new google.maps.LatLng(24.0542703,90.3734163),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

                var infowindow = new google.maps.InfoWindow();

                    var image = {
                        url: '{{ asset('img/map.png') }}',
                        size: new google.maps.Size(32, 38),
                        scaledSize: new google.maps.Size(32, 38),
                        labelOrigin: new google.maps.Point(70, 35)
                    };
                var marker, i;

                for (i = 0; i < locations.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map,
                        icon: image
                    });

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infowindow.setContent(locations[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }
            }
            google.maps.event.addDomListener(window, 'load', initMap);
    </script>
@endsection
