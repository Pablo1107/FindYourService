@extends('layout')

@section('content')
<div id="app">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Services</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <form method="GET" action="/services/create">
        <input class="btn btn-sm btn-outline-secondary"
               value="Create Service" @click="toggleForm">
      </form> 
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-sm" v-if="services.length">
      <thead>
        <tr>
          <th v-for="key in Object.keys(services[0])">@{{ key }}</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-items-row" v-for="service in services" :key="service.id">
          <td v-for="array in Object.entries(service)">
            <a :href="'#/services/' + service.id"
               @click="showService(service.id)">@{{ array[1] }}</a>
          </td>
        </tr>
      </tbody>
    </table>
    <p v-else>There is no services stored in the database, would you like to create one?</p>
  </div> 

  <div v-show="form.visible">
    @include('services.create')
  </div>

  <div v-show="currentService.visible">
    @include('services.show')
  </div>
</div>
@endsection

@section('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key={{ $google->apiKey }}&libraries=places&"></script>
<script src="../js/admin.js"></script>
@endsection
