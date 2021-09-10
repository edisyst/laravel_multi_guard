<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Admin Template</title>

    <!-- vendor css -->
    <link href="{{ asset('admin/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/starlight.css') }}">

    <!-- TOASTR -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

<!-- ########## START: LEFT PANEL ########## -->
@include('admin.body.sidebar')
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
@include('admin.body.header')
<!-- ########## END: HEAD PANEL ########## -->


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    @yield('admin_content')

<!-- ########## START: FOOTER ########## -->
@include('admin.body.footer')
<!-- ########## END: FOOTER ########## -->

</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<script src="{{ asset('admin/lib/jquery/jquery.js') }}"></script>
<script src="{{ asset('admin/lib/popper.js/popper.js') }}"></script>
<script src="{{ asset('admin/lib/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('admin/lib/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('admin/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
<script src="{{ asset('admin/lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('admin/lib/d3/d3.js') }}"></script>
<script src="{{ asset('admin/lib/rickshaw/rickshaw.min.js') }}"></script>
<script src="{{ asset('admin/lib/chart.js/Chart.js') }}"></script>
<script src="{{ asset('admin/lib/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('admin/lib/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('admin/lib/Flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('admin/lib/flot-spline/jquery.flot.spline.js') }}"></script>

<script src="{{ asset('admin/js/starlight.js') }}"></script>
<script src="{{ asset('admin/js/ResizeSensor.js') }}"></script>
<script src="{{ asset('admin/js/dashboard.js') }}"></script>

<!-- TOASTR -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    @@if(\Illuminate\Support\Facades\Session::has('message'))
        var type = "{{ \Illuminate\Support\Facades\Session::get('alert-type', info) }}"

    switch (type){
        case 'info':
            toastr.info(" {{ \Illuminate\Support\Facades\Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ \Illuminate\Support\Facades\Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ \Illuminate\Support\Facades\Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ \Illuminate\Support\Facades\Session::get('message') }} ");
            break;
    }
     @endif
</script>


</body>
</html>
