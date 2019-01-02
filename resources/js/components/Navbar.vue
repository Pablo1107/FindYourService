<template id="">
  <nav class="navbar navbar-dark bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">FindYourService</a>
    <input class="form-control form-control-dark w-100"
           type="text"
           placeholder="Search"
           aria-label="Search"
           :value="value" @input="updateValue($event.target.value)">
    <slot></slot>
    <a v-if="isLogged" class="nav-link" href="#"  @click="logout">Sign out</a>
    <a v-if="!isLogged" class="nav-link" href="/login">Login</a>
    <a v-if="!isLogged" class="nav-link" href="/register">Register</a>
  </nav>
</template>

<script charset="utf-8">
export default {
  props: ['value'],
  name: 'Navbar',
  data() {
    return {
      isLogged: true,
    }
  },
  methods: {
    updateValue(value) {
      this.$emit('input', value.toLowerCase());
    },
    logout() {
      axios.post('/logout')
        .then(function (response) {
          console.log(response);
          window.location.href = "/";
        }.bind(this))
        .catch(function (error) {
          // handle error
          console.log(error);
        })
    },
  },
  created() {
    axios.get('/loginStatus')
      .then(function (response) {
        this.isLogged = response.data.isLogged;
        console.log(response.data);
      }.bind(this))
      .catch(function (error) {
        // handle error
        console.log(error);
      })
  }
}
</script>

<style type="text/css" media="screen">
a {
  white-space: nowrap
}
</style>
