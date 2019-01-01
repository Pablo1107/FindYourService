<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">@{{ currentService.title }}</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <form method="GET">
        <input type="submit" class="btn btn-sm btn-outline-secondary" value="Edit">
      </form> 
      <form @submit.prevent="deleteService(currentService.id)">
        @csrf
        <input type="submit" class="btn btn-danger btn-sm btn-outline-secondary" value="Delete">
      </form> 
    </div> 
  </div>
</div>
<h1 class="h3">Description</h1>
<p>@{{ currentService.description }}</p> 
<h1 class="h3">Address</h1>
@{{ currentService.address }}
<h1 class="h3">City</h1>
@{{ currentService.city }}
<h1 class="h3">State</h1>
@{{ currentService.state }}
<h1 class="h3">Zipcode</h1>
@{{ currentService.zipcode }}
<h1 class="h3">Longitude</h1>
@{{ currentService.longitude }}
<h1 class="h3">Latitude</h1>
@{{ currentService.latitude }}
