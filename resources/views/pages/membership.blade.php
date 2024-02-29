@extends('layouts.app')
@section('content')
<style>
    .form-control {
        width: 100%;
        padding: 6px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 0px;
        box-sizing: border-box;
        background: #FAFBFD;
        margin-bottom: 15px;
    }
</style>
    <section id="content">


        <!-- Page Heading -->
        <section class="section page-heading">

            <h1>Membership</h1>
            <p class="breadcrumb"><a href="/">Home</a> / registeration</p>

        </section>
        <!-- Page Heading -->




        <!-- Section -->
        <section class="section full-width-bg gray-bg">

            <div class="row">

                <div class="col-lg-9 col-md-9 col-sm-8">

                    <div class=">
                        <h3 class="no-margin-top"><b>Become a member</b></h3>
                        <p>Membership with the Nunya community connects you to other members and age groups.</p>
                    </div>

                    <form method="POST" action="{{ route('membership.store') }}">
                        @csrf

                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <h5>Contact Details</h5>

                                <label>First name*</label>
                                <input type="text">
                                <br><br>
                                <label>Last name*</label>
                                <input type="text">
                                <br><br>
                                <label>Email address*</label>
                                <input type="text">
                                <br><br>
                                <label>Address 1</label>
                                <input type="text">
                                <br><br>
                                <label>Address 2</label>
                                <input type="text">
                                <br><br>
                                <label>City</label>
                                <input type="text">
                                <br><br>
                                <div class="inline-inputs">

                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <label>State</label>
                                        <select class="chosen-select">
                                            <option>Please Select</option>
                                            <option>United States</option>
                                            <option>United States</option>
                                            <option>United States</option>
                                            <option>United States</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <label>ZIP code*</label>
                                        <input type="text">
                                    </div>

                                </div>
                                <br>
                                <label>Home Phone</label>
                                <input type="text">
                                <br><br>
                                <label>Cell Phone</label>
                                <input type="text">

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">

                                <h5>Data capture</h5>
                                <label>Date of birth*</label>
                                <input type="date" class="form-control">


                                <div class="align-left">
                                    <input type="submit" value="Submit">
                                </div>


                            </div>

                        </div>



                    </form>

                </div>



                <!-- Sidebar -->
                @include('snippets.sidebar')
                <!-- /Sidebar -->



            </div>

        </section>
        <!-- /Section -->

    </section>
@endsection
