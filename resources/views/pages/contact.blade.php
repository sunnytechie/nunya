@extends('layouts.app')
@section('content')
<style>
    .form-control {
        width: 100%;
        padding: 8px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        background: #FAFBFD;
        margin-bottom: 15px;
    }
</style>

<!-- Page Heading -->
<section class="section page-heading animate-onscroll">

    <h1>Contact</h1>
    <p class="breadcrumb"><a href="/">Home</a> / Contact</p>

</section>
<!-- Page Heading -->

<!-- Section -->
<section class="section full-width-bg gray-bg">

    <div class="row">


        <div class="col-lg-9 col-md-9 col-sm-8">

            <h3 class="animate-onscroll no-margin-top">Our Location</h3>

            <div class="contact-map">
                <iframe width="900" height="400" src="https://maps.google.rs/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=marmora+road&amp;sll=44.210767,20.922416&amp;sspn=4.606139,10.821533&amp;ie=UTF8&amp;hq=&amp;hnear=Marmora+Rd,+London+SE22+0RX,+United+Kingdom&amp;t=m&amp;z=14&amp;ll=51.451955,-0.055755&amp;output=embed"></iframe>
            </div>

            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-6 animate-onscroll">

                    <h6>Mailing Address</h6>
                    <p>9863 - 9867 Mill Road, <br>
                    Cambridge, MG09 99HT </p>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 animate-onscroll">

                    <h6>Phone Numbers</h6>
                    <p>+1 800 559 6580<br>
                    1 800 603 6035 (Fax)</p>

                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 animate-onscroll">

                    <h6>Email Addresses</h6>
                    <p><a href="mailto:mail@companyname.com">mail@companyname.com</a><br>
                    <a href="mailto:info@companyname.com">info@companyname.com</a></p>

                </div>

            </div>



            <h3>We want to hear from you</h3>

            <p>Send us a message and we will respond back to you as soon as possible.</p><br>

            <form id="contact-form" action="http://velikorodnov.com/html/candidate/php/contact-form.php" method="POST">

                <div class="inline-inputs">

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>Name*</label>
                        <input type="text" name="name">
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label>Email address*</label>
                        <input type="email" class="form-control" name="email">
                    </div>



                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label>Your questions/comments</label>
                        <textarea rows="10" name="contact-message"></textarea>
                    </div>

                </div>

                <input type="submit" value="submit">

            </form>


        </div>



        <!-- Sidebar -->
        @include('snippets.sidebar')
        <!-- /Sidebar -->



    </div>

</section>
<!-- /Section -->

@endsection
