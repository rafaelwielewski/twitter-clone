import { createRouter, createWebHistory } from 'vue-router'
import LoginView from '../views/Auth/LoginView.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/login',
      name: 'login',
      component: LoginView
    },
       {
         path: '/',
         name: 'home',
    //   // route level code-splitting
    //   // this generates a separate chunk (About.[hash].js) for this route
    //   // which is lazy-loaded when the route is visited.
         component: () => import('../views/HomeView.vue')
       },

       {
        path: '/:id2/status/:id',
        name: 'TweetDialog',
   //   // route level code-splitting
   //   // this generates a separate chunk (About.[hash].js) for this route
   //   // which is lazy-loaded when the route is visited.
        component: () => import('../views/TweetDialogView.vue')
      },

  ]
})

export default router
