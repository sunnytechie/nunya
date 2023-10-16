
@extends('layouts.app')
    @section('content')


    @include('snippets.header')
    {{-- @include('snippets.slider') --}}

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




