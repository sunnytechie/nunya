
@extends('layouts.app')
    @section('content')

<!-- Container -->
<div class="container">

    <!-- Slider and about content -->
    @include('snippets.slider&more')

</div>

		<div class="container">

			<!-- Section -->
			<section class="section full-width-bg gray-bg var2">

				<div class="row">
					{{-- @include('snippets.news') --}}

					@include('snippets.event')
				</div>

			</section>

			<!-- Sponsor -->
            @include('snippets.sponsor')

			<!-- Section -->
			@include('snippets.follow')

			<!-- Section sign up -->
            @include('snippets.signup')

		</div>

    @endsection




