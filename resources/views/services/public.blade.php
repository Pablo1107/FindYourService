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
        <div class="jumbotron mt-3">
          <h1>FindYouService</h1>
          <p class="lead">This page will show a map and a list of the services.</p>
          <div class="table-responsive">
            <table class="table table-striped table-sm" v-if="services.length">
              <thead>
                <tr>
                  <th v-for="key in Object.keys(services[0])">@{{ key }}</th>
                </tr>
              </thead>
              <tbody>
                <tr class="table-items-row" v-for="service in searchedServices" :key="service.id">
                  <td v-for="array in Object.entries(service)">
                    <a :href="'/services/' + service.id">@{{ array[1] }}</a>
                  </td>
                </tr>
              </tbody>
            </table>
            <p v-else>There is no services stored in the database, would you like to create one?</p>
          </div> 
        </div>
        <nav class="navbar navbar-dark fixed-bottom bg-dark flex-md-nowrap p-0 shadow">
          <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">FindYourService</a>
          <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search" v-model="search">
          <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
              <a class="nav-link" href="#">Sign out</a>
            </li>
          </ul>
        </nav>
      </div>

    </div>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ $google->apiKey }}&libraries=places&"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
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

