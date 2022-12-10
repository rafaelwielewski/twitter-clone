<template>
  <div id="sidebar">
    <div>
      <button class="h-12 w-12 hover:bg-lightblue text-3xl rounded-full text-blue">
        <i class="fab fa-twitter"></i>
      </button>
      <div>
        <button v-for="(tab, index) in tabs" :key="index" @click="id = tab.id"
          :class="`focus:outline-none hover:text-blue flex items-center py-2 px-4 hover:bg-lightblue rounded-full mr-auto mb-3 ${id === tab.id ? 'text-blue' : ''}`">
          <i :class="`${tab.icon} text-2xl mr-4 text-left`"></i>
          <p class="text-lg font-semibold text-left hidden lg:block"> {{ tab.title }} </p>
        </button>
      </div>
      <button
        class="text-white bg-blue rounded-full font-semibold focus:outline-none w-12 h-12 lg:h-auto lg:w-full p-3 hover:bg-darkblue">
        <p class="hidden lg:block">Tweet</p>
        <i class="fas fa-plus lg:hidden"></i>
      </button>
    </div>
  </div>
  <div class="lg:w-full relative">
      <button @click="dropdown = !dropdown"
        class="flex items-center w-full hover:bg-lightblue rounded-full p-2 focus:outline-none">
        <img :src="profileImg"
          class="w-10 h-10 rounded-full border border-lighter" />
        <div class="hidden lg:block ml-4">
          <p class="text-sm font-bold leading-tight"> {{ name }}</p>
          <p class="text-sm leading-tight"> @{{ username }} </p>
        </div>
        <i class="hidden lg:block fas fa-angle-down ml-auto text-lg"></i>
      </button>

      <div v-if="dropdown === true"
        class="absolute bottom-0 left-0 w-64 rounded-lg shadow-md border-lightest bg-white mb-16">
        <button @click="dropdown = false"
          class="p-3 flex items-center w-full hover:bg-lightest p-2 focus:outline-none">
          <img :src="profileImg"
            class="w-10 h-10 rounded-full border border-lighter" />
          <div class="ml-4">
            <p class="text-sm font-bold leading-tight"> {{ name }} </p>
            <p class="text-sm leading-tight"> @{{ username }} </p>
          </div>
          <i class="fas fa-check ml-auto test-blue"></i>
        </button>
        <button @click="dropdown = false"
          class="w-full text-left hover:bg-lightest border-t border-lighter p-3 test-sm focus:outline-none">
          Add an existing account
        </button>
        <button @click="logout()"
          class="w-full text-left hover:bg-lightest border-t border-lighter p-3 test-sm focus:outline-none">
          Log out
        </button>
      </div>
    </div>
</template>

<script>

import http from '@/services/http';
import {useRouter} from 'vue-router';

export default {
name: 'sidebar',
components: {
},

data() {
  
  return {
    profileImg: sessionStorage.getItem("profileImg"),
    iduser: sessionStorage.getItem("iduser"),
    name: sessionStorage.getItem("name"),
    username: sessionStorage.getItem("username"),
    dropdown: false,
    tabs: [
      {icon: 'fas fa-home', title: 'Home', id:'home'},
      {icon: 'fas fa-hashtag', title: 'Explore', id: 'explore'},
      {icon: 'far fa-bell', title: 'Notifications', id: 'notifications'},
      {icon: 'far fa-envelope', title: 'Messages', id: 'messages'},
      {icon: 'far fa-bookmark', title: 'Bookmarks', id: 'bookmarks'},
      {icon: 'fas fa-clipboard-list', title: 'Lists', id: 'lists'},
      {icon: 'far fa-user', title: 'Profile', id: 'profile'},
      {icon: 'fas fa-ellipsis-h', title: 'More', id: 'more'}
    ],
  }
},


methods: {
  logout()
	{
    
    sessionStorage.clear();
    
    this.$router.push({path: '/'});

	},
},
}


</script>

<style>

</style>