<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ Session::get('business.name') }}</title>
    @include('layouts.partials.css')
    @yield('css')
</head>
<body>
    @yield('content')
</body>
</html>
@include('layouts.partials.modal')
<script type="text/javascript">
  var base_url = '<?php echo asset("") ?>'
</script>
@include('layouts.partials.javascripts')
