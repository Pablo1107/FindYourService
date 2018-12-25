@extends('layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Service</h1>
</div>
<form method="POST" action="/services/{{ $service->id }}">
  @method('PATCH')
  @csrf
  <div class="field">
    <label class="label">Title</label>
    <div class="control">
      <input class="input" name="title" type="text" placeholder="" value="{{ $service->title }}">
    </div>
  </div>

  <div class="field">
    <label class="label">Description</label>
    <div class="control">
      <textarea class="textarea" name="description" placeholder="">{{ $service->description }}</textarea>
    </div>
  </div>

  <div class="field">
    <label class="label">Address</label>
    <div class="control">
      <input class="input" name="address" type="text" placeholder="" value="{{ $service->address }}">
    </div>
  </div>

  <div class="control">
    <button class="button is-primary">Edit</button>
  </div>
</form>
@endsection
