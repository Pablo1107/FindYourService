<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>FindYourService</title>

    <link href="{{ URL::asset('css/public.css') }}" rel="stylesheet">
  </head>
  <body>
    <div id="app"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ $google->apiKey }}&libraries=places&libraries=geometry"></script> 
    <script src="../js/public.js"></script>
</html>
