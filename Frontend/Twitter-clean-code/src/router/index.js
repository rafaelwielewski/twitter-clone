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
         component: () => import('../views/HomeView.vue')
       },
       {
        path: '/register',
        name: 'register',
        component: () => import('../views/Auth/RegisterView.vue')
      },
       {
        path: '/:id2/status/:id',
        name: 'Reply',
        component: () => import('../Views/TweetDialogView.vue')
      },

       {
        path: '/:id',
        name: 'profile',
        component: () => import('../views/ProfileView.vue')
      },
      {
        path: '/connect_people',
        name: 'Suggested',
        component: () => import('../views/SuggestedView.vue')
      },
      

  ]
})

export default router
