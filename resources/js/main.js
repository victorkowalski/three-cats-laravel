import Vue from 'vue'
import App from './components/App.vue'
import VueRouter from 'vue-router'
import routes from './routes'
import { BASE_URL, Settings } from './variables.js'

Vue.use(VueRouter)
//Vue.use(Router)

//Vue.config.productionTip = false

var router = new VueRouter({
  routes: routes,
  base: process.env.BASE_URL,
  //base: '/three-cats-laravel/public/',
  //base: BASE_URL,
  mode: 'history',
  linkExactActiveClass: 'active',
  scrollBehavior: function(to, from, savedPosition) {
    return savedPosition || { x: 0, y: 0 }
  }
})

new Vue({
  router: router,
  render: h => h(App),
}).$mount('#root')
