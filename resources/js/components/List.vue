<template id="">
  <div class="jumbotron list">
    <div class="table-responsive">
      <table class="table table-striped table-sm" v-if="services.length">
        <thead>
          <tr>
            <th v-for="key in Object.keys(filteredServices[0])">{{ key }}</th>
          </tr>
        </thead>
        <tbody>
          <tr class="table-items-row" v-for="service in filteredServices" 
                                      :key="service.id">
            <td v-for="array in Object.entries(service)">
              <a :href="'/services/' + service.id">{{ array[1] }}</a>
            </td>
          </tr>
        </tbody>
      </table>
      <p v-else>There are no services.</p>
    </div> 
  </div>
</template>

<script charset="utf-8">
export default {
  name: 'List',
  props: ['services'],
  computed: {
    filteredServices() {
      return this.services.map((service, index) => { return { id: service.id, title: service.title, city: service.city } });
    },
  }
}
</script>
