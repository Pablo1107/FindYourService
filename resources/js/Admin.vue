<template id="">
  <div>
    <Navbar class="fixed-top"></Navbar>
    <div class="container-fluid">
      <div class="row">
        <Column></Column>

        <Services :services="searchedServices"></Services>
      </div>
    </div>
  </div>
</template>

<script charset="utf-8">
import GoogleMap from './components/GoogleMap';
import Navbar from './components/Navbar';
import Column from './components/Column';
import Services from './components/Services';

export default {
  components: {
    Navbar,
    Column,
    Services,
  },
  data() {
    return {
      services: [],
      search: '',
      markers: [],
      visible: false,
    }
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
          this.markers.push({ 
            position: {
              lat: services[i].latitude,
              lng: services[i].longitude,
            }
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
          service.title.toLowerCase().includes(this.search)
        );
      }
      return filtered;
    },
  },
}
</script>
