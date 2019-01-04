<template id="">
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Services</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <form action="#/services/create">
          <input type="submit" class="btn btn-sm btn-outline-secondary"
                               value="Create Service">
        </form> 
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-sm" v-if="services.length">
        <thead>
          <tr>
            <th v-for="key in Object.keys(filteredServices[0])">{{ key }}</th>
          </tr>
        </thead>
        <tbody>
          <tr class="table-items-row" v-for="service in searchedServices" :key="service.id">
            <td v-for="array in Object.entries(service)">
              <a :href="'#/services/' + service.id">{{ array[1] }}</a>
            </td>
          </tr>
        </tbody>
      </table>
      <p v-else>There is no services stored in the database, would you like to create one?</p>
    </div> 
    <router-view :services="services"
         @success="onCreateSuccess"
         @update="onUpdate"
         @delete="onDelete"></router-view>
  </main> 
</template>

<script charset="utf-8">
import VueRouter from 'vue-router';
import ShowService from './ShowService';
import CreateService from './CreateService';
import EditService from './EditService';

//const checkServices = (to, from, next) => {
//  if(this.services.length) next();
//}

const router = new VueRouter({
  routes: [
    { path: '/services/create', component: CreateService },
    { path: '/services/:id', component: ShowService, props: true },
    { path: '/services/:id/edit', component: EditService, props: true },
  ]
});

export default {
  props: ['search'],
  router,
  data() {
    return {
      services: [],
      errors: {},
    }
  },
  methods: {
    onCreateSuccess(form) {
      console.log('Form Success');
      console.log(form);
      this.services.push({
        id: this.newIndex,
        title: form.title,
        description: form.description,
        address: form.address,
        city: form.city,
        state: form.state,
        zipcode: form.zipcode,
        latitude: form.latitude,
        longitude: form.longitude,
      });
    },
    onUpdate(service) {
      axios.patch('/services/' + service.id, service)
        .then((response) => {
          console.log(response);
          function replaceAt(array, index, value) {
            const ret = array.slice(0);
            ret[index] = value;
            return ret;
          }
          this.services = replaceAt(this.services, this.services.indexOf(serv => serv.id == service.id) + 1, service); 
          window.location.href = "#/services/" + service.id;
        })
        .catch(function (error) {
          console.log('error');
          console.log(error.response);
          this.errors = error.response.data;
        }.bind(this));
    },
    onDelete(id) {
      axios.delete('/services/' + id)
        .then(response => {
          console.log('success');
          for(let i = 0; i < this.services.length; i++) {
            if(this.services[i].id == id) {
              this.services.splice(i, 1);
              break;
            }
          }
          window.location.href = "#";
        })
        .catch(response => {
          console.log('error');
          console.log(response);
        });
    },
  },
  created() {
    axios.get('/services/list')
      .then(response => {
        let services = response.data;
        for(let i = 0; i < services.length; i++) {
          this.services.push({ 
            id: services[i].id,
            title: services[i].title,
            description: services[i].description,
            address: services[i].address,
            city: services[i].city,
            state: services[i].state,
            zipcode: services[i].zipcode,
            latitude: services[i].latitude,
            longitude: services[i].longitude,
          });
        }

        if(services.length == 0) {
          this.toggleForm();
        }
      })
      .catch(error => {
        console.log('There was an error.');
      });
  },
  computed: {
    filteredServices() {
      return this.services.map((service, index) => { return { id: service.id, title: service.title, city: service.city } });
    },
    newIndex() {
      if(this.services.length) return this.services[this.services.length - 1].id + 1;
      else return 0;
    },
    searchedServices() {
      let filtered = this.filteredServices;
      if (this.search) {
        filtered = filtered.filter(service => 
          service.title.toLowerCase().includes(this.search)
        );
      }
      return filtered;
    },
  },
}
</script>
