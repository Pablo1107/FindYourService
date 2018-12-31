import VueRouter from 'vue-router';

let routes = [
  {
    path: '/',
    name: 'List',
    component: require('./views/List.vue').default,
  },
  {
    path: '/map',
    name: 'Map',
    component: require('./views/Map.vue').default,
  }
];

export default new VueRouter({
  routes,
  linkActiveClass: 'is-active',
});
