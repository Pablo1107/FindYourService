@extends('layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Service</h1>
</div>
<form method="POST" action="/services/{{ $service->id }}">
  @method('PATCH')
  @csrf
  <div class="form-group">
    <label class="label">Title</label>
    <input type="text" name="title" class="form-control" placeholder="" value="{{ $service->title }}">
  </div>
  <div class="form-group">
    <label class="label">Description</label>
    <textarea type="text" name="description" class="form-control" placeholder="">{{ $service->description }}</textarea>
  </div>
  <div class="form-group">
    <label class="label">Address</label>
    <input type="text"
           ref="autocomplete"
           class="form-control"
           placeholder=""
           onFocus="value = ''"
           value="{{ $service->address }}">
    <input type="hidden"
           v-model="form.address"
           name="address"
           value="{{ $service->address }}">
  </div>
  <div class="form-group">
    <label class="label">City</label>
    <input type="text"
           v-model="form.city" 
           name="city"
           class="form-control" placeholder=""
           value="{{ $service->city }}">
  </div>
  <div class="form-group">
    <label class="label">State</label>
    <input type="text"
           v-model="form.state"
           name="state"
           class="form-control"
           placeholder=""
           value="{{ $service->state }}">
  </div>
  <div class="form-group">
    <label class="label">Zip Code</label>
    <input type="text"
           v-model="form.zipcode"
           name="zipcode"
           class="form-control"
           placeholder=""
           value="{{ $service->zipcode }}">
  </div>
  <input type="hidden" v-model="form.latitude" name="latitude" value="">
  <input type="hidden" v-model="form.longitude" name="longitude" value="">
  <button type="submit" class="btn btn-primary">Save changes</button>
</form>
@endsection
