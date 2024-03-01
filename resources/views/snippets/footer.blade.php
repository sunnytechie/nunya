@php
    $about = \App\Models\About::first();
    $about = $about->about_us ?? '<p>We shall uphold honesty, integrity and pragmatism, and recognize and celebrate the dignity of individuals through labour..<br><br>
                        We believe that our history is our heritage, and our heritage our pride.</p>';
@endphp
<!-- Footer -->
<footer id="footer">

    <div class="container">

        <!-- Main Footer -->
        <div id="main-footer">

            <div class="row">

                <div class="col-md-4">

                    <h4>About Us</h4>

                    {!! $about !!}

                </div>

                <div class="col-md-4">

                    {{-- <h4>Campaign</h4> --}}

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 menu-container">

                        <ul class="menu">
                            <li><a href="{{ route('pages.about') }}">About</a></li>
                            <li><a href="{{ route('pages.news') }}">News</a></li>
                            <li><a href="{{ route('contact') }}">Contact us</a></li>
                        </ul>

                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 menu-container">

                        <ul class="menu">
                            <li><a href="{{ route('pages.events') }}">Find events</a></li>
                            <li><a href="{{ route('membership') }}">Register Membership</a></li>
                            <li><a href="{{ route('pages.donation') }}">Donate</a></li>
                            <li><a href="{{ route('pages.projects') }}">Projects</a></li>
                        </ul>

                    </div>

                </div>

                <div class="col-md-4">

                    <h4>Subscribe </h4>

                        <form id="newsletter" action="{{ route('subscribe') }}" method="POST">
                            @csrf

                            <h5><strong>Sign up</strong> for email updates</h5>
                            <div class="newsletter-form">

                                <div class="newsletter-email" style="width: 100%">
                                    <input style="border-top-right-radius: 0; border-bottom-right-radius: 0;" type="text" name="newsletter-email" placeholder="Email address">
                                </div>



                                <div class="newsletter-submit">
                                    <input style="border-top-left-radius: 0; border-bottom-left-radius: 0;" type="submit" value="">
                                    <i class="icons icon-right-thin"></i>
                                </div>

                            </div>

                        </form>

                </div>

            </div>

        </div>
        <!-- /Main Footer -->

        <!-- Lower Footer -->
        <div id="lower-footer">

            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-4 animate-onscroll">
                    <p class="copyright">
                        © {{ date('Y') }} Nunya. All Rights Reserved.
                    </p>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-8 animate-onscroll">

                    <div class="social-media">
                        <ul class="social-icons">
                            <li class="facebook"><a href="#" class="tooltip-ontop" title="Facebook"><i class="icons icon-facebook"></i></a></li>
                            <li class="twitter"><a href="#" class="tooltip-ontop" title="Twitter"><i class="icons icon-twitter"></i></a></li>
                            <li class="instagram"><a href="#" class="tooltip-ontop" title="" data-original-title="Instagram"><i class="icons icon-instagram"></i></a></li>
                        </ul>
                    </div>

                </div>

            </div>

        </div>
        <!-- /Lower Footer -->

    </div>


</footer>
<!-- /Footer -->
