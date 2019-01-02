<template id="">
  <div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Create Service</h1>
    </div>
    <form @submit.prevent="onSubmit">
      <div class="form-group">
        <label class="label">Title</label>
        <input type="text" name="title"
               class="form-control" v-model="form.title">
      </div>
      <div class="form-group">
        <label class="label">Description</label>
        <textarea type="text" name="description"
                  class="form-control" v-model="form.description">
        </textarea>
      </div>
      <div class="form-group">
        <label class="label">Address</label>
        <input type="text" ref="autocomplete"
               class="form-control" onFocus="value = ''">
        <input type="hidden" v-model="form.address" name="address" value="">
      </div>
      <div class="form-group">
        <label class="label">City</label>
        <input type="text" v-model="form.city" name="city" class="form-control">
      </div>
      <div class="form-group">
        <label class="label">State</label>
        <input type="text" v-model="form.state" name="state" class="form-control">
      </div>
      <div class="form-group">
        <label class="label">Zip Code</label>
        <input type="text" v-model="form.zipcode" name="zipcode" class="form-control">
      </div>
      <input type="hidden" v-model="form.latitude" name="latitude" value="">
      <input type="hidden" v-model="form.longitude" name="longitude" value="">
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>
</template>

<script charset="utf-8">
export default {
  data() {
    return {
      form: { 
        title: '',
        description: '',
        address: '',
        city: '',
        state: '',
        zipcode: '',
        latitude: 0.0,
        longitude: 0.0
      }
    }
  },
  methods: {
    onSubmit() {
      axios.post('/services', {
        title: this.form.title,
        description: this.form.description,
        address: this.form.address,
        city: this.form.city,
        state: this.form.state,
        zipcode: this.form.zipcode,
        latitude: this.form.latitude,
        longitude: this.form.longitude
      })
        .then(this.onSuccess)
        .catch(this.onFail);
    },
    onSuccess(response) {
      console.log(response);
      this.$emit('success', this.form);
    },
    onFail() {
      console.log(error);
    }
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
        let val = ac[i]['long_name'];
        if (componentForm[addressType]) {
          this.form[componentForm[addressType]] = val;
        } else if(addressType == 'postal_code_suffix') {
          this.form['zipcode'] += val;
        }
      }
    });
  }
}

</script>
