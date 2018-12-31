import VueRouter from 'vue-router';

let routes = [
  {
    path: '/',
    name: 'Home',
    component: require('./views/Home.vue').default,
  },
  {
    path: '/about',
    name: 'About',
    component: require('./views/About.vue').default,
  }
];

export default new VueRouter({
  routes,
  linkActiveClass: 'is-active',
});
