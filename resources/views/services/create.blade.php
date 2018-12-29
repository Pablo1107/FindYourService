@extends('layout')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap
    align-items-center pt-3 pb-2 mb-3 border-bottom">
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
      <input type="text" id="autocomplete" class="form-control" placeholder="" 
      onFocus="geolocate()">
      <input type="hidden" id="address" name="address" value="">
    </div>
    <div class="form-group">
      <label class="label">State</label>
      <input type="text" id="administrative_area_level_1" name="state"
      class="form-control" placeholder="">
    </div>
    <div class="form-group">
      <label class="label">Country</label>
      <input type="text" id="country" name="country" class="form-control"
      placeholder="">
    </div>
    <div class="form-group">
      <label class="label">Zip Code</label>
      <input type="text" id="postal_code" name="zipcode" class="form-control" 
      placeholder="">
    </div>
    <input type="hidden" id="latitude" name="latitude" value="">
    <input type="hidden" id="longitude" name="longitude" value="">
    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection

@section('scripts')
<script src="../js/google.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ $google->apiKey }}&libraries=places&callback=initAutocomplete" async defer></script>
@endsection
