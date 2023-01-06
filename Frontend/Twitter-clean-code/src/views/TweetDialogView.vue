<template :key="$route.fullPath">
  <main>
    <div id="TweetDialog" class="flex md:container h-screen w-full overflow-y-scroll">
      <div class="xl:w-1/5 border-r border-lighter dark:border-dark px-0 lg:px-6 py-2 flex flex-col justify-between h-screen sticky top-0 overflow-y-auto no-scrollbar">
        <Sidebar />
      </div>
      <div class="w-full xl:w-1/2 h-full">
        <nav class="sticky top-0 z-10">
          <NavBar />
        </nav>
        <div>
        <Tweet :sendTweet = tweet />
      </div>
        <CreateReply :sendTweet =tweet @refresh="refresh"/>
        <div v-for="(sendReply, index) in reply" :key="index">
          <Reply :key="cacheKey" :sendReply = sendReply />
        </div>
      </div>
      <div class="lg:block hidden w-1/3 h-full border-l border-lighter dark:border-dark py-2 px-6 relative h-screen sticky top-0 overflow-y-auto no-scrollbar">
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
import Reply from '@/components/Tweet/Reply.vue';
import CreateReply from '@/components/Tweet/CreateReply2.vue';
import { useRouter } from "vue-router";
import http from '@/services/http';

const router = useRouter();

</script>


<script>

export default {
  name: 'TweetDialog',
  components: {
  },

  data() {
    return {
      tweet: "",
      reply: "",
    }
  },

  created: function () {
    this.checkLogin()
    this.getTweet()
    this.getReply()
  },

  methods: {
    async checkLogin() {
      if (sessionStorage.getItem("loggedin") === null) {
        this.$router.push({ path: '/' });
      }
    },

    forceRerender() {
      const nowTime = +new Date()
      this.cacheKey = nowTime
    },

    async refresh() {
      this.getReply()
      this.getTweet()
      this.forceRerender();
    },

    async getReply() {
      try {
        const { data } = await http.post("/get-replies", {
          idtweet: this.$route.params.id,
        });
        console.log(data);
        this.reply = data



      } catch (error) {
        console.log(error);
      }
    },

    async getTweet() {

      try {
        const { data } = await http.post("/get-onetweet", {
          idtweet: this.$route.params.id,
        });
        this.tweet = data[0]
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