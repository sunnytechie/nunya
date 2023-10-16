<!-- Container -->
<div class="container">

    <!-- Header -->
    <header id="header">

        <!-- Main Header -->
        <div id="main-header">

            <div class="container">

            <div class="row">



                <!-- Logo -->
                <div id="logo" class="col-lg-3 col-md-3 col-sm-3" style="padding-left: 18px">

                    <a href="/">
                         <img height="55" src="{{ asset('assets/img/docs/ndu.png') }}" alt="Logo"> {{--<span style="color: #fff; weight: 700; font-size: 22px">NDU</span> --}}
                    </a>

                </div>
                <!-- /Logo -->



                <!-- Main Quote -->
                <div class="col-lg-5 col-md-4 col-sm-4">

                    <blockquote>We believe that our history is our heritage, <br>and our heritage our pride.</blockquote>

                </div>
                <!-- /Main Quote -->



                <!-- Newsletter -->
                <div class="col-lg-4 col-md-5 col-sm-5">

                    <form id="newsletter" action="http://velikorodnov.com/html/candidate/php/newsletter-form.php" method="POST">

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
                <!-- /Newsletter -->



            </div>

            </div>

        </div>
        <!-- /Main Header -->


        <!-- Lower Header -->
        <div id="lower-header">

            <div class="container">

            <div id="menu-button">
                <div>
                <span></span>
                <span></span>
                <span></span>
                </div>
                <span>Menu</span>
            </div>

            <ul id="navigation">

                <!-- Dashboard -->
                <li class="home-button current-menu-item">

                    <a href="/"><i class="icons icon-home"></i></a>

                </li>

                <li ><a href="/">Home</a></li>
                <li ><a href="/#about">About Us</a></li>
                <li ><a href="/#event">Events</a></li>
                <li ><a href="/#news">News</a></li>
                <li ><a href="/#sponsors">Sponsors</a></li>
                <li ><a href="/#getinvolve">Get Involved</a></li>
                <li ><a href="/#follow">Follow Us</a></li>



                <!-- Donate -->
                <li class="donate-button ">
                    <a href="#">Donate Today</a>
                </li>
                <!-- /Donate -->

            </ul>

            </div>

        </div>
        <!-- /Lower Header -->


    </header>
    <!-- /Header -->

    <section id="content">

        <!-- Section -->
        <section class="section full-width-bg full-width-slider-section">

            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">

                    <!-- Revolution Slider -->
                    @include('snippets.revolutionslider')
                    <!-- /Revolution Slider -->

                </div>


                <div class="col-lg-12 col-md-12 col-sm-12">

                    @include('snippets.involve')

                </div>

            </div>

        </section>
        <!-- /Section -->

        <!-- Section -->
        @include('snippets.about')
        <!-- /Section -->

    </section>

</div>
