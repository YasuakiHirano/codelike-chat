import * as VueRouter from 'vue-router';

const routes = [
  {
    path: '/',
    name: 'ChatComponent',
    component: require('../components/ChatComponent.vue').default
  }
]

const router = VueRouter.createRouter({
  history: VueRouter.createWebHashHistory(),
  routes
})

export default router