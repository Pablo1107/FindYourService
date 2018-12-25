@extends('layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
  <h1 class="h2">{{ $service->title }}</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <form method="GET" action="/services/{{ $service->id }}/edit">
      <input type="submit" class="btn btn-sm btn-outline-secondary" value="Edit">
    </form> 
  </div>
</div>
<p>{{ $service->description }}</p> 
@endsection
