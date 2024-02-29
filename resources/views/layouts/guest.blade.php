<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="We are united in love for peace, unity, and progress">
    <meta name="author" content="Nunya">
    <meta name="keywords" content="We are united in love for peace, unity, and progress">

    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="Greater Nunya" />
    <meta property="og:title" content="{{ config('app.name') }}" />
    <meta property="og:description" content="We are united in love for peace, unity, and progress" />
    <meta property="og:image" content="{{ asset('assets/img/docs/nunya.png') }}" />
    <meta property="og:image:width" content="200" />
    <meta property="og:image:height" content="200" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:alt" content="{{ config('app.name') }}" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('assets/img/docs/nunya.png') }}" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Greater Nunya community</title>

    <style>
        .img-fit {
            object-fit: cover;
            height: 90px !important;
            width: 90px !important;
        }
    </style>

    <link href="{{ asset('assets/admin/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

	<body class="sticky-header-on tablet-sticky-header">



        <main class="d-flex w-100">
            @yield('content')
        </main>

        <script src="{{ asset('assets/admin/js/app.js') }}"></script>

    </body>

</html>
