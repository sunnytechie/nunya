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

    <title>Admin - Greater Nunya community</title>

    <link href="{{ asset('assets/admin/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Dropify css --}}
    <link rel="stylesheet" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- Tiny MCE --}}
    <script src="https://cdn.tiny.cloud/1/ifprekyziwmwbff5pm4lgrqgmsm0x5yaew0tctgdk95r94ae/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    {{-- Ckeditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

    {{-- Dropify css --}}
    <link rel="stylesheet" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

    <!-- Include SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.min.css">

    <style>
        a {
            text-decoration: none !important;
        }

        a:hover {
            text-decoration: none !important;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        @include('admin.snippets.sidebar')

        <div class="main">
            @include('admin.snippets.nav')

            <main class="content">
                @yield('content')
            </main>

            @include('admin.snippets.footer')
        </div>
    </div>

    <script src="{{ asset('assets/admin/js/app.js') }}"></script>

    {{-- Dropify --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>

    <!-- Include Bootstrap JS and DataTables JS -->
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

   <!-- Include DataTables JS -->
    <script>
       $(document).ready(function() {
          $('#dnaDataTable').DataTable();
       });
    </script>

   <!-- Include SweetAlert2 JS (including the required dependencies) -->
   <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8.2.0/dist/promise.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.2/dist/sweetalert2.all.min.js"></script>

   <script>
       @if (session()->has('success'))
           swal.fire({
               'icon': 'success',
               'title': 'Successful',
               'text': "{{ session()->get('success') }}",
           })
       @endif

       @if (session()->has('failed'))
           swal.fire({
               'icon': 'error',
               'title': 'Failed',
               'text': "{{ session()->get('failed') }}",
           })
       @endif
   </script>



   {{-- Dropify script --}}
   <script>
    $(document).ready(function() {
        $('.dropify').each(function() {
            $(this).dropify();
        });
    });
   </script>

   {{-- Tiny MCE --}}
   <script>
       $('.description').each(function() {
            ClassicEditor
                .create(this)
                .catch(error => {
                    console.error(error);
                });
        });
   </script>


</body>

</html>
