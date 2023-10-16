
<!DOCTYPE html>

<html>

	<head>

		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:type" content="Greater Nunya" />
        <meta property="og:title" content="{{ config('app.name') }}" />
        <meta property="og:description" content="We are united in love for peace, unity, and progress" />
        <meta property="og:image" content="{{ asset('assets/img/docs/ndu.png') }}" />
        <meta property="og:image:width" content="200" />
        <meta property="og:image:height" content="200" />
        <meta property="og:image:type" content="image/png" />
        <meta property="og:image:alt" content="{{ config('app.name') }}" />


		<!-- Title -->
		<title>Greater Nunya Community</title>

		<!-- Google Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>

		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/docs/ndu.png') }}">

		<!-- Stylesheets -->
		<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/fontello.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/flexslider.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/js/revolution-slider/css/settings.css') }}" rel="stylesheet" type="text/css" media="screen" />
		<link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/responsive-calendar.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/chosen.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/jackbox/css/jackbox.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/cloud-zoom.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/colorpicker.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">


		<!--[if IE 9]>
			<link rel="stylesheet" href="css/ie9.css">
		<![endif]-->

		<!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<link href="css/jackbox-ie8.css" rel="stylesheet" type="text/css" />
			<link rel="stylesheet" href="css/ie.css">
        <![endif]-->

		<!--[if gt IE 8]>
			<link href="css/jackbox-ie9.css" rel="stylesheet" type="text/css" />
		<![endif]-->

		<!--[if IE 7]>
			<link rel="stylesheet" href="css/fontello-ie7.css">
		<![endif]-->

		<style type="text/css">
			.no-fouc {display:none;}
	  	</style>

		<!-- jQuery -->
		<script src="{{ asset('assets/js/jquery-1.11.0.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery-ui-1.10.4.min.js') }}"></script>

		<!-- Preloader -->
		<script src="{{ asset('assets/js/jquery.queryloader2.min.js') }}"></script>

		<script type="text/javascript">
		$('html').addClass('no-fouc');

		$(document).ready(function(){

			$('html').show();

			var window_w = $(window).width();
			var window_h = $(window).height();
			var window_s = $(window).scrollTop();

			$("body").queryLoader2({
				backgroundColor: '#f2f4f9',
				barColor: '#63b2f5',
				barHeight: 4,
				percentage:false,
				deepSearch:true,
				minimumTime:1000,
				onComplete: function(){

					$('.animate-onscroll').filter(function(index){

						return this.offsetTop < (window_s + window_h);

					}).each(function(index, value){

						var el = $(this);
						var el_y = $(this).offset().top;

						if((window_s) > el_y){
							$(el).addClass('animated fadeInDown').removeClass('animate-onscroll');
							setTimeout(function(){
								$(el).css('opacity','1').removeClass('animated fadeInDown');
							},2000);
						}

					});

				}
			});

		});
		</script>

	</head>

	<body class="sticky-header-on tablet-sticky-header">

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>

            @include('snippets.footer')

		<!-- Back To Top -->
		<a href="#" id="button-to-top"><i class="icons icon-up-dir"></i></a>

		<!-- /Container -->

		<!-- JavaScript -->

		<!-- Bootstrap -->
		<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

		<!-- Modernizr -->
		<script type="text/javascript" src="{{ asset('assets/js/modernizr.js') }}"></script>

		<!-- Sliders/Carousels -->
		<script type="text/javascript" src="{{ asset('assets/js/jquery.flexslider-min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

		<!-- Revolution Slider  -->
		<script type="text/javascript" src="{{ asset('assets/js/revolution-slider/js/jquery.themepunch.plugins.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/revolution-slider/js/jquery.themepunch.revolution.min.js') }}"></script>

		<!-- Calendar -->
		<script type="text/javascript" src="{{ asset('assets/js/responsive-calendar.min.js') }}"></script>

		<!-- Raty -->
		<script type="text/javascript" src="{{ asset('assets/js/jquery.raty.min.js') }}"></script>

		<!-- Chosen -->
		<script type="text/javascript" src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>

		<!-- jFlickrFeed -->
		<script type="text/javascript" src="{{ asset('assets/js/jflickrfeed.min.js') }}"></script>

		<!-- InstaFeed -->
		<script type="text/javascript" src="{{ asset('assets/js/instafeed.min.js') }}"></script>

		<!-- Twitter -->
		<script type="text/javascript" src="{{ asset('assets/php/twitter/jquery.tweet.js') }}"></script>

		<!-- MixItUp -->
		<script type="text/javascript" src="{{ asset('assets/js/jquery.mixitup.js') }}"></script>

		<!-- JackBox -->
		<script type="text/javascript" src="{{ asset('assets/jackbox/js/jackbox-packed.min.js') }}"></script>

		<!-- CloudZoom -->
		<script type="text/javascript" src="{{ asset('assets/js/zoomsl-3.0.min.js') }}"></script>

		<!-- ColorPicker -->
		<script type="text/javascript" src="{{ asset('assets/js/colorpicker.js') }}"></script>

		<!-- Main Script -->
		<script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>


		<!--[if lt IE 9]>
			<script type="text/javascript" src="js/jquery.placeholder.js"></script>
			<script type="text/javascript" src="js/script_ie.js"></script>
		<![endif]-->


	</body>

</html>
