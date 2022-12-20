<template>
  <div id="trending">
    <!-- Tweet Section -->

    <!-- Trending Section-->
    <div>
      <input class="pl-12 rounded-full w-full p-2 bg-lighter text-base mb-4" placeholder="Search Twitter" />
      <i class="fas fa-search absolute left-0 top-0 mt-5 ml-12 text-base text-light"></i>
      <div class="w-full rounded-lg bg-lightest">
        <div class="flex items-center justify-between p-3">
          <p class="text-xl font-bold">Trends for You</p>
          <i class="fas fa-cog text-lg text-blue"></i>
        </div>
        <button v-for="(trend, index) in trending" :key="index"
          class="w-full flex justify-between hover:bg-lighter p-3 border-t border-lighter">
          <div>
            <p class="text-sm text-left leading-tight text-dark"> {{ trend.top }} </p>
            <p class="font-semibold text-base text-left leading-tight"> {{ trend.title }} </p>
            <p class="text-left text-base leading-tight text-dark"> {{ trend.bottom }} </p>
          </div>
          <i class="fas fa-angle-down text-lg text-dark"></i>
        </button>
        <button class="text-base p-3 w-full hover:bg-lighter text-left text-blue border-t border-lighter">
          Show More
        </button>
      </div>
      <div class="w-full rounded-lg bg-lightest my-4">
        <div class=" p-3">
          <p class="text-xl font-bold">Who to Follow</p>
        </div>
        <button v-for="(profile, index) in profiles" :key="index"
          class="w-full flex hover:bg-lighter p-3 border-t border-lighter">
          <img :src="profile.profileImg" class="w-14 h-14 rounded-full border border-lighter" />
          <div class="hidden lg:block ml-4">
            <p class="text-base font-bold leading-tight"> {{ profile.desname }} </p>
            <p class="text-base leading-tight"> {{ profile.deslogin }} </p>
          </div>
          <button class="ml-auto text-sm text-blue py-1 px-4 rounded-full border-2 border-blue">
            Follow
          </button>
        </button>
        <button class="text-base p-3 w-full hover:bg-lighter text-left text-blue border-t border-lighter" @click="router.push(`/connect_people`)">
          Show More
        </button>
      </div>
    </div>
  </div>
</template>
  

<script setup>

import http from '@/services/http';
import { useRouter } from "vue-router";
const router = useRouter();

</script>


<script>
  export default {
  name: 'trending',
  components: {
  },

  mounted: function () {
    this.ShowThreeProfiles()
  },

  data() {
    
    return {
      profiles: '',
      trending: [
        {top: '', title: '', bottom: 'The '},
        {top: '', title: '', bottom: 'The '},
        {top: '', title: '', bottom: 'The '},
      ],
    }
  },
  methods: {

    async ShowThreeProfiles() {
      try {
        const { data } = await http.post("/get-showthreeprofiles", {
          username: sessionStorage.getItem("username"),
        });
        console.log(data);
        this.profiles = data

      } catch (error) {
        console.log(error);
      }
    },

  },
}

</script>
  
<style>
  
  </style>