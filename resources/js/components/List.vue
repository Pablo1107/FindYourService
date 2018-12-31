<template id="">
  <div class="jumbotron list">
    <div class="table-responsive">
      <table class="table table-striped table-sm" v-if="services.length">
        <thead>
          <tr>
            <th v-for="key in Object.keys(services[0])">{{ key }}</th>
          </tr>
        </thead>
        <tbody>
          <tr class="table-items-row" v-for="service in services" 
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
}
</script>
