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
            <a :href="'/services/' + service.id">@{{ array[1] }}</a>
          </td>
        </tr>
      </tbody>
    </table>
    <p v-else>There is no services stored in the database, would you like to create one?</p>
  </div> 

  <div v-show="form.visible"> 
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
        <input type="text" ref="autocomplete" class="form-control"
               placeholder="" onFocus="value = ''">
        <input type="hidden" v-model="form.address" name="address" value="">
      </div>
      <div class="form-group">
        <label class="label">State</label>
        <input type="text" v-model="form.state" name="state"
               class="form-control" placeholder="">
      </div>
      <div class="form-group">
        <label class="label">Country</label>
        <input type="text" v-model="form.country" name="country" class="form-control" placeholder="">
      </div>
      <div class="form-group">
        <label class="label">Zip Code</label>
        <input type="text" v-model="form.zipcode" name="zipcode" class="form-control" placeholder="">
      </div>
      <input type="hidden" id="latitude" name="latitude" value="">
      <input type="hidden" id="longitude" name="longitude" value="">
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ $google->apiKey }}&libraries=places&"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="../js/app.js"></script>
@endsection
