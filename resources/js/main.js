import Vue from 'vue'
import App from './components/App.vue'
import VueRouter from 'vue-router'
import routes from './routes'
//import routes from './routes';

Vue.use(VueRouter)
//Vue.use(Router)

//Vue.config.productionTip = false

var router = new VueRouter({
  routes: routes,
  //base: process.env.BASE_URL,
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
