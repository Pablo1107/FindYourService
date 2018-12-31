<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>FindYourService</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


    <style>
.bd-placeholder-img {
  font-size: 1.125rem;
  text-anchor: middle;
}

             @media (min-width: 768px) {
               .bd-placeholder-img-lg {
                 font-size: 3.5rem;
               }
             }
             .label:not(:last-child) {

               margin-bottom: .5em;

             }
             .label {

               color: rgb(236, 230, 218);

             }
             .label {

               color: #363636;
               display: block;
               font-size: 1rem;
               font-weight: 700;

             } 
    </style>
    <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div id="app">
        <router-view></router-view>
      </div>

    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ $google->apiKey }}&libraries=places&"></script>
    <script src="../js/public.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" 
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" 
            crossorigin="anonymous"></script>
</html>
