<template>
  <div id="trending">
    <!-- Tweet Section -->

    <!-- Trending Section-->
    <div>
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
  name: 'trending',
  components: {
  },
  data() {
    
    return {
      dropdown: false,
      trending: [
        {top: '', title: '', bottom: 'The '},
        {top: '', title: '', bottom: 'The '},
        {top: '', title: '', bottom: 'The '},
      ],
      follow: [
        {src: '', name: '', handle: '@'},
        {src: '', name: '', handle: '@'},
        {src: '', name: '', handle: '@'},
      ],
    }
  }
}
  import http from '@/services/http';
  import {useRouter} from 'vue-router';
  
  
</script>
  
<style>
  
  </style>