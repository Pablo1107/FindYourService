<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Service</h1>
</div>
<form @submit.prevent="updateService">
  @method('PATCH')
  @csrf
  <div class="form-group">
    <label class="label">Title</label>
    <input type="text" name="title" class="form-control" placeholder=""
           :value="currentService.title">
  </div>
  <div class="form-group">
    <label class="label">Description</label>
    <textarea type="text" name="description" class="form-control" placeholder="">@{{ currentService.description }}</textarea>
  </div>
  <div class="form-group">
    <label class="label">Address</label>
    <input type="text"
           ref="autocomplete"
           class="form-control"
           onFocus="value = ''"
           :value="currentService.address">
    <input type="hidden"
           v-model="currentService.address"
           name="address">
  </div>
  <div class="form-group">
    <label class="label">City</label>
    <input type="text"
           v-model="currentService.city" 
           name="city"
           class="form-control">
  </div>
  <div class="form-group">
    <label class="label">State</label>
    <input type="text"
           v-model="currentService.state"
           name="state"
           class="form-control">
  </div>
  <div class="form-group">
    <label class="label">Zip Code</label>
    <input type="text"
           v-model="currentService.zipcode"
           name="zipcode"
           class="form-control">
  </div>
  <input type="hidden" v-model="currentService.latitude" name="latitude" value="">
  <input type="hidden" v-model="currentService.longitude" name="longitude" value="">
  <button type="submit" class="btn btn-primary">Save changes</button>
</form>
