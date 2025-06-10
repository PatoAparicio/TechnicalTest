import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Problem1View from '../views/Problem1View.vue'
import Problem2View from '../views/Problem2View.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/problem-1',
      name: 'problem1',
     component: Problem1View
    },
    {
      path: '/problem-2',
      name: 'problem2',
      component: Problem2View
    },
  ],
})

export default router
