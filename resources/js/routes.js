import Home from './views/Home.vue';
import SearchResults from './views/SearchResults.vue'

//import Home from './components/Home.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
  },
  {
    path: '/search/:tag',
    name: 'searchResults',
    component: SearchResults,
    props: true,
  },
]

export default routes
/*
***************************************************

import Vue from 'vue';
import Router from 'vue-router';
import Home from './views/Home.vue';
import SearchResults from './views/SearchResults.vue';

//Vue.use(Router);

export default new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
    },
    {
      path: '/search/:tag',
      name: 'searchResults',
      component: SearchResults,
      props: true,
    },
  ],
});
*/