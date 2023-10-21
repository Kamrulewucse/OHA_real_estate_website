@extends('layouts.frontend')
@section('title','Contact Us')
@section('content')

    <section class="page-title bg-dark-overlay text-center" style="background-image: url({{ asset('themes/frontend/img/page-title/contact.jpg') }});">
            <div class="container">
                <div class="page-title__holder">
                    <h1 class="page-title__title">Contact</h1>
                </div>
            </div>
        </section> <!-- end page title -->

        <!-- Contact -->
        <section class="section-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="contact">
                            <h5 class="contact__title">Office</h5>
                            <ul class="contact__items">
                                <li class="contact__item">
                                    <span class="contact__item-label">Address:</span>
                                    <address style="color: #0b2e13">89/2 West panthapath, Panthapath, Dhaka 1215</address>
                                </li>
                                <li class="contact__item" style="color: #0b2e13">
                                    <span class="contact__item-label">Phone: </span>
                                    <a href="tel:+8801717847310">+88-01717847310</a>
                                </li>
                                <li class="contact__item" style="color: #0b2e13">
                                    <span class="contact__item-label">Email: </span>
                                    <a href="mailto:themesupport@gmail.com">openhouse.ar.en@gmail.com</a>
                                </li>
                            </ul>

                            <h5 class="contact__title mt-40">Follow Us</h5>
                            <div class="socials socials-contact">
                                <a href="#" class="social social-twitter" aria-label="twitter" title="twitter" target="_blank"><i class="ui-twitter"></i></a>
                                <a href="https://www.facebook.com/Openhousearchitects" class="social social-facebook" aria-label="facebook" title="facebook" target="_blank"><i class="ui-facebook"></i></a>
                                <a href="#" class="social social-youtube" aria-label="youtube" title="google plus" target="_blank"><i class="ui-youtube"></i></a>
                                <a href="#" class="social social-instagram" aria-label="instagram" title="instagram" target="_blank"><i class="ui-instagram"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <h2 class="section-title">Book An Appointment</h2>
                        <p class="mb-40">If you have any question about project cost, get in touch.</p>
                        <!-- Contact Form -->
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="text-danger">{{$error}}</div>
                            @endforeach
                        @endif
                        @if(Session::has('message'))
                            <p class="alert alert-success font-weight-bold" role="alert"> {{ Session::get('message') }}</p>
                        @endif
                        <form  class="contact-form material" method="post" action="{{ route('contact_us') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Name -->
                                    <div class="material__form-group form-group">
                                        <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-input material__input" required="">
                                        <label for="name" class="material__label">Name
                                            <abbr title="required" class="required">*</abbr>
                                        </label>
                                        <span class="material__underline"></span>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <!-- Email -->
                                    <div class="material__form-group form-group">
                                        <input type="email" value="{{ old('email') }}"  name="email" id="email" class="form-input material__input" required="">
                                        <label for="email" class="material__label">Email
                                            <abbr title="required" class="required">*</abbr>
                                        </label>
                                        <span class="material__underline"></span>
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Subject -->
{{--                            <div class="material__form-group form-group">--}}
{{--                                <input type="text" value="{{ old('subject') }}" required name="subject" id="subject" class="form-input material__input">--}}
{{--                                <label for="subject" class="material__label">Subject--}}
{{--                                    <abbr title="required" class="required">*</abbr>--}}
{{--                                </label>--}}
{{--                                <span class="material__underline"></span>--}}
{{--                                @error('subject')--}}
{{--                                <span class="text-danger">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

                            <!-- Service -->
{{--                            <div  class="material__form-group form-group">--}}
{{--                                <input type="service" value="{{ old('service') }}"  name="service" id="service" class="form-input material__input" required="">--}}
{{--                                <label for="service" class="material__label">Service--}}
{{--                                    <abbr title="required" class="required">*</abbr>--}}
{{--                                </label>--}}
{{--                                    <select type="service" class="material__form-group form-group" name="service" id="service">--}}
{{--                                        <option value=""></option>--}}
{{--                                        <option {{ old('service') == 1 ? 'selected' : '' }} value="1">Interior</option>--}}
{{--                                        <option {{ old('service') == 2 ? 'selected' : '' }} value="2">Building</option>--}}
{{--                                        <option {{ old('service') == 3 ? 'selected' : '' }} value="3">Construction</option>--}}
{{--                                    </select>--}}
{{--                                    <span class="material__underline"></span>--}}
{{--                                    @error('service')--}}
{{--                                    <span class="text-danger">{{ $message }}</span>--}}
{{--                                    @enderror--}}
{{--                            </div>--}}

                            <div class="material__form-group form-group">
                                <select name="service" id="service" class="form-input material__input" required="">
                                    <option value="" disabled selected>Choose A Service</option>
                                    <option {{ old('service') == 1 ? 'selected' : '' }} value="1">Interior</option>
                                    <option {{ old('service') == 2 ? 'selected' : '' }} value="2">Building</option>
                                    <option {{ old('service') == 3 ? 'selected' : '' }} value="3">Construction</option>
                                </select>
{{--                                <label for="dropdown" class="material__label">Dropdown--}}
{{--                                    <abbr title="required" class="required">*</abbr>--}}
{{--                                </label>--}}
                                <span class="material__underline"></span>
                                @error('service')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="material__form-group form-group">
                                <input type="text" value="{{ old('location') }}" required name="location" id="location" class="form-input material__input">
                                <label for="location" class="material__label">Location
                                    <abbr title="required" class="required">*</abbr>
                                </label>
                                <span class="material__underline"></span>
                                @error('location')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="material__form-group form-group">
                                <input type="text" value="{{ old('approx_area') }}" required name="approx_area" id="approx_area" class="form-input material__input">
                                <label for="approx_area" class="material__label">Approximate Working Space/Area
                                    <abbr title="required" class="required">*</abbr>
                                </label>
                                <span class="material__underline"></span>
                                @error('approx_area')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Mobile No -->
                            <div class="material__form-group form-group">
                                <input type="text" value="{{ old('mobile_no') }}" required name="mobile_no" id="mobile_no" class="form-input material__input">
                                <label for="mobile_no" class="material__label">Mobile No.
                                    <abbr title="required" class="required">*</abbr>
                                </label>
                                <span class="material__underline"></span>
                                @error('mobile_no')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="material__form-group form-group">
                                <textarea id="message"  name="message" rows="7" class="form-input material__input" required="">{{ old('message') }}</textarea>
                                <label for="message" class="material__label">Message
                                    <abbr title="required" class="required">*</abbr>
                                </label>
                                <span class="material__underline"></span>
                                @error('message')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <input type="submit" class="btn btn--lg btn--color btn--button" style="background-color: #ffb31a;" value="Send Message" id="submit-message">
                            <div id="msg" class="message"></div>
                        </form>
                    </div>
                </div>
            </div>
        </section> <!-- end contact -->
        <!-- Google Map -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.850108585768!2d90.38230327411857!3d23.752723988689446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b95c89efb827%3A0xe6b9617eb59e1eae!2sOpenhouse%20Architects%20%26%20Engineers!5e0!3m2!1sen!2sbd!4v1683092398409!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
@endsection
@section('script')
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnKKbnZogxI9jte1w5VhVfg0CyyZyJTzw&callback=initMap">
    </script>
    <script>
        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            var uluru = {lat:23.7527166, lng: 90.3848066};
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 19, center: uluru});
            // The marker, positioned at Uluru


            var image = {
                url: '{{ asset('img/map.png') }}',
                size: new google.maps.Size(32, 38),
                scaledSize: new google.maps.Size(32, 38),
                labelOrigin: new google.maps.Point(70, 35)
            };

            var marker = new google.maps.Marker({
                position: uluru, map: map,
                icon:image,
                title:'Openhouse Architects & Engineers',
                label: { color:'#5490F4',fontSize: '16px', text: 'Openhouse Architects & Engineers' },
            });

        }
    </script>
@endsection
