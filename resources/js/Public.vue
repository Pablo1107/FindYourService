<template id="">
  <div class="box">
    <google-map class="maps" :markers="filteredMarkers"></google-map>
    <List class="list" :services="searchedServices"></List>
    <Navbar class="navbar fixed-bottom " v-model="search">
    <select style="width: 150px; margin-left: 10px" v-model="radius">
      <option :value="0">Anywhere</option>
      <option :value="1">1km</option>
      <option :value="2">2km</option>
      <option :value="5">5km</option>
      <option :value="10">10km</option>
      <option :value="25">25km</option>
      <option :value="50">50km</option>
      <option :value="100">100km</option>
    </select>
    </Navbar>
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
      radius: 0.0,
      markers: [],
      user: {
        position: {
          lat: 0.0,
          lng: 0.0,
        }
      }
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
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition((position) => {
        console.log(position.coords.latitude);
        console.log(position.coords.longitude);
        this.user.position.lat = position.coords.latitude;
        this.user.position.lng = position.coords.longitude;
        //var circle = new google.maps.Circle({
        //  center: geolocation,
        //  radius: position.coords.accuracy
        //});
        //autocomplete.setBounds(circle.getBounds());
      });
    } else {
      console.log('error');
    }
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
    filteredMarkers() {
      let userPos = new google.maps.LatLng(this.user.position.lat, this.user.position.lng);
      console.log('User: (' + userPos.lat() + ', ' + userPos.lng() + ')');
      let filtered = this.markers.filter(mark => {
        let markPos = new google.maps.LatLng(mark.position.lat, mark.position.lng);
        console.log('Mark: (' + markPos.lat() + ', ' + markPos.lng() + ')');
        let distance = google.maps.geometry.spherical.computeDistanceBetween(userPos, markPos);
        console.log('Distance: ' + distance);
        console.log(distance < this.radius * 1000);
        if(this.radius > 0) return distance < this.radius * 1000;
        else return true;
      });
      console.log(filtered);

      return filtered;
    }
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
