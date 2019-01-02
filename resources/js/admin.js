import './bootstrap';

import Admin from './Admin.vue';
import * as VueGoogleMaps from "vue2-google-maps";

Vue.use(VueGoogleMaps, {
  load: {
    key: process.env.MIX_GOOGLE_APP_KEY,
    libraries: "places" // necessary for places input
  }
});

let App = new Vue({
  el: '#app',
  render: h => h(Admin),
});

//let app = new vue({
//  el: '#app',
//  data: {
//    services: [],
//    completeservices: [],
//    form: {
//      visible: false,
//      address: '',
//      city: '',
//      state: '',
//      zipcode: '',
//      latitude: 0.0,
//      longitude: 0.0,
//    },
//    currentservice: {
//      visible: false,
//      edit: false,
//      id: -1,
//      title: '',
//      description: '',
//      address: '',
//      city: '',
//      state: '',
//      zipcode: '',
//      latitude: 0.0,
//      longitude: 0.0,
//    }
//  },
//  methods: {
//    toggleform() {
//      this.currentservice.id = -1;
//      this.form.visible = !this.form.visible;
//      this.currentservice.visible = false;
//      this.currentservice.edit = false;
//    },
//    showservice(id) {
//      if(id != this.currentservice.id) {
//        let currentservice = this.completeservices.find(service => service.id === id);
//        console.log(currentservice);
//        this.form.visible = false;
//        this.currentservice.edit = false;
//        this.currentservice.visible = true; 
//        this.currentservice.id = id;
//        this.currentservice.title = currentservice.title;
//        this.currentservice.description = currentservice.description;
//        this.currentservice.address = currentservice.address;
//        this.currentservice.city = currentservice.city;
//        this.currentservice.state = currentservice.state;
//        this.currentservice.zipcode = currentservice.zipcode;
//        this.currentservice.latitude = currentservice.latitude;
//        this.currentservice.longitude = currentservice.longitude;
//      } else {
//        this.currentservice.visible = false;
//        this.currentservice.id = -1;
//      }
//    },
//    editservice(id) {
//      console.log('edit');
//      this.currentservice.edit = true;
//      this.currentservice.visible = false;
//      this.form.visible = false;
//    },
//    updateservice(id) {
//      axios.update('/services/' + id, {
//        title: this.currentservice.title,
//        description: this.currentservice.description,
//        address: this.currentservice.address,
//        city: this.currentservice.city,
//        state: this.currentservice.state,
//        zipcode: this.currentservice.zipcode,
//        latitude: this.currentservice.latitude,
//        longitude: this.currentservice.longitude,
//      })
//        .then(response => {
//          console.log('success');
//        })
//        .catch(response => {
//          console.log('error');
//          console.log(response);
//        });
//    },
//  },
//
//  created() {
//    axios.get('/services/list')
//      .then(response => {
//        let services = response.data;
//        for(let i = 0; i < services.length; i++) {
//          this.services.push({ 
//            id: services[i].id, title: services[i].title, city: services[i].city 
//          });
//          this.completeServices.push({ 
//            id: services[i].id,
//            title: services[i].title,
//            description: services[i].description,
//            address: services[i].address,
//            city: services[i].city,
//            state: services[i].state,
//            zipcode: services[i].zipcode,
//            longitude: services[i].longitude,
//            latitude: services[i].latitude,
//          });
//        }
//
//        if(services.length == 0) {
//          this.toggleForm();
//        }
//      })
//      .catch(error => {
//        console.log('There was an error.');
//      });
//  },
//
//  mounted() {
//    this.autocomplete = new google.maps.places.Autocomplete(
//      (this.$refs.autocomplete),
//      {types: ['geocode']}
//    );
//
//    this.autocomplete.addListener('place_changed', () => {
//
//      this.form.address = '';
//      this.form.city = '';
//      this.form.state = '';
//      this.form.zipcode = '';
//      this.form.latitude = 0.0;
//      this.form.longitude = 0.0;
//
//      let componentForm = {
//        'administrative_area_level_1': 'state',
//        'locality': 'city',
//        'postal_code': 'zipcode',
//      }
//      let place = this.autocomplete.getPlace();
//      let ac = place.address_components;
//
//      this.form.latitude = place.geometry.location.lat();
//      this.form.longitude = place.geometry.location.lng();
//
//      this.form.address = place.name;
//      for (let i = 0; i < ac.length; i++) {
//        let addressType = ac[i].types[0];
//        console.log(addressType)
//        let val = ac[i]['long_name'];
//        if (componentForm[addressType]) {
//          this.form[componentForm[addressType]] = val;
//        } else if(addressType == 'postal_code_suffix') {
//          this.form['zipcode'] += val;
//        }
//      }
//    });
//  }
//});
