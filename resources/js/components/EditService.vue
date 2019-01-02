<template>
  <div v-if="service">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Edit Service</h1>
    </div>
    <form @submit.prevent="$emit('update', service)">
      <div class="form-group">
        <label class="label">Title</label>
        <input type="text" name="title"
               class="form-control" v-model="service.title">
      </div>
      <div class="form-group">
        <label class="label">Description</label>
        <textarea type="text" name="description" class="form-control" v-model="service.description"></textarea>
      </div>
      <div class="form-group">
        <label class="label">Address</label>
        <input type="text"
               ref="autocomplete"
               class="form-control"
               onFocus="value = ''"
               v-model="service.address">
        <input type="hidden"
               v-model="service.address"
               name="address">
      </div>
      <div class="form-group">
        <label class="label">City</label>
        <input type="text"
               v-model="service.city" 
               name="city"
               class="form-control">
      </div>
      <div class="form-group">
        <label class="label">State</label>
        <input type="text"
               v-model="service.state"
               name="state"
               class="form-control">
      </div>
      <div class="form-group">
        <label class="label">Zip Code</label>
        <input type="text"
               v-model="service.zipcode"
               name="zipcode"
               class="form-control">
      </div>
      <input type="hidden" v-model="service.latitude" name="latitude" value="">
      <input type="hidden" v-model="service.longitude" name="longitude" value="">
      <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
  </div>
</template>

<script charset="utf-8">
export default {
  props: ['services', 'id'],
  data() {
    return {
      service: {
        title: '',
        description: '',
        address: '',
        city: '',
        state: '',
        zipcode: '',
        latitude: 0.0,
        longitude: 0.0
      }
    }
  },
  created() {
    axios.get('/services/' + this.id)
      .then(response => {
        this.service = response.data;
      })
      .catch(error => {
        console.log('There was an error.');
      });
  }
}
</script>
