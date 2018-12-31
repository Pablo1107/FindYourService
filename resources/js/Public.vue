<template id="">
  <div class="box">
    <google-map class="maps" :markers="markers"></google-map>
    <List class="list" :services="searchedServices"></List>
    <Navbar class="navbar" v-model="search"></Navbar>
  </div>
</template>

<script charset="utf-8">
import GoogleMap from './components/GoogleMap';
import List from './components/List';
import Navbar from './components/Navbar';

export default {
  components: {
    GoogleMap,
    List,
    Navbar,
  },
  data() {
    return {
      services: [],
      search: '',
      markers: [],
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
            city: services[i].city,
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

<style type="text/css" media="screen">
.box {
  display: flex;
  flex-flow: column;
  height: 100%;
}

.box .list {
  flex: 0 1 auto;
  /* The above is shorthand for:
  flex-grow: 0,
  flex-shrink: 1,
  flex-basis: auto
  */
}

.box .maps {
  flex: 1 1 auto;
}

.box .navbar {
  flex: 0 1 10px;
}
</style>
