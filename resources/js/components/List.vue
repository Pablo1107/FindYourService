<template id="">
  <div>
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
                <a :href="'#/services/' + service.id"
                   data-toggle="modal" data-target="#exampleModalCenter"
                   @click="updateSelService(service.id)">{{ array[1] }}</a>
              </td>
            </tr>
          </tbody>
        </table>
        <p v-else>There are no services.</p>
      </div> 
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"
                v-text="currentService.title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>{{ currentService.description }}</p>

            <h5>Address: </h5>
            <p>{{ currentService.address }}</p>
          

            <h5>City: </h5>
            <p>{{ currentService.city }}</p>


            <h5>State: </h5>
            <p>{{ currentService.state }}</p>

            
            <h5>Zipcode: </h5>
            <p>{{ currentService.zipcode }}</p>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script charset="utf-8">
export default {
  name: 'List',
  props: ['services'],
  data() {
    return {
      currentService: {},
    }
  },
  methods: {
    updateSelService(id) {
      this.currentService = this.services.find(service => service.id == id);
      console.log(this.currentService.title);
      console.log(this.currentService.description);
    }
  },
  computed: {
    filteredServices() {
      return this.services.map((service, index) => {
        return { id: service.id, title: service.title, city: service.city }
      });
    },
  }
}
</script>
