<template>
  <div v-if="service">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">{{ service.title }}</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
          <form :action="'#/services/' + service.id + '/edit'">
            <input type="submit" class="btn btn-sm btn-outline-secondary" value="Edit">
          </form> 
          <form @submit.prevent="$emit('delete', service.id)">
            <input type="submit" class="btn btn-danger btn-sm btn-outline-secondary" value="Delete">
          </form> 
        </div> 
      </div>
    </div>
    <h1 class="h3">Description</h1>
    <p>{{ service.description }}</p> 
    <h1 class="h3">Address</h1>
    {{ service.address }}
    <h1 class="h3">City</h1>
    {{ service.city }}
    <h1 class="h3">State</h1>
    {{ service.state }}
    <h1 class="h3">Zipcode</h1>
    {{ service.zipcode }}
    <h1 class="h3">Longitude</h1>
    {{ service.longitude }}
    <h1 class="h3">Latitude</h1>
    {{ service.latitude }}
  </div>
</template>

<script charset="utf-8">
export default {
  props: ['services', 'id'],
  computed: {
    service() {
      return this.services.find(service => service.id == this.id)
    }
  }
}
</script>
