import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import axios from 'axios';

let App = new Vue({
  el: '#app',
  data: {
    services: [],
    completeServices: [],
    form: {
      visible: false,
      address: '',
      city: '',
      state: '',
      zipcode: '',
      latitude: 0.0,
      longitude: 0.0,
    },
    currentService: {
      visible: false,
      edit: false,
      id: -1,
      title: '',
      description: '',
      address: '',
      city: '',
      state: '',
      zipcode: '',
      latitude: 0.0,
      longitude: 0.0,
    }
  },
  methods: {
    toggleForm() {
      this.form.visible = !this.form.visible;
    },
    showService(id) {
      if(id != this.currentService.id) {
        let currentService = this.completeServices.find(service => service.id === id);
        console.log(currentService);
        this.currentService.visible = true; 
        this.currentService.id = id;
        this.currentService.title = currentService.title;
        this.currentService.description = currentService.description;
        this.currentService.address = currentService.address;
        this.currentService.city = currentService.city;
        this.currentService.state = currentService.state;
        this.currentService.zipcode = currentService.zipcode;
        this.currentService.latitude = currentService.latitude;
        this.currentService.longitude = currentService.longitude;
      } else {
        this.currentService.visible = false;
        this.currentService.id = -1;
      }
    },
    deleteService(id) {
      axios.delete('/services/' + id)
        .then(response => {
          console.log('Success');
          for(let i = 0; i < this.services.length; i++) {
            if(this.services[i].id == id) {
              this.services.splice(i, 1);
              break;
            }
          }
          this.currentService.visible = false; 
          window.location.href = "#";
        })
        .catch(response => {
          console.log('Error');
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
            id: services[i].id, title: services[i].title, city: services[i].city 
          });
          this.completeServices.push({ 
            id: services[i].id,
            title: services[i].title,
            description: services[i].description,
            city: services[i].city,
            state: services[i].state,
            zipcode: services[i].zipcode,
            longitude: services[i].longitude,
            latitude: services[i].latitude,
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

  mounted() {
    this.autocomplete = new google.maps.places.Autocomplete(
      (this.$refs.autocomplete),
      {types: ['geocode']}
    );

    this.autocomplete.addListener('place_changed', () => {

      this.form.address = '';
      this.form.city = '';
      this.form.state = '';
      this.form.zipcode = '';
      this.form.latitude = 0.0;
      this.form.longitude = 0.0;

      let componentForm = {
        'administrative_area_level_1': 'state',
        'locality': 'city',
        'postal_code': 'zipcode',
      }
      let place = this.autocomplete.getPlace();
      let ac = place.address_components;

      this.form.latitude = place.geometry.location.lat();
      this.form.longitude = place.geometry.location.lng();

      this.form.address = place.name;
      for (let i = 0; i < ac.length; i++) {
        let addressType = ac[i].types[0];
        console.log(addressType)
        let val = ac[i]['long_name'];
        if (componentForm[addressType]) {
          this.form[componentForm[addressType]] = val;
        } else if(addressType == 'postal_code_suffix') {
          this.form['zipcode'] += val;
        }
      }
    });
  }
});
