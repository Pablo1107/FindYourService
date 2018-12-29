let App = new Vue({
  el: '#app',
  data: {
    services: [
    ],
    form: {
      visible: false,
      address: '',
      state: '',
      country: '',
      zipcode: '',
      latitude: 0.0,
      longitude: 0.0,
    }
  },
  methods: {
    toggleForm() {
      this.form.visible = !this.form.visible;
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

  mounted() {
    this.autocomplete = new google.maps.places.Autocomplete(
      (this.$refs.autocomplete),
      {types: ['geocode']}
    );


    this.autocomplete.addListener('place_changed', () => {
      let componentForm = {
        'administrative_area_level_1': 'state',
        'country': 'country',
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
