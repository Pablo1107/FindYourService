@extends('layout')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Services</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <form method="GET" action="/services/create">
      <input type="submit" class="btn btn-sm btn-outline-secondary" value="Create Service">
    </form> 
  </div>
</div>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>{{ $columns[0] }}</th>
        <th>{{ $columns[1] }}</th>
        <th>{{ $columns[4] }}</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($services as $service)
      <tr class="table-items-row">
        <td><a href="/services/{{ $service->id }}">{{ $service->id }}</a></td>
        <td><a href="/services/{{ $service->id }}">{{ $service->title }}</a></td>
        <td><a href="/services/{{ $service->id }}">{{ $service->city }}</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div> 
@endsection
