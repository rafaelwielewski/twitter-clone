<template>
  <div class="">
  <main>
    <div id="home" class="flex w-full h-screen">
      <div class="flex md:container h-screen w-full overflow-y-scroll">
      <aside class="xl:w-1/5 border-r border-lighter dark:border-dark px-0 lg:px-6 py-2 flex flex-col justify-between h-screen sticky top-0 overflow-y-0 no-scrollbar">
        <Sidebar />
      </aside>
      <div class="xl:w-1/2 h-full ">
        <nav class="sticky top-0 z-10">
          <NavBar />
        </nav>
        <div class="inline-block">
          <CreateTweet @refresh="getTweet" />
          <div class="flex-col-reverse" v-for="(sendTweet, index) in tweet" :key="index" >
            <Tweet :key="cacheKey" :sendTweet=sendTweet />
          </div>
        </div>
      </div>
      <div class="lg:block hidden w-1/3 border-l border-lighter dark:border-dark py-2 px-6 relative h-screen sticky top-0 overflow-y-auto no-scrollbar">
        <Trending />
      </div>
    </div>
    </div>
  </main>
</div>
</template>


<script setup>
import { mapGetters } from 'vuex';
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
      cacheKey: 1,
      tweet: "",
    }
  },

    
  created: function () {
    this.checkLogin()
    this.getTweet()
  },

  methods: {

    forceRerender() {
      const nowTime = +new Date()
      this.cacheKey = nowTime
    },


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
        this.forceRerender();

      } catch (error) {

        
      }
    },
  },
}

</script>

<style>

</style>