<template>
  <div id="sidebar" class="flex container h-screen w-full">
    <div class="lg:w-1/5 border-r border-lighter px-2 lg:px-6 py-2 flex flex-col justify-between">
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
      <div class="lg:w-full relative">
        <button @click="dropdown = !dropdown"
          class="flex items-center w-full hover:bg-lightblue rounded-full p-2 focus:outline-none">
          <img src="https://randomuser.me/api/portraits/men/11.jpg"
            class="w-10 h-10 rounded-full border border-lighter" />
          <div class="hidden lg:block ml-4">
            <p class="text-sm font-bold leading-tight"> Kriss Kawa </p>
            <p class="text-sm leading-tight"> @kriss </p>
          </div>
          <i class="hidden lg:block fas fa-angle-down ml-auto text-lg"></i>
        </button>



        <div v-if="dropdown === true"
          class="absolute bottom-0 left-0 w-64 rounded-lg shadow-md border-lightest bg-white mb-16">
          <button @click="dropdown = false"
            class="p-3 flex items-center w-full hover:bg-lightest p-2 focus:outline-none">
            <img src="https://randomuser.me/api/portraits/men/11.jpg"
              class="w-10 h-10 rounded-full border border-lighter" />
            <div class="ml-4">
              <p class="text-sm font-bold leading-tight"> Kriss Kawa </p>
              <p class="text-sm leading-tight"> @kriss </p>
            </div>
            <i class="fas fa-check ml-auto test-blue"></i>
          </button>
          <button @click="dropdown = false"
            class="w-full text-left hover:bg-lightest border-t border-lighter p-3 test-sm focus:outline-none">
            Add an existing account
          </button>
          <button @click="dropdown = false"
            class="w-full text-left hover:bg-lightest border-t border-lighter p-3 test-sm focus:outline-none">
            Log out @kriss
          </button>
        </div>
      </div>
    </div>
    <!-- Tweet Section -->
    <div class="w-full md:w-1/2 h-full overflow-y-scroll">

    </div>
    <!-- Trending Section-->
    <div class="md:block hidden w-1/3 h-full border-l border-lighter py-2 px-6 overflow-y-scroll relative">
      <input class="pl-12 rounded-full w-full p-2 bg-lighter text-sm mb-4" placeholder="Search Twitter" />
      <i class="fas fa-search absolute left-0 top-0 mt-5 ml-12 text-sm text-light"></i>
      <div class="w-full rounded-lg bg-lightest">
        <div class="flex items-center justify-between p-3">
          <p class="text-lg font-bold">Trends for You</p>
          <i class="fas fa-cog text-lg text-blue"></i>
        </div>
        <button v-for="(trend, index) in trending" :key="index"
          class="w-full flex justify-between hover:bg-lighter p-3 border-t border-lighter">
          <div>
            <p class="text-xs text-left leading-tight text-dark"> {{ trend.top }} </p>
            <p class="font-semibold text-sm text-left leading-tight"> {{ trend.title }} </p>
            <p class="text-left text-sm leading-tight text-dark"> {{ trend.bottom }} </p>
          </div>
          <i class="fas fa-angle-down text-lg text-dark"></i>
        </button>
        <button class="p-3 w-full hover:bg-lighter text-left text-blue border-t border-lighter">
          Show More
        </button>
      </div>
      <div class="w-full rounded-lg bg-lightest my-4">
        <div class=" p-3">
          <p class="text-lg font-bold">Who to Follow</p>
        </div>
        <button v-for="(user, index) in follow" :key="index"
          class="w-full flex hover:bg-lighter p-3 border-t border-lighter">
          <img :src="`${user.src}`" class="w-12 h-12 rounded-full border border-lighter" />
          <div class="hidden lg:block ml-4">
            <p class="text-sm font-bold leading-tight"> {{ user.name }} </p>
            <p class="text-sm leading-tight"> {{ user.handle }} </p>
          </div>
          <button class="ml-auto text-sm text-blue py-1 px-4 rounded-full border-2 border-blue">
            Follow
          </button>
        </button>
        <button class="p-3 w-full hover:bg-lighter text-left text-blue border-t border-lighter">
          Show More
        </button>
      </div>
    </div>

  </div>

</template>
  
<script>
  export default {
  name: 'sidebar',
  components: {
  },
  data() {
    
    return {
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
      trending: [
        {top: 'techies all around', title: 'Tech', bottom: 'The technology'},
        {top: 'Apps', title: 'Flutter', bottom: '100K Tweets'},
        {top: 'Animals', title: 'Shark larger than Great white', bottom: '115k tweets'},
        {top: 'The techies nation', title: '2m servers', bottom: '30k tweets'},
      ],
      follow: [
        {src: 'https://randomuser.me/api/portraits/men/79.jpg', name: 'Kriss Kovan', handle: '@kriss'},
        {src: 'https://randomuser.me/api/portraits/men/70.jpg', name: 'Danny D', handle: '@theD'},
        {src: 'https://randomuser.me/api/portraits/men/27.jpg', name: 'Hubert Aly', handle: '@alyway'}
      ],
    }
  }
}
  import http from '@/services/http';
  import {ref} from 'vue';
  import {useRouter} from 'vue-router';
  
  const router = useRouter();
  
  const username = ref("rafael");
  const password = ref("Rafa12345");
  
  
  </script>
  
<style>
  
  </style>