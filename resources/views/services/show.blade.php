@extends('layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ $service->title }}</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <form method="GET" action="/services/{{ $service->id }}/edit">
        <input type="submit" class="btn btn-sm btn-outline-secondary" value="Edit">
      </form> 
      <form method="POST" action="/services/{{ $service->id }}">
        @method('DELETE')
        @csrf
        <input type="submit" class="btn btn-danger btn-sm btn-outline-secondary" value="Delete">
      </form> 
    </div> 
  </div>
</div>
<h1 class="h3">Description</h1>
<p>{{ $service->description }}</p> 
<h1 class="h3">Address</h1>
{{ $service->address }}
@endsection
