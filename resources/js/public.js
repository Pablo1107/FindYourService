import './bootstrap';
import Public from './Public.vue';
import * as VueGoogleMaps from "vue2-google-maps";

Vue.use(VueGoogleMaps, {
  load: {
    key: process.env.MIX_GOOGLE_APP_KEY,
    libraries: "places" // necessary for places input
  }
});

let App = new Vue({
  el: '#app',
  render: h => h(Public),
});
