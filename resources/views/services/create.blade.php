@extends('layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create Service</h1>
</div>
<form method="POST" action="/services">
  @csrf
  <div class="field">
    <label class="label">Title</label>
    <div class="control">
      <input class="input" name="title" type="text" placeholder="">
    </div>
  </div>

  <div class="field">
    <label class="label">Description</label>
    <div class="control">
      <textarea class="textarea" name="description" placeholder=""></textarea>
    </div>
  </div>

  <div class="field">
    <label class="label">Address</label>
    <div class="control">
      <input class="input" name="address" type="text" placeholder="">
    </div>
  </div>

  <div class="control">
    <button class="button is-primary">Create</button>
  </div>
</form>
@endsection
