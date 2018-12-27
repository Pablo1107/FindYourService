@extends('layout')

@section('content')
<div id="app">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Service</h1>
  </div>
  <form method="POST" action="/services">
    @csrf
    <div class="form-group">
      <label class="label">Title</label>
      <input type="text" name="title" class="form-control" placeholder="">
    </div>
    <div class="form-group">
      <label class="label">Description</label>
      <input type="text" name="description" class="form-control" placeholder="">
    </div>
    <div class="form-group">
      <label class="label">Address</label>
      <input type="text" id="autocomplete" class="form-control" placeholder="" onFocus="geolocate()">
      <input type="hidden" id="address" name="address" value="">
    </div>
    <div class="form-group">
      <label class="label">State</label>
      <input type="text" id="administrative_area_level_1" name="state" class="form-control" placeholder="">
    </div>
    <div class="form-group">
      <label class="label">Country</label>
      <input type="text" id="country" name="country" class="form-control" placeholder="">
    </div>
    <div class="form-group">
      <label class="label">Zip Code</label>
      <input type="text" id="postal_code" name="zipcode" class="form-control" placeholder="">
    </div>
    <input type="hidden" id="latitude" name="latitude" value="">
    <input type="hidden" id="longitude" name="longitude" value="">
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="../js/app.js"></script>
<script>
  // This example displays an address form, using the autocomplete feature
  // of the Google Places API to help users fill in the information.

  // This example requires the Places library. Include the libraries=places
  // parameter when you first load the API. For example:
  // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        var completeAddress = place.address_components[1]['long_name'] + " " + place.address_components[0]['short_name'];
        document.getElementById("address").value = completeAddress;
            document.getElementById("latitude").value = "hellooo";
        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
        getLatlong();
      }

      function getLatlong() {
        var geocoder = new google.maps.Geocoder();
        var address = document.getElementById('autocomplete').value;

        geocoder.geocode({ 'address': address }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var latitude = results[0].geometry.location.lat();
                var longitude = results[0].geometry.location.lng();
                document.getElementById("latitude").value = latitude;
                document.getElementById("longitude").value = longitude;
            }
        });
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          console.log("hello");
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            console.log(geolocation);
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key={{ $google->apiKey }}&libraries=places&callback=initAutocomplete"
          async defer></script>
  @endsection
