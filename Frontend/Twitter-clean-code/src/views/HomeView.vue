<template>
  <main>
    <div id="home" class="flex container  h-screen w-full ">
      <div class="xl:w-1/5 border-r border-lighter px-0 lg:px-6 py-2 flex flex-col justify-between">
        <Sidebar />
      </div>
      <div class="w-full xl:w-1/2 h-full overflow-y-scroll">
        <nav class="sticky top-0 z-10">
          <NavBar />
        </nav>
        <div class="">
          <CreateTweet @refresh="getTweet" />
          <Tweet :sendTweet=tweet />
        </div>
      </div>
      <div class="lg:block hidden w-1/3 h-full border-l border-lighter py-2 px-6 relative">
        <Trending />
      </div>
    </div>
  </main>
</template>

<script setup>

import Sidebar from '@/components/Sidebar.vue';
import Trending from '@/components/trending.vue';
import NavBar from '@/components/NavBar.vue';
import Tweet from '@/components/Tweet/Tweet.vue';
import CreateTweet from '@/components/Tweet/CreateTweet.vue';
import { useRouter } from "vue-router";
import http from '@/services/http';

const router = useRouter();

</script>

<script>

export default {
  name: 'home',
  components: {
  },

  data() {

    return {
      tweet: "",
    }
  },

  created: function () {
    this.checkLogin()
    this.getTweet()
  },

  methods: {
    async checkLogin() {
      if (sessionStorage.getItem("loggedin") === null) {
        this.$router.push({ path: '/login' });
      }
    },
    async getTweet() {

      try {
        const { data } = await http.get("/get-tweets", {
        });

        this.tweet = data
        console.log(data);

      } catch (error) {
        console.log(error);
      }
    },
  },
}

</script>

<style>

</style>