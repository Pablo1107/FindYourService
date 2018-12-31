let App = new Vue({
  el: '#app',
  data: {
    services: [],
    search: '',
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
});
