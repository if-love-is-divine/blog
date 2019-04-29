import Vue from 'vue'
import Router from 'vue-router'
import Index from '@/components/Index'
import Music from '@/components/Music'
import Album from '@/components/Album'
import Works from '@/components/Works'
import Message from '@/components/Message'
import Diary from '@/components/Diary'
import PersonalData from '@/components/PersonalData'
import Login from '@/components/Login'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Login',
      component: Login
    },
    {
      path: '/Index',
      name: 'Index',
      component: Index
    },
    {
      path: '/Music',
      name: 'Music',
      component: Music
    },
    {
      path: '/Album',
      name: 'Album',
      component: Album
    },
    {
      path: '/Works',
      name: 'Works',
      component: Works
    },
    {
      path: '/Message',
      name: 'Message',
      component: Message
    },
    {
      path: '/Diary',
      name: 'Diary',
      component: Diary
    },
    {
      path: '/PersonalData',
      name: 'PersonalData',
      component: PersonalData
    }
  ]
})
