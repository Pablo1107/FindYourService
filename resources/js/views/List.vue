<template id="">
  <div>
    <div class="jumbotron mt-3">
      <h1>FindYouService</h1>
      <p class="lead">This page will show a map and a list of the services.</p>
      <div class="table-responsive">
        <table class="table table-striped table-sm" v-if="services.length">
          <thead>
            <tr>
              <th v-for="key in Object.keys(services[0])">{{ key }}</th>
            </tr>
          </thead>
          <tbody>
            <tr class="table-items-row" v-for="service in searchedServices" :key="service.id">
              <td v-for="array in Object.entries(service)">
                <a :href="'/services/' + service.id">{{ array[1] }}</a>
              </td>
            </tr>
          </tbody>
        </table>
        <p v-else>There is no services stored in the database, would you like to create one?</p>
      </div> 
    </div>
    <nav class="navbar navbar-dark fixed-bottom bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">FindYourService</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search" v-model="search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign out</a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script charset="utf-8">
export default {
  data() {
    return {
      services: [],
      search: '',
    }
  },
  created() {
    axios.get('/services/list')
      .then(response => {
        let services = response.data;
        for(let i = 0; i < services.length; i++) {
          this.services.push({ 
            id: services[i].id, title: services[i].title, city: services[i].city 
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
    searchedServices() {
      let filtered = this.services;
      if (this.search) {
        filtered = this.services.filter(service => 
          service.title.toLowerCase().includes(this.search.toLowerCase())
        );
      }
      return filtered;
    }
  },
}
</script>
